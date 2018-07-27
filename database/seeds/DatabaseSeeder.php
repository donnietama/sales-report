<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            /*
             * Database objective component seeders...
             */
            IngredientSeeder::class,
            ProductSeeder::class,
            ToppingSeeder::class,
            
            /*
             * Database reporting seeder...
             */
            ReportAdditionalSeeder::class,
            ReportBatchSeeder::class,
            ReportProductSoldSeeder::class,
            ReportSummarySeeder::class,
            ReportWasteSeeder::class,
            // UsersTableSeeder::class,
        ]);
    }
}
