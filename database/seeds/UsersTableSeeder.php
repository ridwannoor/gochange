<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'Ridwan',
            'email'    => 'contact@simungil.com',
            'password' => bcrypt('password'),
            // 'is_admin' => true,
            // 'role_id'  => '1'
        ]);
    }
}
