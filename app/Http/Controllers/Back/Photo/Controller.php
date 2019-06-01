<?php

namespace App\Http\Controllers\Back\Photo;

use App\BottomImage;
use App\Helper\FileDelete;
use App\Http\Controllers\Controller as BaseController;
use App\Http\Requests\Photo\Create;
class Controller extends BaseController
{
    public function index()
    {
        $photos = BottomImage::latest()->get();
        return view('back.photo.index',compact('photos'));
    }


    public function store(Create $request)
    {
        $photo = ($request->hasFile('photo'))?  $request->file('photo')->store('uploads/bottom_photo'): '';
        BottomImage::create([
               'image'=> $photo
            ]);

        return back()->with('info', trans('admin.photo.uploaded'));
    }


    public function update()
    {

    }

    public function destroy(BottomImage $photo)
    {
        (FileDelete::deleteFile($photo->getImage()))? $photo->delete():$photo->delete();
        return back()->with('info', trans('admin.photo.deleted'));
    }
}
