<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            [
                'user_id' => 1,
                'restaurant_name' => 'Uncle Sam\'s Burgers',
                'address' => 'Via dei Condotti 10, Roma',
                'vat' => '12345678901',
                'phone' => '1111111111',
                'mail' => 'info@unclesamsburgers.com',
                'description' => 'Uncle Sam\'s Burgers is the quintessential American diner experience. We serve up the juiciest burgers, hot dogs, and fries in town, along with ice-cold milkshakes and classic American pies. Come see us for a taste of the good ol\' US of A!',
                'photo' => ''
            ], [
                'user_id' => 2,
                'restaurant_name' => 'Sushi Zen',
                'address' => 'Via dei Condotti 20, Roma',
                'vat' => '12345678902',
                'phone' => '2222222222',
                'mail' => 'info@sushizen.jp',
                'description' => 'Sushi Zen is a traditional Japanese sushi restaurant located in the heart of Tokyo. Our expert chefs use only the freshest fish and finest ingredients to craft exquisite sushi and sashimi dishes. Come experience the artistry and elegance of Japanese cuisine at Sushi Zen.',
                'photo' => ''
            ], [
                'user_id' => 3,
                'restaurant_name' => 'Dragon Palace',
                'address' => 'Via dei Condotti 30, Roma',
                'vat' => '12345678903',
                'phone' => '3333333333',
                'mail' => 'info@dragonpalace.cn',
                'description' => 'Dragon Palace is an elegant Chinese restaurant that offers a modern take on classic Chinese dishes. Our chefs use only the freshest ingredients to create flavorful and healthy meals that will tantalize your taste buds. Come visit us for a memorable dining experience in the heart of Beijing.',
                'photo' => ''
            ], [
                'user_id' => 4,
                'restaurant_name' => 'Taj Mahal',
                'address' => 'Via dei Condotti 40, Roma',
                'vat' => '12345678904',
                'phone' => '+4444444444',
                'mail' => 'info@tajmahal.com',
                'description' => 'Taj Mahal is a luxurious Indian restaurant that offers a wide range of authentic Indian dishes, from flavorful curries to tandoori delights. Our chefs use only the finest spices and ingredients to create a culinary journey through India. Come experience the magic of the Taj Mahal.',
                'photo' => ''
            ], [
                'user_id' => 5,
                'restaurant_name' => 'Taco Loco',
                'address' => 'Via dei Condotti 50, Roma',
                'vat' => '12345678905',
                'phone' => '5555555555',
                'mail' => 'info@tacoloco.com',
                'description' => 'Taco Loco è un ristorante messicano autentico, dove potrai gustare le specialità della cucina tex-mex, come i tacos, le fajitas e le enchiladas.',
                'photo' => ''
            ], [
                'user_id' => 6,
                'restaurant_name' => 'Pierogi Palace',
                'address' => 'Via dei Condotti 60, Roma',
                'vat' => '12345678906',
                'phone' => '6666666666',
                'mail' => 'info@pierogipalace.com',
                'description' => 'Il Pierogi Palace è un ristorante polacco che serve piatti tradizionali come i pierogi, ripieni di carne o formaggio, e il bigos, un guazzetto di carne e crauti.',
                'photo' => ''
            ], [
                'user_id' => 7,
                'restaurant_name' => 'La Trattoria',
                'address' => 'Via dei Condotti 70, Roma',
                'vat' => '12345678907',
                'phone' => '7777777777',
                'mail' => 'info@latrattoria.com',
                'description' => 'La Trattoria è un ristorante italiano tradizionale, dove potrai gustare piatti come la pasta al pomodoro, la pizza margherita e la parmigiana di melanzane.',
                'photo' => ''
            ],
        ];

        foreach ($restaurants as $restaurant) {
            $new_restaurant = new Restaurant();
            $new_restaurant->fill($restaurant);
            $new_restaurant->save();
        }
    }
}
