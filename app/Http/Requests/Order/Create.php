<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Create
 * @package App\Http\Requests\Order
 * @property string|$name
 * @property string|$phone
 * @property string|null $email
 */
class Create extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required|string|max:50',
            'phone' => 'required|string|max:13',
            'email'=> 'nullable|string|max:50'
        ];
    }

    public function getName():string
    {
        return (string) $this->name;
    }

    public function getPhone():string
    {
        return (string) $this->phone;
    }

    public function getEmail():string
    {
        return (string) $this->email;
    }
}
