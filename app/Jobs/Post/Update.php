<?php

namespace App\Jobs\Post;

use App\Http\Requests\Post\Update as Request;
use App\Post;
use Illuminate\Support\Arr;
class Update
{
    protected $attributes;
    protected $posts;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post,array $attributes = [])
    {
        $this->attributes = Arr::only($attributes,['title','image','body']);
        $this->posts = $post;
    }

    public static function fromRequest($post,Request $request,$path)
    {

        return  new static($post,[
            'title'=> $request->getTitle(),
            'body' => $request->getBody(),
            'image' =>$path
        ]);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->posts->update($this->attributes);
    }
}
