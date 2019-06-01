<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'onlife@mail.ru',
            'is_admin' => true,
            'password' => bcrypt('onlife@mail.ru'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
