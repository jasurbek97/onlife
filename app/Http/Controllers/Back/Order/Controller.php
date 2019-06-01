<?php

namespace App\Http\Controllers\Back\Order;

use App\Http\Controllers\Controller as BaseController;
use App\Order;
use App\Http\Requests\Order\Update as Request;
use App\Jobs\Order\Update;

class Controller extends BaseController
{


    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('back.order.index',compact('orders'));
    }


    public function create($id)
    {
        $note = Order::findOrFail($id);
        return response()->json($note);//view('back.order.index',compact('note'));
    }


    public function update(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $this->dispatchNow(Update::fromRequest($order, $request));

        $request->session()->flash('info', trans('admin.note_added'));
        return redirect()->route('order');
    }

    public function show(Order $order)
    {
       $order->new_order = true;
       $order->save();
       return back();
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return back()->with('info', trans('admin.messages.orders.deleted'));
    }


}
