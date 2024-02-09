<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB:table('transactions')->insert([
            'kode_transaksi' => 'TR001',
            'member_id' => 1, // Ganti dengan member_id yang sesuai
            'book_id' => 1, // Ganti dengan book_id yang sesuai
            'tanggal_pinjam' => '2024-01-31',
            'tanggal_kembali' => '2024-02-07',
            'status' => 'pinjam',
            'keterangan' => null,
    ]);
    }
}
