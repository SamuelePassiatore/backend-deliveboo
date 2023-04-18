<?php

namespace App\Http\Controllers;


use App\Mail\NewOrder;
use App\Models\Contact;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'sender_name' => 'bail|required|string',
                'sender_surname' => 'bail|required|string',
                'mail' => 'bail|required|email',
                'phone' => 'bail|required|string',
                'address' => 'bail|required|string',
                'note' => 'nullable|text',
            ],
            [
                'sender_name.required' => 'Il nome è obbligatorio',
                'sender_name.string' => 'Il valore inserito non è valido',
                'sender_surname.required' => 'Il messaggio deve avere un oggetto',
                'sender_surname.string' => 'Il valore inserito non è valido',
                'mail.required' => 'L\'email è obbligatoria',
                'mail.email' => 'L\'email inserita non è valida',
                'phone.required' => 'Il numero di telefono è obbligatorio',
                'phone.string' => 'Il valore inserito non è valido',
                'address.required' => 'L\'indirizzo è obbligatorio',
                'address.string' => 'Il valore inserito non è valido',
                'note.text' => 'Il valore inserito non è valido',
            ]
        );

        // Effettuo la validazione
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Invio la mail
        $mail = new NewOrder(
            sender_name: $data['sender_name'],
            sender_surname: $data['sender_surname'],
            mail: $data['mail'],
            phone: $data['phone'],
            address: $data['address'],
            note: $data['note'],
            order: $data['order']
        );

        Mail::to(env('MAIL_FROM_ADDRESS'))->send($mail);

        return response(null, 204);
    }
}
