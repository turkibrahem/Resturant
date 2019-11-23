<?php

namespace App\Http\Services;

use App\Models\Category;
use Symfony\Component\HttpFoundation\Request;

class CategoryService
{
    public function fillFromRequest(Request $request, $category = null)
    {
        if (!$category) {
            $category = new Category();
        }

        $category->fill($request->request->all());

        $category->active = $request->request->get('active', 1);

        $category->save();

        return $category;
    }
}
