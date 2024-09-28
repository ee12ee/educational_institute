<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Models\Admin;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::create([
            'first_name'=>'ahmad',
                'last_name'=>'esmail',
                'username'=>'aaa',
                'phone'=>'0935210625',
                'email'=>'ahmad@gmail.com',
                'password'=>'DerapDog@12345'
        ]);
        $admin->assignRole('super admin');
        // -------------------------------------------------------------------
        $admin = Admin::create([
            'first_name'=>'sara',
                'last_name'=>'esmail',
                'username'=>'sss',
                'phone'=>'0935210620',
                'email'=>'sara@gmail.com',
                'password'=>'DerapDog@12345'
        ]);
        $admin->assignRole('admin');
        // -------------------------------------------------------------------
        $admin = Admin::create([
            'first_name'=>'randa',
                'last_name'=>'esmail',
                'username'=>'rrr',
                'phone'=>'0935210621',
                'email'=>'randa@gmail.com',
                'password'=>'DerapDog@12345'
        ]);
        $admin->assignRole('employee');
    }
}
