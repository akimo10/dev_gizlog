<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DailyReport;
use App\Http\Requests\User\DailyReportRequest;
use Auth;
use Illuminate\Support\Carbon;

class DailyReportController extends Controller
{
    private $report;

    public function __construct(DailyReport $dailyReport)
    {
        $this->middleware('auth');
        $this->report = $dailyReport;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $require)
    {
        $reports = $this->report->all();
        return view('user.daily_report.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.daily_report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DailyReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DailyReportRequest $request)
    {
        $newReport = $request->all();
        $newReport['user_id'] = Auth::id();
        $this->report->fill($newReport)->save();
        return redirect()->route('dailyreport.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $selectReport = $this->report->find($id);
        $carbon = Carbon::parse($selectReport->reporting_time);
        return view('user.daily_report.show', compact('selectReport', 'carbon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectReport = $this->report->find($id);
        return view('user.daily_report.edit', compact('selectReport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DailyReportRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DailyReportRequest $request, $id)
    {
        $editReport = $request->all();
        $this->report->find($id)->fill($editReport)->save();
        return redirect()->route('dailyreport.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->report->find($id)->delete();
        return redirect()->route('dailyreport.index');
    }

    /**
     * 
     */
    public function serch(Request $request)
    {
        $serchMonth = $request->input('search-month');
        $reports = $this->report->where('reporting_time', 'like', $serchMonth . '%')->get();
        return view('user.daily_report.index', compact('reports'));
    }
}
