<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyReport extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'reporting_time',
    ];

    protected $dates = ['reporting_time', 'deleted_at'];

    public function getMyReports($searchMonth,$id)
    {
        $userReports = $this->where('user_id', $id);
        if (filled($searchMonth)) {
            $userReports->where('reporting_time', 'like', $searchMonth . '%');
        }
        return $userReports->orderby('reporting_time','desc')->get();
    }

}