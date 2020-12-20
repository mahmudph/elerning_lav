<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PelajaranSeeder extends Seeder
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
            DB::table('tbl_pelajarans')->insert([
                'nama_pelajaran' => $faker->randomElement($array=["mtk",'ipa', 'ips']),
                'created_at' => date("Y/m/d"),
                'updated_at' => date("Y/m/d"),
            ]);
        }
    }
}
