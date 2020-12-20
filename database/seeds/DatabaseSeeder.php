<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(GuruSeeder::class);
        $this->call(PelajaranSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(SiswaKelasSeeder::class);
        $this->call(GuruKelasSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(GuruAkunSeeder::class);
    }
}
