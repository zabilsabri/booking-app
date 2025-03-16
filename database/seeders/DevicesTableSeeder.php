<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('devices')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'PlayStation 5',
                'price' => 40000,
                'description' => 'PlayStation 5 (PS5) adalah konsol gaming generasi terbaru dari Sony yang menghadirkan performa luar biasa dengan kecepatan tinggi, grafis realistis, dan pengalaman bermain yang lebih imersif. Ditenagai oleh prosesor AMD Zen 2 dengan arsitektur RDNA 2, PS5 mampu menjalankan game dengan resolusi hingga 4K dan frame rate yang tinggi. Fitur utama: Grafis Realistis, Dukungan Game Eksklusif dan Backward Compatibility',
                'additional_price' => 50000,
                'additional_price_description' => 'Sabtu & Minggu',
                'image' => 'uploads/device/ps5.png',
                'status' => 'Original',
                'joysticks_amount' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'name' => 'PlayStation 4',
                'price' => 30000,
                'description' => 'PlayStation 4 (PS4) adalah konsol game canggih dari Sony yang menghadirkan pengalaman bermain yang imersif dengan grafis luar biasa dan performa tinggi. Ditenagai oleh prosesor AMD Jaguar 8-core dan GPU berbasis AMD Radeon, PS4 mampu menjalankan berbagai game berkualitas tinggi dengan frame rate yang stabil. Fitur utama: Koleksi Game Luas, Dukungan Multiplayer Online, Fitur Multimedia dan DualShock 4 Controller',
                'additional_price' => 50000,
                'additional_price_description' => 'Sabtu & Minggu',
                'image' => 'uploads/device/ps4.png',
                'status' => 'Original',
                'joysticks_amount' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
