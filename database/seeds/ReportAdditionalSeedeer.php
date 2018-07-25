<?php

use Illuminate\Database\Seeder;

class ReportAdditionalSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ReportAdditional::class, 100)->create()->each(function ($additional) {
            $additional->save();
        });
        $this->command->info('Additional report seeded!');
    }
}
