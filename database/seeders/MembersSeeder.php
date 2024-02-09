<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB:table('members')->insert([
                'npm' => '1234567890',
                'nama' => 'John Doe',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'jenis_kelamin' => 'L',
                'prodi' => 'Teknik Informatika',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('password'),
            
        ]);
    }
}
