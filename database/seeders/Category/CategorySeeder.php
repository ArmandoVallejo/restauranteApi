<?php

namespace Database\Seeders\Category;

use App\Models\Category\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Sushi', 'category_image' => 'https://images.pexels.com/photos/1148086/pexels-photo-1148086.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'],
            ['name' => 'Ramen', 'category_image' => 'https://cdn7.kiwilimon.com/recetaimagen/36172/640x640/44468.jpg.jpg'],
            ['name' => 'Salads', 'category_image' => 'https://content-cocina.lecturas.com/medio/2023/08/04/ensalada-de-hortalizas-con-vinagreta-de-remolacha_8c31478e_600x600.jpg'],  
            ['name' => 'Bowls', 'category_image' => 'https://cheforopeza.com.mx/wp-content/uploads/2018/06/yakimeshi-sitio.jpg'],
            ['name' => 'Drinks', 'category_image' => 'https://images.pexels.com/photos/338713/pexels-photo-338713.jpeg'],
            ['name' => 'Desserts', 'category_image' => 'https://images.pexels.com/photos/1126359/pexels-photo-1126359.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'],
            ['name' => 'Onigiri', 'category_image' => 'https://images.pexels.com/photos/17593644/pexels-photo-17593644/free-photo-of-sushi-on-plate.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'],
            ['name' => 'Kushiages', 'category_image' => 'https://tofuu.getjusto.com/orioneat-local/resized2/Hx5DZppGCEvrtQYya-800-x.webp'],
            ['name' => 'Sashimis', 'category_image' => 'https://media.istockphoto.com/id/1324332485/photo/sashimi-mori.jpg?s=612x612&w=0&k=20&c=TtoAliKUMpW-CX33MnJA7Jxs-JU3MQh_B-XCnkNTxc8='],
            ['name' => 'For kids', 'category_image' => 'https://media.istockphoto.com/id/1475780243/es/foto/mont%C3%B3n-de-papas-a-la-francesa-sobre-fondo-negro.jpg?s=612x612&w=0&k=20&c=DXndiKLsHTq6HMLfucfuvYsd9XlKwYvjj_9JO3AZ09A='],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
