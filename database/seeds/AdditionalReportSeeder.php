<?php

use Illuminate\Database\Seeder;

class AdditionalReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AdditionalReport::class, 100)->create()->each(function ($additional) {
            $additional->save();
        });
        $this->command->info('Additional report table seeded!');
    }
}
