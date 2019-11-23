<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function searchFromRequest($request)
    {
        $categories = Category::orderBy('id', 'DESC')
            ->when($request->get('active'), function ($categories) use ($request) {
                return $categories->where('active', '=', $request->get('active'));
            });
            

        if ($request->filled('name')) {
            $categories->whereHas('translations', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->query->get('name') . '%');
            });
        }

        return $categories;
    }
}
