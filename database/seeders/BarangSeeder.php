<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barang;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barang =[
        [
            "id_kategori"=> "2",
            "nama_barang"=> "Seng Atap 5'",
            "kuantitas"=> "20",
            "harga"=>"50000",
        ],
        [
            "id_kategori"=> "2",
            "nama_barang"=> "Seng Atap 6'",
            "kuantitas"=> "20",
            "harga"=>"60000",
        ],
        [
            "id_kategori"=> "2",
            "nama_barang"=> "Seng Atap 7'",
            "kuantitas"=> "20",
            "harga"=>"70000",
        ],
        [
            "id_kategori"=> "2",
            "nama_barang"=> "Seng Atap 8'",
            "kuantitas"=> "20",
            "harga"=>"80000",
        ],
        [
            "id_kategori"=> "2",
            "nama_barang"=> "Seng Atap 9'",
            "kuantitas"=> "0",
            "harga"=>"90000",
        ],
        [
            "id_kategori"=> "2",
            "nama_barang"=> "Seng Atap 10'",
            "kuantitas"=> "0",
            "harga"=>"100000",
        ],
    ];
        Barang::insert($barang);
    }
}
