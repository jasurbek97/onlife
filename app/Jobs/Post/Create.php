<?php

namespace App\Jobs\Post;


use Illuminate\Support\Arr;
use  App\Http\Requests\Post\Create as CreateRequest;
use App\Post;
class Create
{
    protected $attributes;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        $this->attributes = Arr::only($attributes ,['title','image','body']);
    }

    public static function fromRequest(CreateRequest $request,$path )
    {


        return new static([
            'title'  => $request->getTitle(),
            'image' => $path,
            'body' => $request->getBody()
        ]);

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Post::insert($this->attributes);
    }
}
