<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderPaymentRequest;
use Braintree\Gateway;
use Illuminate\Http\Request;

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

    public function makePayment(OrderPaymentRequest $request, Gateway $gateway)
    {
        $result = $gateway->transaction()->sale([
            'amount' =>  $request->amount,
            // 'plate' => $request->plate,
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
