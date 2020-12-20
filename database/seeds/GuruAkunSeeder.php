<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GuruAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table('tbl_users')->insert([
            'name' => 'guru',
            'email' => 'guru@gmail.com',
            'password' => bcrypt('12345678'),
            'remember_token' => null,
            'created_at' => date("Y/m/d"),
            'updated_at' => date("Y/m/d"),
            'role' => 'guru',
        ]);
    }
}
