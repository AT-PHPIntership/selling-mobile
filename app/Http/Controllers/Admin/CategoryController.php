<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\EditCategoryRequest;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::paginate(config('paging.number_element_in_page'));
        return view('backend.pages.categories.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $categories = Category::with('parent')->find($id)->get();
        try {
            $category = Category::findOrFail($id);
            if ($category->parent_id) {
                $parrentCategory = Category::with('parent')->findOrFail($id)->getRelation('parent');
            }
            return view('backend.pages.categories.show', compact('parrentCategory', 'category'));
        } catch (Exception $ex) {
            return $ex;
        }
    }
}
