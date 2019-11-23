<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpFoundation\Request;
use  App\Http\Requests\Api\CategoryRequest ;
use App\Http\Services\CategoryService ;
class CategoriesController extends Controller
{
    protected $categoryRepository;
    protected $categoryService;
    public function __construct(CategoryRepository $categoryRepository, CategoryService $categoryService)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $list = $this->categoryRepository->searchFromRequest($request)->get();
        return response()->json($list);
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }
    public function products(Category $category)
    {
        $products = $category->products()->get();
        return $products;
        return response()->json(['products' => $products]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json('deleted');
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryService->fillFromRequest($request);
        return response()->json('added');
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryService->fillFromRequest($request, $category);
        return response()->json('updated');
    }

}
