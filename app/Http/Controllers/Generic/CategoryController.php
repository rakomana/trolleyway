<?php

namespace App\Http\Controllers\Generic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * @var $category
     */
    private $category;

    /**
     * Inject models into the constructor
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * get resources in storage
     * @return View
     * 
     */
    public function index()
    {
        $category = $this->category->all();

        return redirect()->back()->with($category);
    }

    /**
     * store a resource in storage
     * @param Request $request
     * @return View
     * 
     */
    public function store(Request $request)
    {
        $category = new $this->category();
        $category->category = $request->category;
        $category->save();

        return redirect()->back()->with('success', 'category added succesfully');
    }

    /**
     * delete resource in storage
     * @param Category $category
     * @return View
     * 
     */
    public function show(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'category deleted succesfully');
    }
}
