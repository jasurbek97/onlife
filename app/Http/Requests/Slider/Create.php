<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Create
 * @package App\Http\Requests\Slider
 * @property string|$body
 */
class Create extends FormRequest
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
            'body' => 'required',
            'image' => 'mimes:jpeg,jpg,png'
        ];
    }
    public function getBody():string
    {
        return (string) $this->body;
    }
}
