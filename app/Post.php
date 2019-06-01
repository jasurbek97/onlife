<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App
 * @property string|$title
 * @property string|$body
 * @property string|$image
 */
class Post extends Model
{
    protected $fillable = [
        'title','body','image'
    ];

    public function getTitle():string
    {
        return (string) $this->title;
    }

    public function getBody():string
    {
        return (string) $this->body;
    }

    public function getImage():string
    {
        return (string) $this->image;
    }
}
