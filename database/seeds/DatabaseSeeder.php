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
        // $this->call(UsersTableSeeder::class);
        $this->call([
            ReportSummarySeeder::class,
            // BatchReportSeeder::class,
            ProductIngredientSeeder::class,
            WasteSeeder::class,
            ProductRegisterSeeder::class,
            ProductSoldSeeder::class,
        ]);
    }
}
