<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateCategoryRequest;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listCategoriesParent = Category::where('parent_id', null)->get();
        $data['listCategoriesParent'] = $listCategoriesParent;
        return view('backend.pages.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\Backend\CreateCategoryRequest $request CreateCategoryRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        try {
            if (Category::create($request->all())) {
                return redirect()->route('admin.categories.index')->with('message', __('category.admin.message.add'));
            }
        } catch (Exception $ex) {
            return redirect()->route('admin.categories.create')->with('message', __('category.admin.message.add_fail'));
        }
    }
}
