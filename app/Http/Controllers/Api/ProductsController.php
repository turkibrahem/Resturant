<?php

namespace App\Http\Controllers\Api;

use App\Repositories\ProductRepository;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Http\Requests\Api\ProductRequest;
use App\Http\Services\ProductService;
use App\Models\Product ;

class ProductsController extends Controller
{
    protected $productRepository;
    protected $productService;

    public function __construct(ProductService $productService, ProductRepository $productRepository)
    {
        $this->productService = $productService;
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        $list = $this->productRepository->searchFromRequest($request)->get();
        return response()->json($list);
    }
    public function show(Product $product)
    {

        return response()->json(['product'=>$product]);
    }

    public function store(ProductRequest $request)
    {
        $product = $this->productService->fillFromRequest($request);
        return response()->json('saved');
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product = $this->productService->fillFromRequest($request, $product);
        return response()->json('updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json('deleted');
    }
}
