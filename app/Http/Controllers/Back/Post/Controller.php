<?php

namespace App\Http\Controllers\Back\Post;

use App\Helper\FileDelete;
use App\Http\Controllers\Controller as BaseController;
use App\Post;
use App\Jobs\Post\Create;
use App\Jobs\Post\Update;

use App\Http\Requests\Post\Create as Request;
use App\Http\Requests\Post\Update as UpdateRequest;

class Controller extends BaseController
{
    public function index()
    {
        $posts = Post::orderBy('id','desc')->get();
        return view('back.post.index',compact('posts'));
    }


    public function create()
    {
        return view('back.post.create');
    }


    public function edit(Post $post)
    {
        return view('back.post.update',compact('post'));
    }


    public function store(Request $request)
    {
        $path = ($request->hasFile('image'))?  $request->file('image')->store('uploads/posts'): null;

        $this->dispatchNow(Create::fromRequest($request,$path));

        $request->session()->flash('info', trans('admin.messages.posts.created'));

        return redirect()->route('post');
    }



    public function update(Post $post,UpdateRequest $request)
    {
       if($request->hasFile('image'))
       {
           FileDelete::deleteFile($post->image);
           $path =  $request->file('image')->store('uploads/posts');

       }
       else
           $path = $post->image;

        $this->dispatchNow(Update::fromRequest($post,$request,$path));

        $request->session()->flash('info', trans('admin.messages.posts.updated'));

        return redirect()->route('post');
    }


    public function destroy(Post $post)
    {
        (FileDelete::deleteFile($post->image))? $post->delete(): $post->delete();
        return back()->with('info', trans('admin.messages.posts.deleted'));
    }


}
