<?php

use Illuminate\Database\Seeder;

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
        DB::table('daily_reports')->insert([
            'user_id' => 1,
            'title' => 'テストです',
            'content' => 'テストです',
            'repoting_time' => Carbon::create(2018,7,1,13,00,30),
            'created_at' => Carbon::create(2019,7,1,13,00,30),
            'updated_at' => Carbon::create(2019,7,2,12,00,00),
        ]);
    }
}
