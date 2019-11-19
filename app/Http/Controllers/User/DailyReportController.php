<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DailyReport;
use App\Http\Requests\User\DailyReportRequest;
use App\Http\Requests\User\DailyReportIndexRequest;
use Auth;

class DailyReportController extends Controller
{
    private $report;

    public function __construct(DailyReport $dailyReport)
    {
        $this->middleware('auth');
        $this->report = $dailyReport;
    }
    /**
     * 日報一覧表示4
     * @param DailyReportIndexRequest $request
     * @return \Illuminate\View\View
     */
    public function index(DailyReportIndexRequest $request)
    {
        $selectedMonth = $request->input('search-month');
        $reports = $this->report->getMyReports($selectedMonth, Auth::id());
        return view('user.daily_report.index', compact('reports'));
    }

    /**
     * 新規作成ページ画面表示
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user.daily_report.create');
    }

    /**
     * 新規作成した日報の保存
     *
     * @param  DailyReportRequest  $request
     * @return \Illuminate\View\View
     */
    public function store(DailyReportRequest $request)
    {
        $newReport = $request->all();
        $newReport['user_id'] = Auth::id();
        $this->report->fill($newReport)->save();
        return redirect()->route('dailyreport.index');
    }

    /**
     * 詳細画面表示
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $selectedReport = $this->report->find($id);
        return view('user.daily_report.show', compact('selectedReport'));
    }

    /**
     * 編集画面表示
     *
     * @param  int  $id
     * @return \Illuminate\View\View
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
     * @return \Illuminate\Routing\Redirector
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
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->report->find($id)->delete();
        return redirect()->route('dailyreport.index');
    }

}
