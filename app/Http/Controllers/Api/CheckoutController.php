<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewOrder;
use App\Models\Order;
use App\Models\Plate;
use Illuminate\Http\Request;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{

    public function checkout(Request $request, Faker $faker)
    {
        $plate = Plate::find($request->plate);

        $new_order = new Order();
        $new_order->restaurant_id = '1';
        $new_order->order_code = $faker->ean8();
        $new_order->first_name = $request->first_name;
        $new_order->last_name = 'Ciccino';
        $new_order->address = 'Via Giuseppe 5, Roma';
        $new_order->mail = 'example@boolean.it';
        $new_order->phone = '045673421';
        $new_order->total_amount = '10';
        $new_order->status = true;
        $new_order->save();

        // $new_order = new Order();
        // $new_order->restaurant_id = $request->restaurant_id;
        // $new_order->order_code = $faker->ean8();
        // $new_order->first_name = $request->first_name;
        // $new_order->last_name = $request->last_name;
        // $new_order->address = $request->address;
        // $new_order->mail = $request->mail;
        // $new_order->phone = $request->phone;
        // $new_order->total_amount = $request->total_amount;
        // $new_order->status = $request->status;

        // $new_order->save();

        $list_plates = [];
        $amount = 0;
        if (isset($request->plates)) {
            foreach ($request->plates as $plate) {
                $amount += $plate->price;
                $key = $plate['id'];
                $quantity = $plate['quantity'];
                $price = $plate['price'];
                $list_plates[$key] = ['quantity' => $quantity, 'current_price' => $price];
            }
        }

        $new_order->plates()->attach($request->plate);

        Mail::to($new_order->mail)->send(new NewOrder($new_order, $request->first_name, $request->last_name, $request->mail, $request->phone, $request->address, ''));
        Mail::to('ristoratore@generico.com')->send(new NewOrder($new_order, $request->first_name, $request->last_name, $request->mail, $request->phone, $request->address, ''));
    }
}
