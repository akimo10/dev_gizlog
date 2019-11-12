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
     * 日報一覧表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = $this->report->where('user_id', Auth::id());
        if($request->filled('search-month')){
            $input->where('reporting_time', 'like', $request->input('search-month') . '%');
        }
        $reports = $input->get();
        return view('user.daily_report.index', compact('reports'));
    }

    /**
     * 新規作成ページへの遷移
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.daily_report.create');
    }

    /**
     * 新規作成した日報の保存
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
     * 詳細画面への遷移
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $selectedReport = $this->report->find($id);
        $carbon = $selectedReport->reporting_time->format('Y/m/d(D)');
        // $carbon = Carbon::parse($selectedReport->reporting_time);
        return view('user.daily_report.show', compact('selectedReport', 'carbon'));
    }

    /**
     * 編集画面への遷移
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectedReport = $this->report->find($id);
        return view('user.daily_report.edit', compact('selectedReport'));
    }

    /**
     * 編集した日報を保存
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
     * 日報の削除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->report->find($id)->delete();
        return redirect()->route('dailyreport.index');
    }

}
