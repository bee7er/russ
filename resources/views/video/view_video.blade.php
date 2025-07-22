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
