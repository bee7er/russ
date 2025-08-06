<?php use App\Http\Helpers\TemplateHelper; ?>

@extends('layouts.app')
@section('title') home @parent @endsection

@section('content')

    <div id="home">&nbsp;</div>

    {{--@if(null !== $titleResource && $isShowAllResources)--}}
        {{--<div class="title-row-container">--}}
            {{--<div class="row" onclick="document.location='{{url($titleResource->name)}}';">--}}
                {{--<img id="{!! $titleResource->id !!}" class="title-work-image" onmouseover="this.src='{!! $titleResource->titleThumbHover !!}'" onmouseout="this.src='{!! $titleResource->titleThumb !!}'" src="{!! $titleResource->titleThumb !!}" title="" alt="{!! $titleResource->name !!}" style="width: 100%">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}

    @if(count($resources)>0)
        <div class="row-container">
            <div class="row">
                <?php
                $used = false;
                $secondResource = null;
                ?>
                @foreach($resources as $resource)
                    @if($titleResource && !$used)
                        <div onclick="document.location='{{url($titleResource->name)}}';">
                            <img id="{!! $titleResource->id !!}" class="title-work-image {!! $titleResource->clickActionClass !!}
                                    col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8" style=""
                                 onmouseover="this.src='{!! $titleResource->titleThumbHover !!}'" onmouseout="this.src='{!! $titleResource->titleThumb !!}'"
                                 src="{!! $titleResource->titleThumb !!}" title="" alt="{!! $titleResource->name !!}">
                        </div>
                            <?php $used = true; ?>
                    @else
                        @if(null == $secondResource)
                                <?php $secondResource = $resource; ?>
                            @endif
                        @if($resource->video)
                            <div {!! $resource->clickAction !!} style="">
                                <video class="work-image {!! $resource->clickActionClass !!} col-xs-12 col-sm-6 col-md-6
                                 col-lg-4 col-xl-4"
                                       autoplay
                                       muted loop
                                       preload="auto">
                                    <source src="{!! $resource->video !!}" type="video/mp4">
                                    Your browser does not support the video tag
                                </video>
                            </div>
                        @else
                            <div {!! $resource->clickAction !!} style="">
                                <img id="{!! $resource->id !!}" class="work-image {!! $resource->clickActionClass !!}
                                        col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4"
                                     {!! $resource->hoverActions !!}
                                     src="{!! $resource->thumb !!}" title="" alt="{!! $resource->name !!}">
                            </div>
                        @endif
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

        function handleResize() {
            let f = document.getElementById('{{$secondResource->id}}');
            let h = f.height;
            let t = document.getElementById('{{$titleResource->id}}');

            t.height = h + 30;
            console.log('h=' + h);
            console.log('3=' + t.height);
        }
        window.addEventListener('resize', handleResize);

        handleResize();

    </script>
@endsection
