<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ["name" => "Americana", "icon" => "https://www.lemagie.it/themes/at_athena/assets/img/modules/leoslideshow/americana.png"],
            ["name" => "Cinese", "icon" => "https://www.lemagie.it/themes/at_athena/assets/img/modules/leoslideshow/cinese.png"],
            ["name" => "Giapponese", "icon" => "https://www.lemagie.it/themes/at_athena/assets/img/modules/leoslideshow/giapponese.png"],
            ["name" => "Indiana", "icon" => "https://www.lemagie.it/themes/at_athena/assets/img/modules/leoslideshow/indiana.png"],
            ["name" => "Messicana", "icon" => "https://www.lemagie.it/themes/at_athena/assets/img/modules/leoslideshow/messicana.png"],
            ["name" => "Polacca", "icon" => "https://www.lemagie.it/themes/at_athena/assets/img/modules/leoslideshow/polacca.png"],
            ["name" => "Italiana", "icon" => "https://www.lemagie.it/themes/at_athena/assets/img/modules/leoslideshow/italiana.png"],
        ];

        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type['name'];
            $new_type->icon = $type['icon'];
            $new_type->save();
        }
    }
}
