<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'xefe',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'responsavel',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'tadmin',
            'guard_name' => 'web'
        ]);
    }
}
