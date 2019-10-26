@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    <form action="{{ route('dailyreport.update',$selectReport->id) }}" method="post">
      @method('PUT')
      @CSRF
      <input class="form-control" name="user_id" type="hidden" value="{{ $selectReport->user_id }}">
      <div class="form-group form-size-small">
        <input class="form-control" name="reporting_time" type="date" value="{{ $selectReport->reporting_time }}">
      <span class="help-block"></span>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="Title" name="title" type="text" value="{{ $selectReport->title }}">
      <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="本文" name="content" cols="50" rows="10">{{ $selectReport->content }}</textarea>
      <span class="help-block">{{ $errors->first('content') }}</span>
      </div>
      <button type="submit" class="btn btn-success pull-right">Update</button>
    </form>
  </div>
</div>

@endsection

