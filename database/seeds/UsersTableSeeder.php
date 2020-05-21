<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nm_user'  =>  'administrator',
                'email'  =>  'administrator@mail.com',
                'password'  =>  bcrypt("administrator"),
            ],
        ];

        User::insert($data);
    }
}
