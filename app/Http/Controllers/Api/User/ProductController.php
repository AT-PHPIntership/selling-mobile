<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiController;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Product;

class ProductController extends ApiController
{
    /**
     * Get list product with relationship
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = [
            'products.*',
            'promotions.product_id',
            'promotions.promotion_value',
            'promotions.from_date',
            'promotions.to_date',
            \DB::raw('IF(promotions.promotion_value, ROUND(products.price * (promotions.promotion_value / 100), 0), products.price ) AS actual_price')
        ];

        $products = Product::with(['categories','colorProducts'])
        ->leftJoin('promotions', function ($join) {
            $datetimeNow = date(config('define.date_time_format'));
            $join->on('products.id', '=', 'promotions.product_id')->where('from_date', '<', $datetimeNow)->where('to_date', '>', $datetimeNow);
        })
        ->latest('products.id')
        ->paginate(config('setting.paginate.limit_rows_index'), $columns);
        $colection = collect($products);
        return $this->showAll($colection, Response::HTTP_OK);
    }

    /**
     *Get list product with relationship
     *
     * @return \Illuminate\Http\Response
     */
    public function showProductCategory()
    {
        $columns = [
            'products.*',
            'promotions.product_id',
            'promotions.promotion_value',
            'promotions.from_date',
            'promotions.to_date',
            \DB::raw('IF(promotions.promotion_value, ROUND(products.price * (promotions.promotion_value / 100), 0), products.price ) AS actual_price')
        ];

        $products = Product::with(['categories','colorProducts'])
        ->leftJoin('promotions', function ($join) {
            $datetimeNow = date(config('define.date_time_format'));
            $join->on('products.id', '=', 'promotions.product_id')->where('from_date', '<=', $datetimeNow)->where('to_date', '>=', $datetimeNow);
        })
        ->latest('products.id')
        ->paginate(100, $columns);
        $colection = collect($products);
        return $this->showAll($colection, Response::HTTP_OK);
    }
}
