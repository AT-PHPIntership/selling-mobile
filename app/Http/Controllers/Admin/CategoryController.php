<?php

namespace App\Http\Controllers\Admin;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateCategoryRequest;
use App\Http\Requests\Backend\EditCategoryRequest;
use App\Http\Requests\Backend\CategoryRequest;
use App\Models\Category;
use Exception;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::orderBy('updated_at', 'desc')->paginate(config('paging.number_element_in_page'));
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
                Session::flash('message', __('category.admin.message.add'));
                return redirect()->route('admin.categories.index');
            }
        } catch (Exception $ex) {
            Session::flash('message', __('category.admin.message.add_fail'));
            return redirect()->route('admin.categories.create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $listCategoriesParent = Category::where('parent_id', null)->get();
        return view('backend.pages.categories.edit', compact('category', 'listCategoriesParent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditCategoryRequest $request  EditCategoryRequest
     * @param Category            $category Category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->all());
            Session::flash('message', __('category.admin.message.edit'));
            return redirect()->route('admin.categories.index');
        } catch (Exception $ex) {
            Session::flash('message', __('category.admin.message.edit_fail'));
            return redirect()->route('admin.categories.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::with(['childrens'])->findOrFail($id);
            if ($category->childrens) {
                $category->childrens()->delete();
            }
            $category->delete();
            Session::flash('message', __('category.admin.message.del'));
            return redirect()->route('admin.categories.index');
        } catch (Exception $ex) {
            Session::flash('message', __('category.admin.message.del_fail'));
            return redirect()->route('admin.categories.index');
        }
    }
}
