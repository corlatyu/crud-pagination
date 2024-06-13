<?php

namespace Database\Seeders;

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
        $this->call(AuthSeeder::class);

        // $this->call(MahasiswasTableSeeder::class);
    }
}


// php artisan db:seed untuk mengirim data ke database