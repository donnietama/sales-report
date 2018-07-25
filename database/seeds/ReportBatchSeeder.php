<?php

use Illuminate\Database\Seeder;

class ReportBatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ReportBatch::class, 100)->create()->each(function ($batch) {
            $batch->save();
        });
        $this->command->info('Batch seeded!');
    }
}
