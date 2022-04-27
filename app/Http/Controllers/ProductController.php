<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Queue\InvalidPayloadException;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->id = Str::uuid();
        $product->selling_price = $request->selling_price;
        $product->product_detail_id = $request->product_detail_id;
        $product->category_id = $request->category_id;
        $product->qty = $request->qty;
        $product->save();
        
        if($product){
            return response()
            ->json(['message' => 'product created','data' => $product]);
        } else {
            throw new InvalidPayloadException();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {                
        $product->selling_price = $request->selling_price;
        $product->product_detail_id = $request->product_detail_id;
        $product->category_id = $request->category_id;
        $product->qty = $request->qty;
        $product->save();
        
        if($product){
            return response()
            ->json(['message' => 'product updated','data' => $product]);
        } else {
            throw new InvalidPayloadException();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        if($product){
            return response()
            ->json(['message' => 'product deleted','data' => $product]);
        } else {
            throw new InvalidPayloadException();
        }
    }
}
