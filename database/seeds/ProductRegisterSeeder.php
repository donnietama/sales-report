<?php

use Illuminate\Database\Seeder;

class ProductRegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductRegister::class, 6)->create()->each(function($product) {
            $product->save();
        });
        $this->command->info('Product register table seeded!');
    }
}
