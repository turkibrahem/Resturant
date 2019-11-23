<?php

namespace App\Http\Services;

use App\Models\Product;
use App\Models\ProductImage;
use App\Repositories\ProductRepository;
// use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Resources\Products;
use Symfony\Component\HttpFoundation\Request;
use File;

class ProductService
{

    private $uploaderService;
    protected $productRepository;

    public function __construct(UploaderService $uploaderService, ProductRepository $productRepository)
    {
        $this->uploaderService = $uploaderService;
        $this->productRepository = $productRepository;
    }

    public function fillFromRequest(Request $request, $product = null)
    {
        if (!$product) {
            $product = new Product() ;
        }

        $product->fill($request->all());

        if (!empty($request->file('image'))) {
            $product->image = $this->uploaderService->upload($request->file('image'), 'product_image');
        }
        $product->active = $request->input("active", 0);
        $product->save() ;
        return $product ;
    }

}
