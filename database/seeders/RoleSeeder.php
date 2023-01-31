<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::findOrCreate(Role::ADMIN, config('auth.defaults.guard'));
        Role::findOrCreate(Role::AGENT, config('auth.defaults.guard'));
    }
}
