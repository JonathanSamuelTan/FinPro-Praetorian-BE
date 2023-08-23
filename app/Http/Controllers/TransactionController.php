<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
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
}
