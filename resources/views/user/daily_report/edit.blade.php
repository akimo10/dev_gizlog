@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    {{ Form::open(['route' => ['dailyreport.update',$selectReport->id], 'method' => 'put']) }}
      <div class="form-group form-size-small">
        {{ Form::input('date', 'reporting_time', $selectReport->reporting_time, ['class' => 'form-control']) }}
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        {{ Form::input('text', 'title', $selectReport->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
        @if($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
        @endif
      </div>
      <div class="form-group">
        {{ Form::textarea('content', $selectReport->content, ['class' => 'form-control', 'placeholder' => 'content']) }}
        @if($errors->has('content'))
        <span class="help-block">{{ $errors->first('content') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-success pull-right">Update</button>
    {{ Form::close() }}
  </div>
</div>

@endsection

