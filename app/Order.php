<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App
 * @property string|$name
 * @property string|$Phone
 * @property string|null $email
 * @property bool|$new_order
 * @property string|null $note
 */
class Order extends Model
{
    protected $fillable = [
        'name','phone','email','new_order','note'
    ];


    public function getName():string
    {
        return (string) $this->name;
    }

    public function getPhone():string
    {
        return (string) $this->Phone;
    }

    public function getEmail():string
    {
        return (string) $this->email;
    }

    public function getNewOrder():bool
    {
        return (bool) $this->new_order;
    }

    public function getNote():string
    {
        return (string) $this->note;
    }
}
