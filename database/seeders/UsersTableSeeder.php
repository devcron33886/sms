<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@sms.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'access_level'   => 1,
                'created_at' => now(),
            ],
            [
                'id'             => 2,
                'name'           => 'DEAN',
                'email'          => 'dean@sms.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'access_level'   => 2,
                'created_by' => now(),
            ],
            [
                'id'             => 3,
                'name'           => 'Mentor',
                'email'          => 'mentor@sms.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'access_level'   => 3,
                'created_at'    => now(),
            ],
            [
                'id'             => 4,
                'name'           => 'Student',
                'email'          => 'student@sms.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'access_level'   => 4,
                'created_at'    => now(),
            ],
            [
                'id'             => 5,
                'name'           => 'HOD',
                'email'          => 'hod@sms.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'access_level'   => 5,
                'created_at' =>now(),
            ],
        ];

        User::insert($users);
    }
}
