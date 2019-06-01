<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Update
 * @package App\Http\Requests\Order
 * @property string|$note
 */
class Update extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'note' =>'nullable|string'
        ];
    }

    public function getNote():string
    {
        return (string) $this->note;
    }
}
