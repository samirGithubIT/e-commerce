<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            ['name' => 'Admin' , 'email' => 'admin@gmail.com', 'password' => bcrypt(123456), 'user_type' => 'admin'],

            ['name' => 'Customer' , 'email' => 'customer@gmail.com', 'password' => bcrypt(123456), 'user_type' => 'customer']
        ];

        foreach($user as $users){
            // other methods
            // User::insert($user);
            // User::create($user);
            
            $new_user = new User;
            $new_user->name = $users['name'];
            $new_user->email = $users['email'];
            $new_user->password = $users['password'];
            $new_user->user_type = $users['user_type'];
            $new_user->save();

        }
    }
}
