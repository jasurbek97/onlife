<?php

namespace App\Http\Controllers\Back;

use App\BottomImage;
use App\BottomSlider;
use App\Http\Controllers\Controller as BaseController;
use App\Order;
use App\Post;

class Controller extends BaseController
{
    public function index()
    {
        $order = Order::where('new_order',false)->get();
        $posts = Post::all();
        $photos = BottomImage::all();
        $slider = BottomSlider::all();
        return view('back.index',compact('order','posts','photos','slider'));
    }
}
