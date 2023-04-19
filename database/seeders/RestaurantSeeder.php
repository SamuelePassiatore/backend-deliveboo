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
                'address' => 'Via Colosseo 5, Roma',
                'vat' => '12345678901',
                'phone' => '045817456',
                'mail' => 'info@unclesamsburgers.com',
                'description' => 'Uncle Sam\'s Burgers è la quintessenza della tavola calda americana. Serviamo gli hamburger, gli hot dog e le patatine fritte più succulenti della città, insieme a frullati ghiacciati e alle classiche torte americane. Venite a trovarci per un assaggio dei vecchi Stati Uniti d\'America!',
                'photo' => ''
            ], [
                'user_id' => 2,
                'restaurant_name' => 'Sushi Zen',
                'address' => 'Via Trevi 8, Roma',
                'vat' => '12345678902',
                'phone' => '089176532',
                'mail' => 'info@sushizen.jp',
                'description' => 'Sushi Zen è un ristorante di sushi tradizionale giapponese situato nel cuore di Roma. I nostri esperti chef utilizzano solo il pesce più fresco e gli ingredienti più pregiati per preparare squisiti piatti di sushi e sashimi. Venite a sperimentare l\'arte e l\'eleganza della cucina giapponese al Sushi Zen.',
                'photo' => ''
            ], [
                'user_id' => 3,
                'restaurant_name' => 'Dragon Palace',
                'address' => 'Via Navona 30, Roma',
                'vat' => '12345678903',
                'phone' => '085176233',
                'mail' => 'info@dragonpalace.cn',
                'description' => 'Dragon Palace è un elegante ristorante cinese che offre una rivisitazione moderna dei classici piatti cinesi. I nostri chef utilizzano solo gli ingredienti più freschi per creare piatti saporiti e sani che stuzzicheranno le vostre papille gustative. Venite a trovarci per un\'esperienza culinaria memorabile nel cuore di Roma.',
                'photo' => ''
            ], [
                'user_id' => 4,
                'restaurant_name' => 'Taj Mahal',
                'address' => 'Via SPQR, Roma',
                'vat' => '12345678904',
                'phone' => '044327891',
                'mail' => 'info@tajmahal.com',
                'description' => 'Il Taj Mahal è un lussuoso ristorante indiano che offre una vasta gamma di autentici piatti indiani, dai saporiti curry alle delizie tandoori. I nostri chef utilizzano solo le spezie e gli ingredienti più pregiati per creare un viaggio culinario attraverso l\'India. Venite a scoprire la magia del Taj Mahal.',
                'photo' => ''
            ], [
                'user_id' => 5,
                'restaurant_name' => 'Taco Loco',
                'address' => 'Via Dante 7, Roma',
                'vat' => '12345678905',
                'phone' => '047823712',
                'mail' => 'info@tacoloco.com',
                'description' => 'Taco Loco è un ristorante messicano autentico, dove potrai gustare le specialità della cucina tex-mex, come i tacos, le fajitas e le enchiladas.',
                'photo' => ''
            ], [
                'user_id' => 6,
                'restaurant_name' => 'Pierogi Palace',
                'address' => 'Via Smeraldo 16, Roma',
                'vat' => '12345678906',
                'phone' => '045786597',
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
            ], [
                'user_id' => 8,
                'restaurant_name' => 'Osteria Romana',
                'address' => 'Via del Corso 10, Roma',
                'vat' => '12345678908',
                'phone' => '065432189',
                'mail' => 'info@osteriaromana.it',
                'description' => 'L\'Osteria Romana è un ristorante che si specializza nella cucina romana tradizionale, offrendo piatti come la coda alla vaccinara, la carbonara e la trippa alla romana.',
                'photo' => ''
            ], [
                'user_id' => 9,
                'restaurant_name' => 'Pizzeria Napoli',
                'address' => 'Via Veneto 20, Roma',
                'vat' => '12345678909',
                'phone' => '086532746',
                'mail' => 'info@pizzerianapoli.it',
                'description' => 'La Pizzeria Napoli è un ristorante italiano che si specializza nella pizza napoletana tradizionale, offrendo una vasta gamma di pizze cotte nel forno a legna.',
                'photo' => ''
            ], [
                'user_id' => 10,
                'restaurant_name' => 'Cacio e Pepe',
                'address' => 'Via dei Banchi Vecchi 12, Roma',
                'vat' => '12345678910',
                'phone' => '068712345',
                'mail' => 'info@cacioepepelovers.com',
                'description' => 'Il Cacio e Pepe è un ristorante italiano specializzato nella preparazione del famoso piatto romano, la pasta cacio e pepe.',
                'photo' => ''
            ]

        ];

        foreach ($restaurants as $restaurant) {
            $new_restaurant = new Restaurant();
            $new_restaurant->fill($restaurant);
            $new_restaurant->save();
        }
    }
}
