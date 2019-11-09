<?php

use Faker\Generator as Faker;

$factory->define(App\Models\DailyReport::class, function (Faker $faker) {
    return [
                'user_id' => $faker -> numberBetween($min = 4,$max = 4),
                'title' => 'テスト',
                'content' => 'テスト' . $faker -> realText($maxNbChars = 200,$indexSize = 2),
                'reporting_time' => $faker -> dateTimeThisYear($max = 'now',$timezone = null),
                'created_at' => $faker -> dateTimeThisYear($max = 'now',$timezone = null),
                'updated_at' => Carbon::now(),
    ];
});
