<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\BranchProduct;
use Symfony\Component\HttpFoundation\Request;

class ProductRepository
{
    public function searchFromRequest($request)
    {
        $products = Product::orderBy('id', 'DESC');

        if ($request->query->has('category')) {
            $products->where('category_id', '=', $request->query->get('category'));
        }

        return $products;
    }

}
