<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = [
            ["first_name" => "Andrea", "last_name" => "Bianchi", "mail" => "andrea@bianchi.com", "phone" => "01234567891", "address" => "Via Giacomo Matteotti, 18", "total_amount" => "35", "order_code" => "12345678", "status" => "0", "note" => "Tutti allegri trotterellando."],
            ["first_name" => "Simona", "last_name" => "Rossi", "mail" => "simona@rossi.com", "phone" => "23456789102", "address" => "Via Gramsci, 27", "total_amount" => "5", "order_code" => "12345679", "status" => "1", "note" => "Tutti comunistelli allegri trotterellando in Piazzale Loreto."]
        ];

        foreach ($orders as $order) {
            $new_order = new Order();
            $new_order->first_name = $order['first_name'];
            $new_order->last_name = $order['last_name'];
            $new_order->mail = $order['mail'];
            $new_order->phone = $order['phone'];
            $new_order->address = $order['address'];
            $new_order->total_amount = $order['total_amount'];
            $new_order->order_code = $order['order_code'];
            $new_order->status = $order['status'];
            $new_order->note = $order['note'];
            $new_order->save();
        }
    }
}
