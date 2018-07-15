<?php

use Illuminate\Database\Seeder;

class ReportSummarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ReportSummary::class, 100)->create()->each(function($summary) {
            $summary->save();
        });
        $this->command->info('Report summaries table seeded!');
    }
}
