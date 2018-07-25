<?php

use Illuminate\Database\Seeder;

class ToppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Topping::class, 2)->create()->each(function($topping) {
            $topping->save();
        });
        $this->command->info('Topping table seeded!');
    }
}
