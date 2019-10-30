@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報一覧</h2>
<div class="main-wrap">
  <div class="btn-wrapper daily-report">
    <form action="{{ route('dailyreport.index') }}" method="get">
      @CSRF
      <input type="hidden" name="select" value="search">
      <input class="form-control" name="search-month" type="month">
      <button type="submit" class="btn btn-icon"><i class="fa fa-search"></i></button>
    </form>
    <a class="btn btn-icon" href="{{ route('dailyreport.create') }}"><i class="fa fa-plus"></i></a>
  </div>
  <div class="content-wrapper table-responsive">
    <table class="table table-striped">
      <thead>
        <tr class="row">
          <th class="col-xs-2">Date</th>
          <th class="col-xs-3">Title</th>
          <th class="col-xs-5">Content</th>
          <th class="col-xs-2"></th>
        </tr>
      </thead>
      @foreach($reports as $dailyReport)
      <tbody>
          <tr class="row">
            <td class="col-xs-2">{{ $dailyReport->reporting_time }}</td>
            <td class="col-xs-3">{{ $dailyReport->title }}</td>
            <td class="col-xs-5">{{ $dailyReport->content }}</td>
            <td class="col-xs-2"><a class="btn" href="{{ route('dailyreport.show',$dailyReport->id) }}"><i class="fa fa-book"></i></a></td>
          </tr>
      </tbody>
      @endforeach
    </table>
  </div>
</div>

@endsection

