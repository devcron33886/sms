<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'name' => 'Computer Science',
                'short_name' => 'C.S',
                'created_at' => now(),
            ],
            [
                'name' => 'Information System',
                'short_name' => 'I.S',
                'created_at' => now(),
            ],
            [
                'name' => 'Computer Engineering',
                'short_name' => 'C.E',
                'created_at' => now(),
            ],

        ];
        Department::insert($departments);
    }
}
