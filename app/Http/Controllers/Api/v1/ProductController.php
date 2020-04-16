<?php

namespace App\Http\Controllers\Api\v1;

use App\Product;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceCollection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): ProductResourceCollection
    {
        // $products = Product::all();
        // return view('products.index', compact('products'));
        return new ProductResourceCollection(Product::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
        [
            'name'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);

        $product = new Product;

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        // dd($product);
    
        $product->save();
        // return redirect('/product');
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product):ProductResource
    {
        // $product = Product::find($id);
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product):ProductResource
    {
        $this->validate($request, 
        [
            'name'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);

        // $product = Product::find($id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        // dd($product);
    
        $product->save();
        // return redirect('/product');
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // $product = Product::find($id);
        $product->delete();
        // return redirect('/product');
        return response()->json();
    }
}