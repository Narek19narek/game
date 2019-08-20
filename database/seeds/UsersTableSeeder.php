<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        $roles = ['admin', 'user'];
        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role
            ]);
        }
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'admin',
            'role_id' => 1,
            'email' => 'admin@mail.com',
            'password' => Hash::make(1234),
        ]);
    }
}
