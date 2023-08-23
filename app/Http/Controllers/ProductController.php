<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return view('dashboard',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'product_name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'qtc' => 'required',
            'product_IMG' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product_IMG = $request->file('product_IMG');
        $fileName = $request->product_name.'.'.$product_IMG->getClientOriginalExtension();
        $product_IMG->move(public_path('storage/ProductIMG'), $fileName);

        $product = new Products;
        $product->product_name = $request->product_name;
        $product->category = $request->category;
        $product->price = $request->price;
        $product->qtc = $request->qtc;
        $product->product_IMG = $fileName;
        $product->save();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete the image
        $productIMG = Products::where('id', $id)->value('product_IMG');
        unlink(public_path('storage/ProductIMG/'.$productIMG));

        Products::where('id', $id)->delete();

    }
}
