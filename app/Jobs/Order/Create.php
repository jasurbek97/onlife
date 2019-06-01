<?php

namespace App\Jobs\Order;


use App\Order;
use Illuminate\Support\Arr;
use  App\Http\Requests\Order\Create as CreateRequest;
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
        $this->attributes = Arr::only($attributes ,['name','phone','email']);

    }

    public static function fromRequest(CreateRequest $request )
    {
                    $email = (!empty($request->getEmail()))? $request->getEmail() : 'нет электронной почты!';

                    $text = "🗣 Поступил новый заказ\n"
                        ."👨‍ Имя: "."$request->name\n"
                        ."📞 Телефонный Номер:"."$request->phone\n"
                        ."📧 Эл. адрес: "."$email\n"
                        ."⏰ Время заказа: ".date('d.m.Y - H:i', time());

                    $ch = curl_init();

                    curl_setopt($ch, CURLOPT_URL,"https://garage-defend.com/telegram/bot/onlife");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS,
                        "str={$text}");

                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    curl_exec($ch);

                    curl_close ($ch);



                    return new static([
                        'name'  => $request->getName(),
                        'phone' => $request->getPhone(),
                        'email' => $request->getEmail()
                    ]);

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Order::create($this->attributes);
    }
}
