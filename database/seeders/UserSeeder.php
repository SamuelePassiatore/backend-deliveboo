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
            ["name" => "Silvia Rossi", "email" => "silvia.rossi@example.com", "password" => "password"]
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
