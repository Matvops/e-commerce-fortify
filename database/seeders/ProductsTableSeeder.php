<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('products')->insert([
            [
                'product_name' => 'Monitor Gamer 27" 144Hz',
                'product_quantity' => 20,
                'product_price' => 1799.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/monitor-gamer-27.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Teclado Mecânico RGB Redragon',
                'product_quantity' => 35,
                'product_price' => 349.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/teclado-redragon.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Mouse Gamer Logitech G502',
                'product_quantity' => 50,
                'product_price' => 289.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/mouse-g502.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Headset HyperX Cloud II',
                'product_quantity' => 25,
                'product_price' => 499.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/headset-hyperx.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Cadeira Gamer ThunderX3',
                'product_quantity' => 10,
                'product_price' => 1299.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/cadeira-gamer-thunderx3.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Notebook Gamer Acer Nitro 5',
                'product_quantity' => 7,
                'product_price' => 4599.00,
                'product_quantity_sold' => 0,
                'product_image' => '#/notebook-acer-nitro5.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Placa de Vídeo RTX 3060',
                'product_quantity' => 12,
                'product_price' => 2299.00,
                'product_quantity_sold' => 0,
                'product_image' => '#/rtx-3060.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Processador AMD Ryzen 7 5800X',
                'product_quantity' => 15,
                'product_price' => 1649.99,
                'product_quantity_sold' => 0,
                'product_image' => '#/ryzen-7-5800x.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Placa Mãe ASUS B550',
                'product_quantity' => 20,
                'product_price' => 899.99,
                'product_quantity_sold' => 0,
                'product_image' => '#/placa-mae-b550.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Memória RAM 16GB DDR4 3200MHz',
                'product_quantity' => 40,
                'product_price' => 399.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/ram-16gb-ddr4.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'SSD NVMe 1TB Kingston',
                'product_quantity' => 30,
                'product_price' => 499.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/ssd-1tb-kingston.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Gabinete Gamer com RGB',
                'product_quantity' => 18,
                'product_price' => 459.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/gabinete-rgb.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Fonte 650W 80 Plus Bronze',
                'product_quantity' => 25,
                'product_price' => 429.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/fonte-650w.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Water Cooler 240mm',
                'product_quantity' => 10,
                'product_price' => 599.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/watercooler-240mm.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Controle Xbox Series X',
                'product_quantity' => 20,
                'product_price' => 399.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/controle-xbox.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Controle DualSense PS5',
                'product_quantity' => 18,
                'product_price' => 449.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/controle-ps5.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Webcam Full HD Logitech',
                'product_quantity' => 15,
                'product_price' => 349.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/webcam-logitech.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Microfone Condensador BM800',
                'product_quantity' => 12,
                'product_price' => 249.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/microfone-bm800.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Hub USB 3.0 4 portas',
                'product_quantity' => 30,
                'product_price' => 89.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/hub-usb-4portas.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Cabo HDMI 2.1 2m',
                'product_quantity' => 50,
                'product_price' => 49.90,
                'product_quantity_sold' => 1,
                'product_image' => '#/cabo-hdmi.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Adaptador Bluetooth USB',
                'product_quantity' => 35,
                'product_price' => 39.90,
                'product_quantity_sold' => 1,
                'product_image' => '#/adaptador-bluetooth.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Mousepad Gamer XXL',
                'product_quantity' => 28,
                'product_price' => 99.90,
                'product_quantity_sold' => 1,
                'product_image' => '#/mousepad-xxl.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Suporte para Headset RGB',
                'product_quantity' => 22,
                'product_price' => 129.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/suporte-headset.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Luminária RGB Smart Desk',
                'product_quantity' => 16,
                'product_price' => 199.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/luminaria-rgb.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Cooler Fan ARGB 120mm',
                'product_quantity' => 40,
                'product_price' => 59.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/cooler-fan-120mm.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Base Refrigerada para Notebook',
                'product_quantity' => 20,
                'product_price' => 139.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/base-refrigerada.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Extensor de Sinal Wi-Fi',
                'product_quantity' => 25,
                'product_price' => 159.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/extensor-wifi.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Estabilizador 500VA',
                'product_quantity' => 18,
                'product_price' => 249.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/estabilizador-500va.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Nobreak 1200VA',
                'product_quantity' => 10,
                'product_price' => 999.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/nobreak-1200va.jpg',
                'created_at' => $now,
            ],
            [
                'product_name' => 'Smartwatch Xiaomi Mi Band 7',
                'product_quantity' => 30,
                'product_price' => 279.90,
                'product_quantity_sold' => 0,
                'product_image' => '#/mi-band7.jpg',
                'created_at' => $now,
            ],
        ]);
    }
}
