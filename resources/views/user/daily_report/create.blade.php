@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
    {{ Form::open(['route' => 'dailyreport.store' ]) }}
      <div class="form-group form-size-small">
        {{ Form::input('date', 'reporting_time', null, ['class' => 'form-control']) }}
        <span class="help-block"></span>
      </div>
      <div class="form-group @if($errors->has('title'))) has-error @endif">
        {{ Form::input('text', 'title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
        @if($errors->has('title'))
        <span class="has-error help-block">{{ $errors->first('title') }}</span>
        @endif
      </div>
      <div class="form-group  @if($errors->has('content'))) has-error @endif">
        {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Content']) }}
        @if($errors->has('content'))
        <span class="help-block">{{ $errors->first('content') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-success pull-right">Add</button>
    {{Form::close()}}
  </div>
</div>

@endsection

