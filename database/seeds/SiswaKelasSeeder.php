<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SiswaKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $i){
            DB::table('tbl_siswa_kelas')->insert([
                'id_kelas' => $faker->randomElement($array=[1,2,3]),
                'id_siswa' => $faker->randomElement($array=[1,2,3,4,5], $count = 1),
                'created_at' => date("Y/m/d"),
                'updated_at' => date("Y/m/d"),
            ]);
        }
    }
}
