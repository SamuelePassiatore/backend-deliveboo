<?php

namespace Database\Seeders;

use App\Models\Plate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plates = [
            // Piatti americani, restaurant_id 1
            [
                "restaurant_id" => 1,
                "name" => "Hamburger",
                "description" => "Panino di carne macinata di manzo cotto alla griglia, servito con insalata, pomodoro e salse varie.",
                "price" => 12.50,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 1,
                "name" => "Hot dog",
                "description" => "Salsiccia cotta alla griglia servita su un panino morbido, guarnito con senape, ketchup, cipolle e cetriolini.",
                "price" => 8.75,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 1,
                "name" => "Mac and cheese",
                "description" => "Pasta cotta al dente con una salsa cremosa di formaggio fuso, servita calda e filante.",
                "price" => 9.99,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 1,
                "name" => "BBQ ribs",
                "description" => "Costine di maiale cotte a fuoco lento e glassate con salsa barbecue, servite con patatine fritte e insalata.",
                "price" => 18.99,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 1,
                "name" => "Fried chicken",
                "description" => "Pollo fritto croccante e succoso, servito con patatine fritte e salse varie.",
                "price" => 14.25,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ],
            // Piatti giapponesi, restaurant_id 2
            [
                "restaurant_id" => 2,
                "name" => "Sushi",
                "description" => "Piatto di pesce crudo su una base di riso condito con aceto di riso, servito con salsa di soia, wasabi e zenzero marinato.",
                "price" => 18.50,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 2,
                "name" => "Ramen",
                "description" => "Brodo di carne o pesce con noodles di frumento, carne di maiale o pollo, uovo sodo, germogli di soia e cipolla verde.",
                "price" => 12.75,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 2,
                "name" => "Tempura",
                "description" => "Frittura di gamberi, verdure e pesce ricoperti di pastella leggera, serviti con salsa di immersione.",
                "price" => 14.99,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 2,
                "name" => "Yakitori",
                "description" => "Spiedini di pollo o manzo marinati e grigliati, serviti con salsa teriyaki.",
                "price" => 9.50,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 2,
                "name" => "Udon",
                "description" => "Zuppa di noodles spessi di frumento, servita con gamberi, verdure, pollo e uova.",
                "price" => 11.25,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ],
            // Piatti cinesi, restaurant_id 3
            [
                "restaurant_id" => 3,
                "name" => "Ravioli cinesi",
                "description" => "Pasta ripiena di carne di maiale e verdure, cotta al vapore o in brodo, servita con salsa di soia e aceto di riso.",
                "price" => 10.50,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 3,
                "name" => "Ma po tofu",
                "description" => "Tofu morbido in una salsa piccante di carne di maiale e fagioli fermentati, servito con riso bianco.",
                "price" => 12.75,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 3,
                "name" => "Pollo alle mandorle",
                "description" => "Pollo fritto croccante con mandorle tostate, servito con verdure saltate in padella.",
                "price" => 14.99,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 3,
                "name" => "Anatra alla pechinese",
                "description" => "Anatra arrosto con croccante pelle dorata, servita con pancake sottili, cipolla e salsa di prugne.",
                "price" => 18.50,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 3,
                "name" => "Zuppa di noodle",
                "description" => "Zuppa di noodles di frumento con pollo, verdure e funghi, arricchita con uovo sodo e cipolla verde.",
                "price" => 9.25,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ],
            // Piatti indiani, restaurant_id 4
            [
                "restaurant_id" => 4,
                "name" => "Pollo tikka masala",
                "description" => "Pollo marinato e grigliato, servito in una salsa cremosa di pomodoro, cipolla e spezie, accompagnato da riso basmati.",
                "price" => 13.50,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 4,
                "name" => "Paneer makhani",
                "description" => "Cubetti di paneer (formaggio indiano) cotto in una salsa cremosa di pomodoro e burro, servito con riso basmati o naan.",
                "price" => 11.75,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 4,
                "name" => "Samosa",
                "description" => "Fagottini di pasta ripieni di patate, piselli, cipolla e spezie, fritti croccanti e serviti con chutney.",
                "price" => 6.99,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 4,
                "name" => "Biryani di agnello",
                "description" => "Riso basmati cotto con spezie, agnello e verdure, servito con raita (salsa di yogurt) e papadum (sfoglia croccante di lenticchie).",
                "price" => 15.50,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 4,
                "name" => "Butter chicken",
                "description" => "Pollo cotto in una salsa di pomodoro e burro, arricchita con spezie indiane e servita con riso basmati o naan.",
                "price" => 12.25,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ],
            // Piatti messicani, restaurant_id 5
            [
                "restaurant_id" => 5,
                "name" => "Tacos al pastor",
                "description" => "Tortilla di mais ripiena di carne di maiale marinata e cotta allo spiedo, servita con cipolla, coriandolo e salsa piccante.",
                "price" => 8.50,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 5,
                "name" => "Guacamole",
                "description" => "Salsa di avocado, pomodoro, cipolla, peperoncino e lime, servita con tortilla chips.",
                "price" => 5.99,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 5,
                "name" => "Burrito",
                "description" => "Tortilla di farina ripiena di carne di manzo, riso, fagioli, salsa di pomodoro, guacamole e formaggio, servita con pico de gallo.",
                "price" => 10.25,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 5,
                "name" => "Enchiladas",
                "description" => "Tortilla di mais ripiena di pollo, formaggio e salsa di pomodoro, servita con fagioli e riso.",
                "price" => 9.75,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 5,
                "name" => "Chiles en nogada",
                "description" => "Peperoni verdi ripieni di carne macinata, frutta secca e spezie, serviti con una salsa di panna, noci e prezzemolo.",
                "price" => 12.50,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ],
            // Piatti messicani, restaurant_id 6
            [
                "restaurant_id" => 6,
                "name" => "Pierogi",
                "description" => "Pasta ripiena di patate, formaggio o carne, cotta e servita con cipolle saltate e panna acida.",
                "price" => 7.50,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 6,
                "name" => "Bigos",
                "description" => "Stufato di carne di maiale, salsiccia, crauti e funghi, condito con spezie e servito con pane di segale.",
                "price" => 9.99,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 6,
                "name" => "Zurek",
                "description" => "Zuppa acida a base di farina di segale, servita con salsicce, uova sode e patate.",
                "price" => 6.25,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 6,
                "name" => "Kotlet schabowy",
                "description" => "Cotoletta di maiale impanata, servita con patate bollite e crauti.",
                "price" => 11.50,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ], [
                "restaurant_id" => 6,
                "name" => "Kielbasa",
                "description" => "Salsiccia polacca affumicata, servita con senape e pane di segale.",
                "price" => 8.75,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ],
            // Piatti italiani, restaurant_id 7
            [
                "restaurant_id" => 7,
                "name" => "Spaghetti alla Carbonara",
                "description" => "Uno dei piatti più famosi della cucina romana, preparato con spaghetti, uova, guanciale e pecorino romano.",
                "price" => 12.50,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,

            ],
            [
                "restaurant_id" => 7,
                "name" => "Pizza Margherita",
                "description" => "La pizza più classica e famosa, preparata con mozzarella di bufala, pomodoro e basilico.",
                "price" => 8.00,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,
            ],
            [
                "restaurant_id" => 7,
                "name" => "Risotto alla Milanese",
                "description" => "Un piatto tipico della cucina lombarda, preparato con riso, burro, cipolla e zafferano.",
                "price" => 15.00,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,
            ],
            [
                "restaurant_id" => 7,
                "name" => "Osso Buco alla Milanese",
                "description" => "Un piatto a base di carne di vitello, preparato con osso con midollo, verdure e vino bianco.",
                "price" => 20.00,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,
            ],
            [
                "restaurant_id" => 7,
                "name" => "Lasagne alla Bolognese",
                "description" => "Un piatto di pasta al forno, preparato con sfoglia di pasta fresca, ragù di carne, besciamella e parmigiano reggiano.",
                "price" => 16.00,
                "quantity" => 0,
                "is_visible" => 1,
                "photo" => "",
                "is_vegan" => 0,
                "is_vegetarian" => 0,
            ]
        ];

        foreach ($plates as $plate) {
            $new_plate = new Plate();
            $new_plate->fill($plate);
            $new_plate->save();
        }
    }
}
