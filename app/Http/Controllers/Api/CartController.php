<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderPaymentRequest;
use App\Mail\NewOrder;
use App\Models\Order;
use App\Models\Plate;
use App\Models\Restaurant;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];
        return response()->json($data, 200);
    }

    public function makePayment(OrderPaymentRequest $request, Gateway $gateway, Faker $faker)
    {
        $plate = Plate::find($request->plate);

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        // $new_order = new Order();
        // $new_order->restaurant_id = '2';
        // $new_order->order_code = $faker->ean8();
        // $new_order->first_name = $request->first_name;
        // $new_order->last_name = '$request->last_name';
        // $new_order->address = '$request->address';
        // $new_order->mail = 'giuseppe@boolean.it';
        // $new_order->phone = '$request->phone';
        // $new_order->total_amount = '10';
        // $new_order->status = true;
        // $new_order->save();

        $new_order = new Order();
        $new_order->restaurant_id = $request->products[0]['restaurant_id'];
        $new_order->order_code = $faker->ean8();
        $new_order->first_name = $request->first_name;
        $new_order->last_name = $request->last_name;
        $new_order->address = $request->address;
        $new_order->mail = $request->mail;
        $new_order->phone = $request->phone;
        $new_order->total_amount = $request->total_amount;
        $new_order->status = true;
        $new_order->save();

        $restaurant = Restaurant::find($new_order->restaurant_id);
        $restaurant_email = $restaurant->mail;

        if (isset($request->products)) {
            foreach ($request->products as $plate) {
                $key = $plate['id'];
                $quantity = $plate['quantity'];
                $price = $plate['price'];
                $new_order->plates()->attach($key, ['quantity' => $quantity]);
            }
        }

        Mail::to($request->mail)->send(new NewOrder($new_order, $request->first_name, $request->last_name, $request->mail, $request->phone, $request->address, ''));
        Mail::to($restaurant_email)->send(new NewOrder($new_order, $request->first_name, $request->last_name, $request->mail, $request->phone, $request->address, ''));

        if ($result->success) {
            $data = [
                'success' => true,
                'message' => 'transazione eseguita'
            ];


            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => 'transazione fallita'
            ];


            return response()->json($data, 401);
        }
    }
}
