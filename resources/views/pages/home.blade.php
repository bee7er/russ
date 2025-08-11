<?php use App\Http\Helpers\TemplateHelper; ?>

@extends('layouts.app')
@section('title') home @parent @endsection

@section('content')

    <div id="home">&nbsp;</div>

    <?php
    $secondResource = null;
    if($isShowAllResources) {
        $secondResource = $resources->shift();
    }
    ?>

    @if(null !== $titleResource && $isShowAllResources)
        <div class="row title-row-container">
            <div class="" onclick="document.location='{{url($titleResource->name)}}';">
                <img id="{!! $titleResource->id !!}" class="title-work-image col-xs-12 col-sm-8 col-md-8 col-lg-8 col-xl-8" onmouseover="this.src='{!! $titleResource->titleThumbHover !!}'" onmouseout="this.src='{!! $titleResource->titleThumb !!}'" src="{!! $titleResource->titleThumb !!}" title="" alt="{!! $titleResource->name !!}">
            </div>
            <div {!! $secondResource->clickAction !!} style="">
                <img id="{!! $secondResource->id !!}" class="work-image {!! $secondResource->clickActionClass !!}
                        col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4"
                     {!! $secondResource->hoverActions !!}
                     src="{!! $secondResource->thumb !!}" title="" alt="{!! $secondResource->name !!}">
            </div>
        </div>
    @endif

    @if(count($resources)>0)
        <div class="row-container">
            <div class="row">
                @foreach($resources as $resource)
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

        function preloadImage(url)
        {
            var img=new Image();
            img.src=url;
        }
        @if($isShowAllResources)
            // Preload the images
            preloadImage('{!! $secondResource->thumb !!}');
            preloadImage('{!! $secondResource->thumbHover !!}');
            preloadImage('{!! $titleResource->titleThumb !!}');
            preloadImage('{!! $titleResource->titleThumbHover !!}');
        @endif

        /**
         * For some reason using the bootstrap column classes causes the title image
         * to acquire an incorrect height.  Here we set the height equal to its next door neighbour.
         * We must recalculate the height each time the screen is resized.
         */
        function handleResize() {
            @if($isShowAllResources)
                let f = document.getElementById('{{$secondResource->id}}');
                let h = f.height;
                let t = document.getElementById('{{$titleResource->id}}');
                t.height = h + 30;
                //            console.log('h=' + h);
                //            console.log('3=' + t.height);
            @endif
        }

        $(window).load(function(){
            // This code runs after document ready.  Unfortunately this has been necessary to
            // fix an issue with the size of the showreel images
            @if($isShowAllResources)
                window.addEventListener('resize', handleResize);

                console.log('In wdw load');
                handleResize();
            @endif
        });

    </script>
@endsection
