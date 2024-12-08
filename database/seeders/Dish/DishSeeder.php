<?php

namespace Database\Seeders\Dish;

use App\Models\Category\Category;
use App\Models\Dishes\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dishes = [
            [
                'name' => 'California Roll',
                'description' => 'Rollo de sushi con cangrejo, aguacate y pepino.',
                'price' => 8.99,
                'ingredients' => 'Cangrejo, aguacate, pepino, arroz, nori',
                'dish_image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/California_Sushi_%2826571101885%29.jpg/800px-California_Sushi_%2826571101885%29.jpg',
                'preparation_time' => 15,
                'category_id' => 1,
            ],
            [
                'name' => 'Tonkotsu Ramen',
                'description' => 'Ramen con caldo de cerdo cremoso y fideos frescos.',
                'price' => 12.50,
                'ingredients' => 'Caldo de cerdo, fideos, huevo, cebolla verde',
                'dish_image' => 'https://www.mizkanchef.com/wp-content/uploads/2020/09/ramen-tonkotsu-2560x1106.jpg',
                'preparation_time' => 25,
                'category_id' => 2,
            ],
            [
                'name' => 'Ensalada César',
                'description' => 'Clásica ensalada César con crutones y aderezo.',
                'price' => 6.99,
                'ingredients' => 'Lechuga, aderezo César, crutones, queso parmesano',
                'dish_image' => 'https://www.gourmet.cl/wp-content/uploads/2016/09/Ensalada_C%C3%A9sar-web-553x458.jpg',
                'preparation_time' => 10,
                'category_id' => 3,
            ],
            [
                'name' => 'Poke Bowl de Salmón',
                'description' => 'Un bowl fresco con salmón, arroz y aguacate.',
                'price' => 9.50,
                'ingredients' => 'Salmón, arroz, aguacate, pepino, soya',
                'dish_image' => 'https://cdn7.kiwilimon.com/recetaimagen/34963/960x640/40729.jpg.jpg',
                'preparation_time' => 20,
                'category_id' => 4,
            ],
            [
                'name' => 'Mojito Clásico',
                'description' => 'Refrescante mezcla de ron, hierbabuena y limón.',
                'price' => 5.99,
                'ingredients' => 'Ron, hierbabuena, limón, azúcar, soda',
                'dish_image' => 'https://comedera.com/wp-content/uploads/sites/9/2022/04/mojito.jpg',
                'preparation_time' => 5,
                'category_id' => 5,
            ],
            [
                'name' => 'Cheesecake de Fresa',
                'description' => 'Delicioso pastel de queso con mermelada de fresa.',
                'price' => 4.99,
                'ingredients' => 'Queso crema, galleta, mermelada de fresa',
                'dish_image' => 'https://www.splenda.com/wp-content/themes/bistrotheme/assets/recipe-images/strawberry-topped-cheesecake.jpg',
                'preparation_time' => 15,
                'category_id' => 6,
            ],
            [
                'name' => 'Onigiri de Atún',
                'description' => 'Bola de arroz rellena de atún y envuelta en nori.',
                'price' => 3.99,
                'ingredients' => 'Arroz, atún, alga nori',
                'dish_image' => 'https://micorazondearroz.com/wp-content/uploads/2020/09/IMG_6901-4-scaled.jpg',
                'preparation_time' => 10,
                'category_id' => 7,
            ],
            [
                'name' => 'Kushiage de Pollo',
                'description' => 'Brocheta de pollo empanizado y frito.',
                'price' => 4.50,
                'ingredients' => 'Pollo, panko, aceite',
                'dish_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMeR5size0I_YXd9P4kms_pSVfVWeKAui05w&s',
                'preparation_time' => 12,
                'category_id' => 8,
            ],
            [
                'name' => 'Sashimi de Salmón',
                'description' => 'Delgadas rebanadas de salmón fresco.',
                'price' => 7.99,
                'ingredients' => 'Salmón fresco',
                'dish_image' => 'https://imag.bonviveur.com/presentacion-principal-del-sashimi-de-salmon.jpg',
                'preparation_time' => 8,
                'category_id' => 9,
            ],
            [
                'name' => 'Papas Fritas',
                'description' => 'Crocantes papas fritas perfectas para los niños.',
                'price' => 2.99,
                'ingredients' => 'Papas, aceite, sal',
                'dish_image' => 'https://i0.wp.com/soyproesa.com/wp-content/uploads/2022/04/recetas-de-papas-fritas.png?fit=1920%2C1281&ssl=1',
                'preparation_time' => 7,
                'category_id' => 10,
            ],
        ];

        foreach ($dishes as $dish) {
            Dish::create($dish);
        }

    }
}
