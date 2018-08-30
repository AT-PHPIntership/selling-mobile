<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Product;
use Illuminate\Support\Collection;
use PHP_CodeSniffer\Config;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function promotion()
    {
        $productPromotions = Product::with([
            'categories',
            'colorProducts',
            'promotions' => function ($query) {
                $query->where('from_date', '<=', now())
                    ->where('to_date', '>=', now());
            }
        ])->limit(4)->latest()->get();

        return $this->showAll($productPromotions, Response::HTTP_OK);
    }
}
