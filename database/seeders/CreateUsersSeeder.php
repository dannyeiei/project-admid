<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = [
            [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'is_admin' => '1',
            'password' => bcrypt('123456')
        ],
        [
            'name' => 'User',
            'email' => 'User@User.com',
            'is_admin' => '0',
            'password' => bcrypt('123456')
        ]
        ];
        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
