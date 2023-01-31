<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::whereEmail('admin@admin.com')->first();
        if (!$user)
            $user = new User();

        $user->name = 'Admin';
        $user->login = 'admin';
        $user->password = bcrypt('password');
        $user->email = 'admin@admin.com';

        $user->save();
        $user->assignRole(Role::ADMIN);
    }
}
