<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
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
            DB::table('tbl_kelas')->insert([
                'nama_kelas' => "kelas ".$faker->randomElement($array=[1,2,3], $count = 1),
                'jumlah_bangku' => 40,
                'jumlah_kursi' => 40,
                'created_at' => date("Y/m/d"),
                'updated_at' => date("Y/m/d"),
            ]);
        }
    }
}
