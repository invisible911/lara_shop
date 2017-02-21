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
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51jPaZKybLL._SS500.jpg',
            'title' => 'Bobby Fuller Died for Your Sins',
            'description' => '  --Chuck Prophet',
            'price' => 10,
            'instock' => 332
        ]);
        $product->save();


        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/51jPaZKybLL._SS500.jpg',
            'title' => 'A/B',
            'description' => '  --Kaleo',
            'price' => 10,
            'instock' => 332
        ]);
        $product->save();
        $product = new \App\Product([
            'imagePath' => 'https://images-na.ssl-images-amazon.com/images/I/61LBuWVjMYL._SS500.jpg',
            'title' => 'Bobby Fuller Died for Your Sins',
            'description' => '  --Kaleo',
            'price' => 10,
            'instock' => 332
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


    }
}
