<?php

use Illuminate\Database\Seeder;

class ProductIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductIngredient::class, 100)->create()->each(function ($ingredient) {
            $ingredient->save();
        });
        $this->command->info('Product ingredient table seeded');
    }
}
