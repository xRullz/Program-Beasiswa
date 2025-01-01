<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hapus semua pengguna yang ada
        // DB::table('users')->truncate();

        // Menambahkan pengguna admin
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'), // Ganti dengan password yang diinginkan
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Menambahkan beberapa pengguna mahasiswa
            [
                'username' => 'mahasiswa',
                'email' => 'mahasiswa@gmail.com',
                'password' => Hash::make('123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
