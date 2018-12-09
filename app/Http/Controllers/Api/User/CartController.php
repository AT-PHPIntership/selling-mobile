<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetail;
use App\Http\Controllers\Api\ApiController;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Pagination\LengthAwarePaginator;

class CartController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        $infoOrder = [];
        $cart = json_decode($request->cart);
        $userId = json_decode($request->userId);
        $totalPrice = json_decode($request->totalPrice);
        // $request['user_id'] = $user->id;
        // $request['payment_status'] = 0;
        // $request['submit_time'] = Carbon::now()->toDateTimeString();
        // $order = Order::create($request->all());


        Order::create([
            'user_id' => $userId,
            'total_price' => $totalPrice,
        ]);

        foreach ($cart as $item) {
            OrderDetail::create([
                'order_id' => $orderId,
                'product_id' => $item->idProduct,
                'quantity' => $item->quantity,
            ]);
        }
        // $order = new Order;
        // $order->name = 'aaaaaaaaa';
        // $order->parent_id = 3;
        // $order->save();


        // $orderId = Order::orderby('created_at', 'desc')->first();

        // dd(123);

        // $cart->load('orderdetails');
        array_push($infoOrder, $cart, $userId, $totalPrice);
        $data = collect($infoOrder);

        return $this->successResponse($data, Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function getInfoOrder(Request $request)
    {

    }
}
