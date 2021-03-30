<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Product\GetByCategoryRequest;
use App\Services\ProductCategoryService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product_category_service;

    /**
     * Construct
     *
     * @param \App\Services\ProductCategoryService $product_category_service
     */
    public function __construct(ProductCategoryService $product_category_service)
    {
        $this->product_category_service = $product_category_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $category_id
     * @param \App\Http\Requests\Api\Product\GetByCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index($category_id, GetByCategoryRequest $request)
    {
        return $this->product_category_service->findWithProduct($category_id, $request->page);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}