<?php

use Illuminate\Database\Seeder;

class ReportProductSoldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ReportProductSold::class, 100)->create()->each(function ($product_sold) {
            $product_sold->save();
        });
        $this->command->info('Product sold seeded!');
    }
}
