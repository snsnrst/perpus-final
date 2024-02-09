<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB:table('books')->insert([
            'judul' => 'Laravel 8: Pemrograman Web Modern dengan PHP',
            'isbn' => '978-623-02-2546-5',
            'penerbit' => 'Elex Media Komputindo',
            'tahun_terbit' => 2023,
            'jumlah' => 10,
            'deskripsi' => 'Buku ini membahas tentang pemrograman web modern dengan framework Laravel 8.',
            'lokasi' => 'rak1',
            'cover' => 'cover_laravel8.jpg',
        ]);
    }
}
