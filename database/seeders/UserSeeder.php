<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin Role',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('password')
        ]);
        $admin->assignRole('admin');

        $xefe = User::create([
            'name' => 'Xefe Role',
            'email' => 'xefe@gmail.com',
            'username' => 'xefe',
            'password' => bcrypt('password')
        ]);

        $xefe->assignRole('xefe');

        $responsavel = User::create([
            'name' => 'Responsavel Role',
            'email' => 'responsavel@gmail.com',
            'username' => 'responsavel',
            'password' => bcrypt('password')
        ]);

        $responsavel->assignRole('responsavel');

        $tadmin = User::create([
            'name' => 'Tekniku Admin Role',
            'email' => 'tadmin@gmail.com',
            'username' => 'tekniku admin',
            'password' => bcrypt('password')
        ]);

        $tadmin->assignRole('tadmin');
    }
}
