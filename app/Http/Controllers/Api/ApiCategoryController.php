<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreate;
use App\Http\Requests\CategoryUpdate;

class ApiCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();        
        foreach($categories as $category){
            $category->tools->count();
        }        
        return compact('categories');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryCreate $categoryRequest)
    {
        $category = new Category();
        $category->name         = $categoryRequest->name;
        $category->material     = $categoryRequest->material;
        $category->description  = $categoryRequest->description;
        $category->min_stock    = $categoryRequest->min_stock;

        $category->save();
        return compat('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = Category::findOrfail($category);
        return compat('category');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdate $CategoryRequest, $id)
    {
        $category = Category::findOrfail($id);
        $category = new Category();

        $category->name         = $categoryRequest->name;
        $category->material     = $categoryRequest->material;
        $category->description  = $categoryRequest->description;
        $category->min_stock    = $categoryRequest->min_stock;

        $category->save();
        return compat('category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category = Category::findOrfail($category);
        $category->delete();
        return $this->index();
    }
}