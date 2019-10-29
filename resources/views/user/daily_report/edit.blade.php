@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    {{ Form::open(['route' => ['dailyreport.update',$selectReport->id], 'method' => 'put']) }}
      {{ Form::input('hidden', 'user_id', $selectReport->user_id, ['class' => 'form-control']) }}
      <div class="form-group form-size-small">
        {{ Form::input('date', 'reporting_time', $selectReport->reporting_time, ['class' => 'form-control']) }}
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        {{ Form::input('text', 'title', $selectReport->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
        <span class="help-block">{{ $errors->first('title') }}</span>
      </div>
      <div class="form-group">
        {{ Form::textarea('content', $selectReport->content, ['class' => 'form-control', 'placeholder' => 'content']) }}
      <span class="help-block">{{ $errors->first('content') }}</span>
      </div>
      <button type="submit" class="btn btn-success pull-right">Update</button>
    {{ Form::close() }}
  </div>
</div>

@endsection

