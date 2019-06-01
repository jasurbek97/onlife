<?php

namespace App\Http\Controllers\Front\Order;

use App\Http\Controllers\Controller as BaseController;
use App\Http\Requests\Order\Create as Request;
use App\Jobs\Order\Create;
use App\Order;

class Controller extends BaseController
{




    public function store(Request $request)
    {
        if ($this->checkOrder($request)) {
            $request->session()->flash('info', trans('admin.messages.orders.created'));

            return redirect()->back();
        }

        $this->dispatchNow(Create::fromRequest($request));

        $request->session()->flash('info', trans('admin.messages.orders.created'));

        return redirect()->route('index');
    }


    protected function checkOrder(Request $request)
    {
        $phone = $request->getPhone();

        $date_ten = date('Y-m-d H:i:s', time() - 600);
        $date_two = date('Y-m-d H:i:s',time() + 1200);

        $o = Order::where('phone',$phone)
            ->whereBetween('created_at', [$date_ten, $date_two])
            ->first();

        return $o;
    }
}
