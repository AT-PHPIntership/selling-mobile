<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('public.pages.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProductCategory()
    {
        return view('public.pages.show-product-category');
    }

    /**
     * Display profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('public.pages.show-information-user');
    }
}
