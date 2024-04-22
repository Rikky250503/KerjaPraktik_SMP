<?php

namespace Database\Seeders;
use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            [
                'id_kategori' => '1',
                'nama_kategori' =>'Semen'
            ],
            [
                'id_kategori' => '2',
                'nama_kategori' =>'Seng'
            ],
            [
                'id_kategori' => '3',
                'nama_kategori' =>'Playwood'
            ]
            ];
        Kategori::insert($kategori);
        
    }
}
