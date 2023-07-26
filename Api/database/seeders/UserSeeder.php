<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Chhorn Kakada',
                'email' => 'chhornkakada22@gmail.com',
                'password' => '123456',
                'role_id' => '1'
            ],
            [
                'name' => 'Sacda',
                'email' => 'sacda@gmail.com',
                'password' => '123456',
                'role_id' => '2'
            ],
        ];


        foreach ($users as $user) {
            // foreach ($user as $data) {
                User::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'password' => bcrypt($user['password']),
                    'role_id' => $user['role_id'],
                ]);
            // }

        }
    }
}
