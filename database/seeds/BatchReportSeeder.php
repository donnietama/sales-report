<?php

use Illuminate\Database\Seeder;

class BatchReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ReportSummary::class, 100)->create()->each(function ($batch) {
            $batch->save();
        });
        $this->command->info('Batch report table seeded!');
    }
}
