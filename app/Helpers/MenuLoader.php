<?php

declare(strict_types=1);

namespace App\Helpers;

class MenuLoader
{
    public static function make()
    {
        return new static();
    }

    public function menu(): array
    {
        return [
            //menu
            [
                'navheader' => __('locale.main'),
                'slug' => '',
                'authorized' => ['default']
            ],
            //dashboard
            [
                'name' => __('locale.dashboard'),
                'url' => url('admin'),
                'slug' => 'dashboard',
                'icon' => 'pie-chart',
                'authorized' => ['default']
            ],
            //my account
            [
                'name' => __('locale.my_account'),
                'url' => '',
                'slug' => 'account',
                'icon' => 'pie-chart',
                'authorized' => ['default']
            ],
            [
                'navheader' => __('locale.admin'),
                'slug' => '',
                'authorized' => ['default']
            ],
            [
                'name' => __('locale.users'),
                'url' => url('admin.users.index'),
                'slug' => 'admin.users',
                'icon' => 'pie-chart',
                'authorized' => ['default']
            ],
        ];
    }
}