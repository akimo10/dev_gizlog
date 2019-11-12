<?php

use Faker\Generator as Faker;
use App\Models\DailyReport;

$factory->define(App\Models\DailyReport::class, function (Faker $faker) {
    return [
        // 'user_id' => function() {
        //   return factory(DailyReport::class)->create()->id;
        // },
        'user_id' => $faker->numberBetween($min = 1, $max = 4),
        'title' => 'テスト',
        'content' => 'テスト' . $faker->realText($maxNbChars = 200,$indexSize = 5),
        'reporting_time' => $faker->dateTimeThisYear($max = 'now'),
    ];
});
