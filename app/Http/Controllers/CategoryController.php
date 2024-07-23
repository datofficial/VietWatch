<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Dashboard.Category.index', compact('categories'));
    }

    public function create()
    {
        return view('Dashboard.Category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Danh mục đã được tạo thành công');
    }

    public function show(Category $category)
    {
        return view('Dashboard.Category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('Dashboard.Category.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories.index')->with('success', 'Danh mục đã được cập nhật thành công');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Danh mục đã được xóa thành công');
    }
}
