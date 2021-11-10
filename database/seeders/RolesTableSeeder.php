<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Admin',
            ],
            [
                'id'    => 2,
                'title' => 'Dean',
            ],
            [
                'id'   => 3,
                'title' => 'Mentor',
            ],
            [
                'id'    => 4,
                'title' => 'Student',
            ],
            [
                'id'    => 5,
                'title' => 'HOD',
            ],
            
        ];

        Role::insert($roles);
    }
}
