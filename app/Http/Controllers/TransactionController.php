<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;
use App\Models\User;
use App\Models\TrHeader;
use App\Models\TrDetail;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function addToCart(Request $request, string $id){
        $email = Auth :: user()->email;
        $productID = request()->product_id;
        $qtc = request()->qtc;

        // check if product is already in cart
        $product = Cart::where('email', $email)->where('product_id', $productID);
        if($product->count() > 0){
            $product->update([
                'qtc' => $product->first()->qtc + $qtc
            ]);
            return redirect()->route('dashboard');
        }
        
        Cart::create([
            'email' => $email,
            'product_id' => $productID,
            'qtc' => $qtc
        ]);

        return redirect()->route('dashboard');
    }

    public function showCart(){
        $email = Auth :: user()->email;
        $cartItems = Cart::where('email', $email)->get();
        return view('cart',compact('cartItems'));
    }

    public function updateQTC($id){
        $cart = Cart::find($id);
        $cart->qtc = request()->qtc;
        $cart->save();
        return redirect()->route('cart.show');
    }

    public function remove($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('cart.show');
    }

    public function showTransacionPage(){
        $email = Auth :: user()->email;
        $carts = Cart::where('email', $email)->get();
        $invoiceNO = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
        return view('transactionPage',compact('carts','invoiceNO'));
    }

    public function store(Request $request){
        $email = Auth :: user()->email;
        $carts = Cart::where('email', $email)->get();
        $invoiceNO = $request->InvoiceNo;

        $TrHeader = new TrHeader();
        $TrHeader -> email = $email;
        $TrHeader -> invoice = $invoiceNO;
        $TrHeader -> address = $request->address;
        $TrHeader -> post = $request->post;
        $TrHeader -> save();



        foreach($carts as $cart){

            $TrDetail = new TrDetail();
            $TrDetail -> transaction_id = TrHeader::where('invoice', $invoiceNO)->first()->id;
            $TrDetail -> invoice = $invoiceNO;
            $TrDetail -> product_id = $cart->product_id;
            $TrDetail -> qtc = $cart->qtc;
            $TrDetail -> save();

            $product = Products::find($cart->product_id);
            $product->update([
                'qtc' => $product->qtc - $cart->qtc
            ]);

            Cart::where('email', $email)->where('product_id', $cart->product_id)->delete();
        }

        return redirect()->route('dashboard')-> with ('success','Transaction Success');
    }

}
