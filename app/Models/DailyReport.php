<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

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


    public function getMyReports($request)
    {
        $userReports = $this->where('user_id', Auth::id());
        if($request->filled('search-month')){
          $userReports->where('reporting_time', 'like', $request->input('search-month') . '%');
        }
        return $userReports->get();
    }

}