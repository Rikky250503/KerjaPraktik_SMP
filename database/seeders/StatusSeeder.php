<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            [
                'id_status' => '1',
                'nama_status' =>'Menunggu pengiriman'
            ],
            [
                'id_status' => '2',
                'nama_status' =>'Pesanan dikirim'
            ],
            [
                'id_status' => '3',
                'nama_status' =>'Pesanan diterima'
            ]
            ];
        Status::insert($status);
    }
}
