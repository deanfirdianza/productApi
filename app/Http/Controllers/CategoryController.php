<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryCollection;
use App\Models\Category;
use Illuminate\Queue\InvalidPayloadException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->abbrv = $request->abbrv;
        $category->save();
        
        if($category){
            return response()
            ->json(['message' => 'Category created','data' => $category]);
        } else {
            throw new InvalidPayloadException();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {        
        $category->name = $request->name ?? $category->name;
        $category->abbrv = $request->abbrv ?? $category->abbrv;
        $category->save();
        
        if($category){
            return response()
            ->json(['message' => 'Category updated','data' => $category]);
        } else {
            throw new InvalidPayloadException();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {        
        $category->delete();

        if($category){
            return response()
            ->json(['message' => 'Category deleted','data' => $category]);
        } else {
            throw new InvalidPayloadException();
        }
    }

    public function publicList()
    {        
        return new CategoryCollection(Category::all());
    }
}
