@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    {{ Form::open(['route' => ['dailyreport.update',$selectedReport->id], 'method' => 'put']) }}
      <div class="form-group form-size-small @if($errors->has('reporting_time')) has-error @endif">
        {{ Form::input('date', 'reporting_time', $selectedReport->reporting_time->format('Y-m-d'), ['class' => 'form-control']) }}
        @if($errors->has('reporting_time'))
        <span class="help-block">{{ $errors->first('reporting_time') }}</span>
        @endif
      </div>
      <div class="form-group  @if($errors->has('title'))) has-error @endif">
        {{ Form::input('text', 'title', $selectedReport->title, ['class' => 'form-control', 'placeholder' => 'Title']) }}
        @if($errors->has('title'))
        <span class="help-block">{{ $errors->first('title') }}</span>
        @endif
      </div>
      <div class="form-group  @if($errors->has('content'))) has-error @endif">
        {{ Form::textarea('content', $selectedReport->content, ['class' => 'form-control', 'placeholder' => 'content']) }}
        @if($errors->has('content'))
        <span class="help-block">{{ $errors->first('content') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-success pull-right">Update</button>
    {{ Form::close() }}
  </div>
</div>

@endsection

