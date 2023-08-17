@extends('admin.layouts.modal')
{{-- Content --}}
@section('content')
        <!-- Tabs -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#tab-general" data-toggle="tab"> {{
			trans("admin/modal.general") }}</a></li>
</ul>
<!-- ./ tabs -->
@if (isset($tutorial))
{!! Form::model($tutorial, array('url' => url('admin/tutorial') . '/' . $tutorial->id, 'method' => 'put','class' => 'bf')) !!}
@else
{!! Form::open(array('url' => url('admin/tutorial'), 'method' => 'post', 'class' => 'bf')) !!}
@endif
        <!-- Tabs Content -->
<div class="tab-content">
    <!-- General tab -->
    <div class="tab-pane active" id="tab-general">
        <div class="form-group  {{ $errors->has('seq') ? 'has-error' : '' }}">
            {!! Form::label('Sequence', trans("admin/tutorial.seq"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::text('seq', null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('seq', ':message') }}</span>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('tutorial') ? 'has-error' : '' }}">
            {!! Form::label('tutorial', trans("admin/tutorial.title"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::text('title', null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('tutorial', ':message') }}</span>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('thumb') ? 'has-error' : '' }}">
            {!! Form::label('thumb', trans("admin/tutorial.thumb"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::text('thumb', null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('thumb', ':message') }}</span>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('url') ? 'has-error' : '' }}">
            {!! Form::label('url', trans("admin/tutorial.url"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::text('url', null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('url', ':message') }}</span>
            </div>
        </div>
        <div class="form-group  {{ $errors->has('tutorial') ? 'has-error' : '' }}">
            {!! Form::label('html', trans("admin/tutorial.html"), array('class' => 'control-label')) !!}
            <div class="controls">
                {!! Form::textarea('html', null, array('class' => 'form-control')) !!}
                <span class="help-block">{{ $errors->first('tutorial', ':message') }}</span>
            </div>
        </div>
        <!-- ./ general tab -->
    </div>
    <!-- ./ tabs content -->

    <!-- Form Actions -->

    <div class="form-group">
        <div class="col-md-12">
            <button type="reset" class="btn btn-sm btn-warning close_popup">
                <span class="glyphicon glyphicon-ban-circle"></span> {{
						trans("admin/modal.cancel") }}
            </button>
            <button type="reset" class="btn btn-sm btn-default">
                <span class="glyphicon glyphicon-remove-circle"></span> {{
						trans("admin/modal.reset") }}
            </button>
            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span>
                @if	(isset($tutorial))
                    {{ trans("admin/modal.edit") }}
                @else
                    {{trans("admin/modal.create") }}
                @endif
            </button>
        </div>
    </div>
    <!-- ./ form actions -->
{!! Form::close() !!}
</div>
@endsection
