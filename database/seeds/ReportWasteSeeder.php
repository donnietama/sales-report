<?php

use Illuminate\Database\Seeder;

class ReportWasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ReportWaste::class, 100)->create()->each(function ($waste) {
            $waste->save();
        });
        $this->command->info('Waste seeded!');
    }
}
