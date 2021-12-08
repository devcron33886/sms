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
                'approved'       => 1,
                'access_level'   => 1,
            ],
            [
                'id'             => 2,
                'name'           => 'DEAN',
                'email'          => 'dean@sms.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'approved'       => 1,
                'access_level'   => 3,
            ],
            [
                'id'             => 3,
                'name'           => 'Mentor',
                'email'          => 'mentor@sms.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'approved'       => 1,
                'access_level'   => 3,
            ],
            [
                'id'             => 4,
                'name'           => 'Student',
                'email'          => 'student@sms.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'approved'       => 1,
                'access_level'   => 4,
            ],
            [
                'id'             => 5,
                'name'           => 'HOD',
                'email'          => 'hod@sms.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'approved'       => 1,
                'access_level'   => 5,
            ],
        ];

        User::insert($users);
    }
}
