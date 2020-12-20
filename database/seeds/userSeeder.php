<?php

use Faker\Factory as Faker;
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
        $faker = Faker::create();
        foreach(range(0,10) as $i){
            DB::table('tbl_users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('12345678'),
                'remember_token' => null,
                'created_at' => date("Y/m/d"),
                'updated_at' => date("Y/m/d"),
                'role' => $i > 5 ? 'siswa' : 'guru',
            ]);
        }
    }
}
