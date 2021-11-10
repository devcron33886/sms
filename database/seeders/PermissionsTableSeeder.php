<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'category_create',
            ],
            [
                'id'    => 18,
                'title' => 'category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'category_show',
            ],
            [
                'id'    => 20,
                'title' => 'category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'category_access',
            ],
            [
                'id'    => 22,
                'title' => 'question_create',
            ],
            [
                'id'    => 23,
                'title' => 'question_edit',
            ],
            [
                'id'    => 24,
                'title' => 'question_show',
            ],
            [
                'id'    => 25,
                'title' => 'question_delete',
            ],
            [
                'id'    => 26,
                'title' => 'question_access',
            ],
            [
                'id'    => 27,
                'title' => 'answer_create',
            ],
            [
                'id'    => 28,
                'title' => 'answer_edit',
            ],
            [
                'id'    => 29,
                'title' => 'answer_show',
            ],
            [
                'id'    => 30,
                'title' => 'answer_delete',
            ],
            [
                'id'    => 31,
                'title' => 'answer_access',
            ],
            [
                'id'    => 32,
                'title' => 'testimonial_create',
            ],
            [
                'id'    => 33,
                'title' => 'testimonial_edit',
            ],
            [
                'id'    => 34,
                'title' => 'testimonial_show',
            ],
            [
                'id'    => 35,
                'title' => 'testimonial_delete',
            ],
            [
                'id'    => 36,
                'title' => 'testimonial_access',
            ],
            [
                'id'    => 37,
                'title' => 'student_create',
            ],
            [
                'id'    => 38,
                'title' => 'student_edit',
            ],
            [
                'id'    => 39,
                'title' => 'student_show',
            ],
            [
                'id'    => 40,
                'title' => 'student_delete',
            ],
            [
                'id'    => 41,
                'title' => 'student_access',
            ],
            [
                'id'    => 42,
                'title' => 'mentor_create',
            ],
            [
                'id'    => 43,
                'title' => 'mentor_edit',
            ],
            [
                'id'    => 44,
                'title' => 'mentor_show',
            ],
            [
                'id'    => 45,
                'title' => 'mentor_delete',
            ],
            [
                'id'    => 46,
                'title' => 'mentor_access',
            ],
            [
                'id'    => 47,
                'title' => 'department_create',
            ],
            [
                'id'    => 48,
                'title' => 'department_edit',
            ],
            [
                'id'    => 49,
                'title' => 'department_show',
            ],
            [
                'id'    => 50,
                'title' => 'department_delete',
            ],
            [
                'id'    => 51,
                'title' => 'department_access',
            ],
            [
                'id'    => 52,
                'title' => 'profile_create',
            ],
            [
                'id'    => 53,
                'title' => 'profile_edit',
            ],
            [
                'id'    => 54,
                'title' => 'profile_show',
            ],
            [
                'id'    => 55,
                'title' => 'profile_delete',
            ],
            [
                'id'    => 56,
                'title' => 'profile_access',
            ],
            [
                'id'    => 57,
                'title' => 'overview_create',
            ],
            [
                'id'    => 58,
                'title' => 'overview_edit',
            ],
            [
                'id'    => 59,
                'title' => 'overview_show',
            ],
            [
                'id'    => 60,
                'title' => 'overview_delete',
            ],
            [
                'id'    => 61,
                'title' => 'overview_access',
            ],
            [
                'id'    => 62,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}