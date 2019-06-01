<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BottomImage
 * @package App
 * @property string|$image
 */
class BottomImage extends Model
{
    protected $fillable = [
        'image'
    ];

    public function getImage():string
    {
        return (string) $this->image;
    }
}
