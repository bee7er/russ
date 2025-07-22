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

        {{-- Preload images --}}
        <div style="visibility: hidden;">
            @foreach($resources as $resource)
                <img src="{!! $resource->thumb !!}" class="hidden-preload">
                @if ($resource->thumb != $resource->thumbHover)
                    <img src="{!! $resource->thumbHover !!}" class="hidden-preload">
                @endif
            @endforeach
        </div>

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
        </div>
        <div class="go-top" onclick="scrollToAnchor('top');">
            GO TOP
        </div>
    @endif

    @if(count($tutorials)>0)
        <div id="tutorials" class="panel-title">tutorials</div>
            <div class="row news-row-container news-adjust-div" style="max-width: 70%;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tutorial-text">
                        @foreach($tutorials as $tutorial)

                            <?php $url = ($tutorial->url ? $tutorial->url: "#") ?>

                            <div class="tutorial-left">
                                @if($tutorial->thumb)
                                    <?php print TemplateHelper::getImageLink($tutorial->url, $tutorial->thumb); ?>
                                @else
                                    &nbsp;
                                @endif
                            </div>
                            <div class="tutorial-right">
                                @if($tutorial->title)
                                    <?php print TemplateHelper::getTextLink($tutorial->url, $tutorial->title); ?>
                                @else
                                    &nbsp;
                                @endif
                                @if($tutorial->html)
                                    {!! $tutorial->html !!}
                                @endif
                            </div>
                            <div style="clear: both">&nbsp;</div>

                        @endforeach
                </div>
            </div>
        <div class="go-top" onclick="scrollToAnchor('top');">
            GO TOP
        </div>
    @endif

    @if(count($notices)>0)
        <div id="news" class="panel-title">news</div>
            <div class="row news-row-container news-adjust-div" style="max-width: 70%;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 news-text">
                    <ul class="news-adjust-ul">
                        @foreach($notices as $notice)
                            @if($notice->url)
                                <li><a href="{!! url($notice->url) !!}" class="">{!! $notice->notice !!}</a></li>
                            @else
                                <li>{!! $notice->notice !!}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        <div class="go-top" onclick="scrollToAnchor('top');">
            GO TOP
        </div>
    @endif

    <div id="about" class="panel-title">about</div>
    <div id="about-row-container" class="row about-row-container" style="padding:0;">
        <div><img alt="" src="img/russ_headshot.jpg" class="headshot"></div>

        {!! $aboutText !!}

    </div>

    @if($logosText)
        <div id="about-row-container" class="row about-row-container" style="padding:0;">

            {!! $logosText !!}

        </div>
    @endif

    <div class="go-top" onclick="scrollToAnchor('top');">
        GO TOP
    </div>

    <div id="contact" class="panel-title">contact</div>
    <div class="row contact-row-container">

        {!! $contactText !!}

    </div>
    <div class="go-top" onclick="scrollToAnchor('top');">
        GO TOP
    </div>

@endsection

@section('page-scripts')
    <script type="text/javascript">
        $(document).ready( function()
        {

        });
    </script>
@endsection
