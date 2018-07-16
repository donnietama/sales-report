<?php

use Illuminate\Database\Seeder;

class WasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\WasteReport::class, 100)->create()->each(function ($waste) {
            $waste->save();
        });
        $this->command->info('Waste report table seeded!');
    }
}
