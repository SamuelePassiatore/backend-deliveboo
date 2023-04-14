<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderPaymentRequest;
use App\Models\Order;
use App\Models\Plate;
use Braintree\Gateway;
use Illuminate\Http\Request;
use Faker\Generator as Faker;

class CartController extends Controller
{
    public function purchase(Request $request, Faker $faker)
    {

        $new_order = new Order();

        $new_order->order_code = $faker->ean8();
        $new_order->first_name = $request->first_name;
        $new_order->last_name = $request->last_name;
        $new_order->address = $request->address;
        $new_order->mail = $request->mail;
        $new_order->phone = $request->phone;
        $new_order->date = today();
        $new_order->total_amount = $request->total_amount;
        $new_order->note = $request->note;
        $new_order->status = $request->status;
        $new_order->save();

        $list_item = [];
        foreach ($request->order_plate as $item) {
            $key = $item['id'];
            $quantity = $item['quantity'];
            $price = $item['price'];
        }
        $new_order->plates()->attach($list_item);

        return response()->json([
            'results' => $request->all(),
            'order' => $new_order
        ]);
    }

    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];
        return response()->json($data, 200);
    }

    public function makePayment(OrderPaymentRequest $request, Gateway $gateway)
    {

        $result = $gateway->transaction()->sale([
            'amount' =>  $request->price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

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
