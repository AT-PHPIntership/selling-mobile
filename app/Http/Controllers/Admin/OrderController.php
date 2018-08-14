<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderDetail;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('user')->paginate(config('setting.paginate.limit_rows'));

        return view('backend.pages.order.list', compact('orders'));
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
        $data = Order::with('user')->where('orders.id', $id)->first();
        $orders = \DB::table('orders')
                    ->join('order_details', 'orders.id', 'order_details.order_id')
                    ->join('products', 'order_details.product_id', 'products.id')
                    ->join('color_products', 'products.id', 'color_products.product_id')
                    ->select('orders.*', 'products.*', 'order_details.amount', 'color_products.price_color_value')
                    ->where('orders.id', $id)->get();

        return view('backend.pages.order.edit', compact('data', 'orders', 'order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request Request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $order = Order::findOrFail($id);
            $input['status'] = $request->status;
            $order->update($input);

            Session::flash('message', __('admin.flash_update_success'));
            Session::flash('alert-class', 'success');
            return redirect()->route('admin.orders.index');
        } catch (Exception $e) {
            Session::flash('message', __('admin.flash_error'));
            Session::flash('alert-class', 'danger');
            return redirect()->back();
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
            $order = Order::findOrFail($id);
            $order->delete();

            Session::flash('message', __('admin.flash_delete_success'));
            Session::flash('alert-class', 'success');
            return redirect()->back();
        } catch (Exception $e) {
            Session::flash('message', __('admin.flash_error'));
            Session::flash('alert-class', 'danger');
            return redirect()->back();
        }
    }
}
