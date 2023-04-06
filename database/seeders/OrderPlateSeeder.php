<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderPlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders_plates = [
            ['order_id' => 1, 'plate_id' => 1, 'quantity' => 1, 'note' => 'Senza glutine'],
            ['order_id' => 2, 'plate_id' => 2, 'quantity' => 4, 'note' => '']
        ];

        foreach ($orders_plates as $order_plate) {
            DB::table('order_plate')->insert([
                'order_id' => $order_plate['order_id'],
                'plate_id' => $order_plate['plate_id'],
                'quantity' => $order_plate['quantity'],
                'note' => $order_plate['note']
            ]);
        }
    }
}
