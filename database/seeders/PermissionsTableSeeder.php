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
                'title' => 'consultant_create',
            ],
            [
                'id'    => 18,
                'title' => 'consultant_edit',
            ],
            [
                'id'    => 19,
                'title' => 'consultant_show',
            ],
            [
                'id'    => 20,
                'title' => 'consultant_delete',
            ],
            [
                'id'    => 21,
                'title' => 'consultant_access',
            ],
            [
                'id'    => 22,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 23,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 24,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 25,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 26,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 27,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 28,
                'title' => 'course_create',
            ],
            [
                'id'    => 29,
                'title' => 'course_edit',
            ],
            [
                'id'    => 30,
                'title' => 'course_show',
            ],
            [
                'id'    => 31,
                'title' => 'course_delete',
            ],
            [
                'id'    => 32,
                'title' => 'course_access',
            ],
            [
                'id'    => 33,
                'title' => 'news_create',
            ],
            [
                'id'    => 34,
                'title' => 'news_edit',
            ],
            [
                'id'    => 35,
                'title' => 'news_show',
            ],
            [
                'id'    => 36,
                'title' => 'news_delete',
            ],
            [
                'id'    => 37,
                'title' => 'news_access',
            ],
            [
                'id'    => 38,
                'title' => 'joining_create',
            ],
            [
                'id'    => 39,
                'title' => 'joining_edit',
            ],
            [
                'id'    => 40,
                'title' => 'joining_show',
            ],
            [
                'id'    => 41,
                'title' => 'joining_delete',
            ],
            [
                'id'    => 42,
                'title' => 'joining_access',
            ],
            [
                'id'    => 43,
                'title' => 'contact_create',
            ],
            [
                'id'    => 44,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 45,
                'title' => 'contact_show',
            ],
            [
                'id'    => 46,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 47,
                'title' => 'contact_access',
            ],
            [
                'id'    => 48,
                'title' => 'quotation_create',
            ],
            [
                'id'    => 49,
                'title' => 'quotation_edit',
            ],
            [
                'id'    => 50,
                'title' => 'quotation_show',
            ],
            [
                'id'    => 51,
                'title' => 'quotation_delete',
            ],
            [
                'id'    => 52,
                'title' => 'quotation_access',
            ],
            [
                'id'    => 53,
                'title' => 'knowledge_center_access',
            ],
            [
                'id'    => 54,
                'title' => 'article_create',
            ],
            [
                'id'    => 55,
                'title' => 'article_edit',
            ],
            [
                'id'    => 56,
                'title' => 'article_show',
            ],
            [
                'id'    => 57,
                'title' => 'article_delete',
            ],
            [
                'id'    => 58,
                'title' => 'article_access',
            ],
            [
                'id'    => 59,
                'title' => 'book_create',
            ],
            [
                'id'    => 60,
                'title' => 'book_edit',
            ],
            [
                'id'    => 61,
                'title' => 'book_show',
            ],
            [
                'id'    => 62,
                'title' => 'book_delete',
            ],
            [
                'id'    => 63,
                'title' => 'book_access',
            ],
            [
                'id'    => 64,
                'title' => 'sample_create',
            ],
            [
                'id'    => 65,
                'title' => 'sample_edit',
            ],
            [
                'id'    => 66,
                'title' => 'sample_show',
            ],
            [
                'id'    => 67,
                'title' => 'sample_delete',
            ],
            [
                'id'    => 68,
                'title' => 'sample_access',
            ],
            [
                'id'    => 69,
                'title' => 'service_create',
            ],
            [
                'id'    => 70,
                'title' => 'service_edit',
            ],
            [
                'id'    => 71,
                'title' => 'service_show',
            ],
            [
                'id'    => 72,
                'title' => 'service_delete',
            ],
            [
                'id'    => 73,
                'title' => 'service_access',
            ],
            [
                'id'    => 74,
                'title' => 'request_service_create',
            ],
            [
                'id'    => 75,
                'title' => 'request_service_edit',
            ],
            [
                'id'    => 76,
                'title' => 'request_service_show',
            ],
            [
                'id'    => 77,
                'title' => 'request_service_delete',
            ],
            [
                'id'    => 78,
                'title' => 'request_service_access',
            ],
            [
                'id'    => 79,
                'title' => 'client_create',
            ],
            [
                'id'    => 80,
                'title' => 'client_edit',
            ],
            [
                'id'    => 81,
                'title' => 'client_show',
            ],
            [
                'id'    => 82,
                'title' => 'client_delete',
            ],
            [
                'id'    => 83,
                'title' => 'client_access',
            ],
            [
                'id'    => 84,
                'title' => 'clients_list_access',
            ],
            [
                'id'    => 85,
                'title' => 'about_us_edit',
            ],
            [
                'id'    => 86,
                'title' => 'about_us_access',
            ],
            [
                'id'    => 87,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
