<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('childrens')->where('parent_id', null)->get();
        return $this->showAll($categories, Response::HTTP_OK);
    }
}
