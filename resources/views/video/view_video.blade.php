@extends('layouts.app')
@section('title') {!! $videoTitle !!} @parent @endsection
@section('content')

    @if($error)
        <div class="row-container">
            <div class="row error">
                {!! $error !!}
            </div>
        </div>
    @else

        {!! $video->rendered !!}

        <div style="text-align: center;"><img class="load-all" src="{{config('app.base_url')}}img/nav/home.png" title="" alt="" onclick="gotoPage('home');" /></div>

    @endif

@endsection

@section('page-scripts')
    <script type="text/javascript">
        var VIDEO = 0;
        $(document).ready( function()
        {
        });
    </script>
@endsection
