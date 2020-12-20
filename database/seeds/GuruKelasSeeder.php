<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GuruKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,3) as $i){
            DB::table('tbl_guru_mengajars')->insert([
                'id_guru' =>  $faker->randomElement($array=[1,2,3,4,5]),
                'id_pelajaran' => $faker->randomElement($array=[1,2,3]),
                'id_kelas' => $faker->randomElement($array=[1,2,3]),
                'created_at' => date("Y/m/d"),
                'updated_at' => date("Y/m/d"),
            ]);
        }
    }
}
