<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Product;

class HomeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productPromotions = Product::with([
            'categories',
            'colorProducts',
            'promotions' => function ($query) {
                $query->where('from_date', '<=', now())
                    ->where('to_date', '>=', now());
            }
        ])->limit(4)->get();

        $productIphones = Product::with([
            'colorProducts',
            'promotions',
            'categories' => function ($query) {
                $query->where('name', 'Iphone');
            }
        ])->limit(8)->get();

        $productSamsungs = Product::with([
            'colorProducts',
            'promotions',
            'categories' => function ($query) {
                $query->where('name', 'Samsung');
            }
        ])->limit(8)->get();

        return $this->showAll($productPromotions, Response::HTTP_OK);
    }
}
