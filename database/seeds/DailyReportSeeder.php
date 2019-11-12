<?php

use Illuminate\Database\Seeder;
use App\Models\DailyReport;

class DailyReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daily_reports')->truncate();
        factory(DailyReport::class,10)->create();
    }
}
