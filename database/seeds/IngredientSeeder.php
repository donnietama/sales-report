<?php

use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Ingredient::class, 10)->create()->each(function ($ingredient) {
            $ingredient->save();
        });
        $this->command->info('Ingredient table seeded');
    }
}
