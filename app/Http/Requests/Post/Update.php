<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
/**
 * Class Create
 * @package App\Http\Requests\Post
 * @property string|$title
 * @property string|$body
 * @property string|$image
 */
class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'body' => 'required',
            'image' => 'mimes:jpeg,jpg,png'

        ];
    }
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
