<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        foreach(range(6,10) as $i){
            DB::table('tbl_siswas')->insert([
                'id_user' => $i,
                'nama_siswa' => $faker->name,
                'nis' => $faker->nik(),
                'gender' => $faker->randomElement($array=[1,2]),
                'nomer_hp' => $faker->phoneNumber,
                'tgl_lahir' => $faker->dateTime(),
                'tempat_lahir' => $faker->city,
                'alamat' => $faker->streetAddress,
                'created_at' => date("Y/m/d"),
                'updated_at' => date("Y/m/d"),
            ]);
        }
    }
}
