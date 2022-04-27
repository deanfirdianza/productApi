<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Queue\InvalidPayloadException;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductDetail::paginate(5);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productDetail = new ProductDetail();
        $productDetail->name = $request->name;
        $productDetail->color = $request->color;
        $productDetail->purchase_price = $request->purchase_price;
        $productDetail->save();
        
        if($productDetail){
            return response()
            ->json(['message' => 'productDetail created','data' => $productDetail]);
        } else {
            throw new InvalidPayloadException();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDetail $productDetail)
    {
        return $productDetail;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDetail $productDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductDetail $productDetail)
    {
        $productDetail->name = $request->name ?? $productDetail->name;
        $productDetail->color = $request->color ?? $productDetail->color;
        $productDetail->purchase_price = $request->purchase_price ?? $productDetail->purchase_price;
        $productDetail->save();
        
        if($productDetail){
            return response()
            ->json(['message' => 'productDetail updated','data' => $productDetail]);
        } else {
            throw new InvalidPayloadException();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductDetail  $productDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDetail $productDetail)
    {
        $productDetail->delete();

        if($productDetail){
            return response()
            ->json(['message' => 'productDetail deleted','data' => $productDetail]);
        } else {
            throw new InvalidPayloadException();
        }
    }
}
