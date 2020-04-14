<?php

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
        DB::table('users')->insert([
            ['name' => env('ADMIN_USERNAME'),'email' => env('ADMIN_USERNAME'), 'password' => password_hash(env('ADMIN_PASSWORD'),PASSWORD_DEFAULT)],
        ]);

        DB::table('user_roles')->insert([
            ['id_user' => 1, 'id_role' => 1]
        ]);
    }
}
