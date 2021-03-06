<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $faker = Faker::create('id_ID');
        foreach(range(1,5) as $i){
            DB::table('tbl_gurus')->insert([
                'id_user' => $i,
                'nama_guru' => $faker->name,
                'nip' => $faker->nik(),
                'gender' => $faker->randomElement($array=[1,2]),
                'nomer_hp' => $faker->phoneNumber,
                'tgl_lahir' => $faker->dateTime(),
                'tempat_lahir' => $faker->city,
                'alamat' => $faker->streetAddress,
                'lulusan' => $faker->randomElement($array=['SMA', 'D3', 'SARJANA', 'MAGISTER', 'DOCTOR']),
                'created_at' => date("Y/m/d"),
                'updated_at' => date("Y/m/d"),
            ]);
        }
    }
}
