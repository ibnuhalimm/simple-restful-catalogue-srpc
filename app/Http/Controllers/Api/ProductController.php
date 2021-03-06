<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\{StoreRequest, UpdateRequest};
use App\Http\Requests\ProductCategory\findWithProductRequest;
use App\Services\ProductCategoryService;
use App\Services\ProductService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponse;

    protected $product_category_service;
    protected $product_service;

    /**
     * Construct
     *
     * @param ProductCategoryService $product_category_service
     */
    public function __construct(
        ProductCategoryService $product_category_service,
        ProductService $product_service
        )
    {
        $this->product_category_service = $product_category_service;
        $this->product_service = $product_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param findWithProductRequest $request
     * @param int $category_id
     * @return \Illuminate\Http\Response
     */
    public function index(findWithProductRequest $request, $category_id)
    {
        return $this->apiResponse(200, 'Success', $this->product_category_service->findWithProduct($category_id, $request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Product\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $product = $this->product_service->storeProduct($request->all());

        if ($product) {
            return $this->apiResponse(200, 'Data created.', $product);
        }

        return $this->apiResponse(500, 'Something went wrong.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->apiResponse(200, 'Success', $this->product_service->findByIdWithPriceStock($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Product\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $product = $this->product_service->updateById($id, $request->all());

        if ($product) {
            return $this->apiResponse(200, 'Data updated.', $product);
        }

        return $this->apiResponse(500, 'Something went wrong.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $productId
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
        $deleted = $this->product_service->deleteById($productId);

        if ($deleted) {
            return $this->apiResponse(200, 'Data deleted.');
        }

        return $this->apiResponse(500, 'Something went wrong.');
    }
}
