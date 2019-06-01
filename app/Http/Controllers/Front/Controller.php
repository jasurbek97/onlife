<?php

namespace App\Http\Controllers\Front;

use App\BottomImage;
use App\BottomSlider;
use App\Http\Controllers\Controller as BaseController;
use App\Post;

class Controller extends BaseController
{
    public function index()
    {
        $posts = Post::all();
        $photos = BottomImage::all();
        $sliders = BottomSlider::all();
        return view('front.index',compact('posts','photos','sliders'));
    }
}
