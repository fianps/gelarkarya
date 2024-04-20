<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //make a test user
        // \App\Models\User::factory()->create([
        //     'name' => 'Alfian Putra',
        //     'role' => 'admin',
        //     'email' => 'alfian@admin.com',
        //     'password' => bcrypt('alfian'),
        // ]);

        \App\Models\Berita::factory(10)->create([
            'judul' => 'Judul Berita',
            'deskripsi' => 'Deskripsi Berita',
        ]);
    }
}
