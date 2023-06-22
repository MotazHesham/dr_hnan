<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {   
        $i = 1;
        $permissions = [
            [
                'id'    => $i++,
                'title' => 'user_management_access',
            ],
            // [
            // 'id'    => $i++,
            //     'title' => 'permission_create',
            // ],
            // [
            // 'id'    => $i++,
            //     'title' => 'permission_edit',
            // ],
            // [
            // 'id'    => $i++,
            //     'title' => 'permission_show',
            // ],
            // [
            // 'id'    => $i++,
            //     'title' => 'permission_delete',
            // ],
            // [
            // 'id'    => $i++,
            //     'title' => 'permission_access',
            // ],
            [
                'id'    => $i++,
                'title' => 'role_create',
            ],
            [
                'id'    => $i++,
                'title' => 'role_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'role_show',
            ],
            [
                'id'    => $i++,
                'title' => 'role_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'role_access',
            ],
            [
                'id'    => $i++,
                'title' => 'user_create',
            ],
            [
                'id'    => $i++,
                'title' => 'user_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'user_show',
            ],
            [
                'id'    => $i++,
                'title' => 'user_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'user_access',
            ],
            [
                'id'    => $i++,
                'title' => 'consultant_create',
            ],
            [
                'id'    => $i++,
                'title' => 'consultant_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'consultant_show',
            ],
            [
                'id'    => $i++,
                'title' => 'consultant_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'consultant_access',
            ],
            [
                'id'    => $i++,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => $i++,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => $i++,
                'title' => 'course_create',
            ],
            [
                'id'    => $i++,
                'title' => 'course_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'course_show',
            ],
            [
                'id'    => $i++,
                'title' => 'course_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'course_access',
            ],
            [
                'id'    => $i++,
                'title' => 'news_create',
            ],
            [
                'id'    => $i++,
                'title' => 'news_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'news_show',
            ],
            [
                'id'    => $i++,
                'title' => 'news_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'news_access',
            ],
            // [
            // 'id'    => $i++,
            //     'title' => 'joining_create',
            // ],
            // [
            // 'id'    => $i++,
            //     'title' => 'joining_edit',
            // ],
            [
                'id'    => $i++,
                'title' => 'joining_show',
            ],
            [
                'id'    => $i++,
                'title' => 'joining_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'joining_access',
            ],
            // [
            // 'id'    => $i++,
            //     'title' => 'contact_create',
            // ],
            // [
            // 'id'    => $i++,
            //     'title' => 'contact_edit',
            // ],
            [
                'id'    => $i++,
                'title' => 'contact_show',
            ],
            [
                'id'    => $i++,
                'title' => 'contact_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'contact_access',
            ],
            // [
            // 'id'    => $i++,
            //     'title' => 'quotation_create',
            // ],
            // [
            // 'id'    => $i++,
            //     'title' => 'quotation_edit',
            // ],
            [
                'id'    => $i++,
                'title' => 'quotation_show',
            ],
            [
                'id'    => $i++,
                'title' => 'quotation_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'quotation_access',
            ],
            [
                'id'    => $i++,
                'title' => 'knowledge_center_access',
            ],
            [
                'id'    => $i++,
                'title' => 'article_create',
            ],
            [
                'id'    => $i++,
                'title' => 'article_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'article_show',
            ],
            [
                'id'    => $i++,
                'title' => 'article_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'article_access',
            ],
            [
                'id'    => $i++,
                'title' => 'book_create',
            ],
            [
                'id'    => $i++,
                'title' => 'book_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'book_show',
            ],
            [
                'id'    => $i++,
                'title' => 'book_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'book_access',
            ],
            [
                'id'    => $i++,
                'title' => 'sample_create',
            ],
            [
                'id'    => $i++,
                'title' => 'sample_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'sample_show',
            ],
            [
                'id'    => $i++,
                'title' => 'sample_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'sample_access',
            ],
            [
                'id'    => $i++,
                'title' => 'service_create',
            ],
            [
                'id'    => $i++,
                'title' => 'service_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'service_show',
            ],
            [
                'id'    => $i++,
                'title' => 'service_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'service_access',
            ],
            // [
            // 'id'    => $i++,
            //     'title' => 'request_service_create',
            // ],
            [
            'id'    => $i++,
                'title' => 'request_service_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'request_service_show',
            ],
            [
                'id'    => $i++,
                'title' => 'request_service_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'request_service_access',
            ],
            [
                'id'    => $i++,
                'title' => 'client_create',
            ],
            [
                'id'    => $i++,
                'title' => 'client_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'client_show',
            ],
            [
                'id'    => $i++,
                'title' => 'client_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'client_access',
            ],
            [
                'id'    => $i++,
                'title' => 'clients_list_access',
            ],
            [
                'id'    => $i++,
                'title' => 'about_us_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'about_us_access',
            ],
            [
                'id'    => $i++,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
