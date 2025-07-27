<?php use App\Http\Helpers\TemplateHelper; ?>

@extends('layouts.app')
@section('title') home @parent @endsection

@section('content')

    <div id="home">&nbsp;</div>

    @if(null !== $titleResource && $isShowAllResources)
        <div class="title-row-container">
            <div class="row" onclick="document.location='{{url($titleResource->name)}}';">
                <img id="{!! $titleResource->id !!}" class="title-work-image" onmouseover="this.src='{!! $titleResource->titleThumbHover !!}'" onmouseout="this.src='{!! $titleResource->titleThumb !!}'" src="{!! $titleResource->titleThumb !!}" title="" alt="{!! $titleResource->name !!}" style="width: 100%">
            </div>
        </div>
    @endif

    @if(count($resources)>0)
        <div class="row-container">
            <div class="row">
                @foreach($resources as $resource)
                    @if($resource->video)
                        <div {!! $resource->clickAction !!}>
                            <video class="work-image {!! $resource->clickActionClass !!} col-xs-12 col-sm-6 col-md-6
                             col-lg-4"
                                   autoplay
                                   muted loop
                                   preload="auto">
                                <source src="{!! $resource->video !!}" type="video/mp4">
                                Your browser does not support the video tag
                            </video>
                        </div>
                    @else
                        <div {!! $resource->clickAction !!}>
                            <img id="{!! $resource->id !!}" class="work-image {!! $resource->clickActionClass !!}
                                    col-xs-12 col-sm-6 col-md-6 col-lg-4"
                                 {!! $resource->hoverActions !!}
                                 src="{!! $resource->thumb !!}" title="" alt="{!! $resource->name !!}">
                        </div>
                    @endif
                @endforeach
            </div>

            @if(1 != $cookieLoadAll)
                <img class="load-all" src="{{config('app.base_url')}}img/nav/plus.png" title="Show more works" onclick="loadAllResources();" />
            @else
                <img class="load-all" src="{{config('app.base_url')}}img/nav/minus.png" title="Show fewer works" onclick="loadFewResources();" />
            @endif
        </div>
    @endif

@endsection

@section('page-scripts')
    <script type="text/javascript">
        $(document).ready( function()
        {

        });
    </script>
@endsection
