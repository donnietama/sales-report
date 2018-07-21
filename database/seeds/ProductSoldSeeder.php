<?php

use Illuminate\Database\Seeder;

class ProductSoldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductSold::class, 100)->create()->each(function ($product_sold) {
            $product_sold->save();
        });
        $this->command->info('Product sold report table seeded!');
    }
}
