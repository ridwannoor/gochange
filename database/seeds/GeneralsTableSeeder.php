<?php

use Illuminate\Database\Seeder;

class GeneralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generals')->insert([
            'title'     => 'Atharva.id',
            'deskripsi'    => 'Web Online',
            'image' => '',
            'phone' => '087788518142',
            'alamat'     => 'Atharva.id',
            'email'    => 'Web Online',
            'website' => '',
            'facebook' => '',
            'whatsapp' => '',
            'instagram' => ''
            // 'is_admin' => true,
            // 'role_id'  => '1'
        ]);
    }
}
