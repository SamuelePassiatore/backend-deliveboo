<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =  [
            ["name" => "Davide Cardelli", "email" => "davide@example.com", "password" => "password"],
            ["name" => "Samuele Passiatore", "email" => "samuele@example.com", "password" => "password"],
            ["name" => "Gianmaria Fatta", "email" => "gianmaria@example.com", "password" => "password"],
            ["name" => "Michela Ricci", "email" => "michela@example.com", "password" => "password"],
            ["name" => "Giuseppe Dattilo", "email" => "giuseppe@example.com", "password" => "password"],
            ["name" => "Paolo Marroni", "email" => "paolo.marroni@example.com", "password" => "password"],
            ["name" => "Chiara Arancioni", "email" => "chiara.arancioni@example.com", "password" => "password"],
            ["name" => "Alessandro Azzurri", "email" => "alessandro.azzurri@example.com", "password" => "password"],
            ["name" => "Marco Bianchi", "email" => "marco.bianchi@example.com", "password" => "password"],
            ["name" => "Silvia Rossi", "email" => "silvia.rossi@example.com", "password" => "password"],
            ["name" => "Federico Neri", "email" => "federico.neri@example.com", "password" => "password"],
            ["name" => "Valeria Ricciardi", "email" => "valeria.ricciardi@example.com", "password" => "password"],
            ["name" => "Roberto Verdi", "email" => "roberto.verdi@example.com", "password" => "password"],
            ["name" => "Sabrina Rizzo", "email" => "sabrina.rizzo@example.com", "password" => "password"],
            ["name" => "Luca Moretti", "email" => "luca.moretti@example.com", "password" => "password"],
            ["name" => "Sara Ferrari", "email" => "sara.ferrari@example.com", "password" => "password"],
            ["name" => "Giacomo Rossi", "email" => "giacomo.rossi@example.com", "password" => "password"],
            ["name" => "Valentina Bianchi", "email" => "valentina.bianchi@example.com", "password" => "password"],
            ["name" => "Filippo Esposito", "email" => "filippo.esposito@example.com", "password" => "password"],
            ["name" => "Cristina Conti", "email" => "cristina.conti@example.com", "password" => "password"]
        ];

        foreach ($users as $user) {
            $new_user = new User();
            $new_user->name = $user['name'];
            $new_user->email = $user['email'];
            $new_user->password = bcrypt($user['password']);
            $new_user->save();
        }
    }
}
