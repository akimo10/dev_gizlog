<?php

use Illuminate\Database\Seeder;
// use App\Models\DailyReport;
// use Illuminate\Database\Eloquent\Model;

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
        factory(App\Models\DailyReport::class,10)->create();
        // DB::table('daily_reports')->insert([
        //     [
        //         'user_id' => 4,
        //         'title' => 'テスト',
        //         'content' => 'テスト',
        //         'reporting_time' => Carbon::create(2019,7,1,13,00,30),
        //         'created_at' => Carbon::create(2019,7,1,13,00,30),
        //         'updated_at' => Carbon::create(2019,7,2,12,00,00),
        //     ],
        //     [
        //         'user_id' => 4,
        //         'title' => 'test',
        //         'content' => 'test',
        //         'reporting_time' => Carbon::create(2018,8,1,13,00,30),
        //         'created_at' => Carbon::create(2019,8,1,13,00,30),
        //         'updated_at' => Carbon::create(2019,8,2,12,00,00),
        //     ],
        //     [
        //         'user_id' => 4,
        //         'title' => 'testest',
        //         'content' => 'testest',
        //         'reporting_time' => Carbon::create(2018,9,1,13,00,30),
        //         'created_at' => Carbon::create(2019,9,1,13,00,30),
        //         'updated_at' => Carbon::create(2019,9,2,12,00,00),
        //     ]
        // ]);
    }
}
