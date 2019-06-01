<?php

namespace App\Jobs\Order;
use App\Order;
use Illuminate\Support\Arr;
use App\Http\Requests\Order\Update as Request;
class Update
{
    protected $attributes;
    protected $orders;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order,array  $attributes = [])
    {
        $this->attributes = Arr::only($attributes ,'note');
        $this->orders = $order;
    }

    public static function fromRequest($order,Request $request)
    {
        return new static($order,[
            'note' => $request->getNote()
        ]);
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $this->orders->update($this->attributes);
    }
}
