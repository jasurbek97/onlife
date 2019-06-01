<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BottomSlider
 * @package App
 * @property string|$body
 * @property string|null $image
 */
class BottomSlider extends Model
{
    protected $fillable =[
        'body','image'
    ];

    public function getBody():string
    {
        return (string) $this->body;
    }

    public function getImage():string
    {
        return (string) $this->image;
    }
}
