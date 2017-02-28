<?php

use Illuminate\Database\Seeder;

class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $product = new \App\Product([
            'imagePath' => 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg',
            'title' => 'Harry Potter',
            'description' => 'Super cool - at least as a child.',
            'price' => 10,
            'instock' => 50
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'http://www.revelationz.net/images/book/gameofthrones3.jpg',
            'title' => 'A Song of Ice and Fire - A Storm of Swords',
            'description' => 'No one is going to survive!',
            'price' => 10,
            'instock' => 36
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/41IArx8dswL._SS500.jpg',
            'title' => 'Northern Passages',
            'description' => '  --The Sadies',
            'price' => 10,
            'instock' => 33
        ]);
        $product->save();


        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/61LBuWVjMYL._SS500.jpg',
            'title' => 'Bobby Fuller Died for Your Sins',
            'description' => '  --Chuck Prophet',
            'price' => 10,
            'instock' => 332
        ]);
        $product->save();


        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51jPaZKybLL._SS500.jpg',
            'title' => 'A/B',
            'description' => '  --xxx',
            'price' => 10,
            'instock' => 332
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/G/01/kindle/store/2016/eink/paperwhite_desktop_tile.jpg',
            'title' => 'Kindle Paperwhite',
            'description' => 'Kindle Paperwhite E-reader - Black, 6" High-Resolution Display (300 ppi) with Built-in Light, Wi-Fi - Includes Special ',
            'price' => 150,
            'instock' => 332
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51GJFwZZU9L.jpg',
            'title' => 'Lemonade',
            'description' => '  --Beyonce',
            'price' => 10,
            'instock' => 332
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/81MVp7I%2Bp8L._SX522_.jpg',
            'title' => 'Divide Deluxe Version',
            'description' => '  --Ed Sheeran',
            'price' => 13,
            'instock' => 332
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/91JRPJhI1HL._SX522_.jpg',
            'title' => 'Live From The Fox Oakland',
            'description' => '  --Tedeschi Trucks Band',
            'price' => 14,
            'instock' => 332
        ]);
        $product->save();

       



    }
}
