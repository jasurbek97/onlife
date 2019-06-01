<?php

namespace App\Http\Controllers\Back\Slider;

use App\BottomSlider;
use App\Helper\FileDelete;
use App\Http\Controllers\Controller as BaseController;
use App\Http\Requests\Slider\Create;
class Controller extends BaseController
{
    public function index()
    {
        $sliders = BottomSlider::latest()->get();
        return view('back.slider.index',compact('sliders'));
    }


    public function store(Create $request)
    {
        $image = ($request->hasFile('image'))?  $request->file('image')->store('uploads/bottom_slider'): '';

        BottomSlider::create([
           'image' =>$image,
           'body' =>$request->getBody()
       ]);

        return back()->with('info', trans('admin.slider.created'));

    }

    public function edit(BottomSlider $slider)
    {
        return view('back.slider.update',compact('slider'));
    }


    public function destroy(BottomSlider $slider)
    {
        (FileDelete::deleteFile($slider->getImage()))? $slider->delete():$slider->delete();
        return back()->with('info', trans('admin.slider.deleted'));

    }
}
