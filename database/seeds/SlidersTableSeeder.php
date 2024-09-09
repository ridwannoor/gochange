<?php

use Illuminate\Database\Seeder;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create('App\Models\Slider');
        DB::table('sliders')->insert([
        	'title' => $faker->sentence(),
        	'deskripsi' => $faker->sentence(),
        	// 'body' => $faker->paragraph(),
        	'created_at' => \Carbon\Carbon::now(),
        	'Updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
