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
            <div id="goTopHand-work" class="bodymovin-hand" onmouseover="startBodymovinHand(WORK);"
                 onmouseout="stopBodymovinHand(WORK);">
            </div>
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
            <div id="goTopHand-tutorials" class="bodymovin-hand" onmouseover="startBodymovinHand(TUTORIALS);"
                 onmouseout="stopBodymovinHand(TUTORIALS);">
            </div>
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
            <div id="goTopHand-press" class="bodymovin-hand" onmouseover="startBodymovinHand(PRESS);"
                 onmouseout="stopBodymovinHand(PRESS);">
            </div>
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
        <div id="goTopHand-about" class="bodymovin-hand" onmouseover="startBodymovinHand(ABOUT);"
             onmouseout="stopBodymovinHand(ABOUT);">
        </div>
    </div>

    <div id="contact" class="panel-title">contact</div>
    <div class="row contact-row-container">

        {!! $contactText !!}

        {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contact-text">--}}
            {{--<p>Have a project in mind, or just want to say hi?</p>--}}
            {{--<p>I’d love to hear from you!</p>--}}
            {{--<p>--}}
                {{--<a href="javascript: mail2('contact','russ','etheridge','com')"><img class="col-xs-12 col-sm-12 col-md-12 col-lg-12" src="img/contact3.png" title=""></a>--}}
            {{--</p>--}}
            {{--<p class="center-text">Follow me!</p>--}}
            {{--<p class="center-text"><a target="_blank" href="https://www.instagram.com/russ_ether/"><img src="img/social/instagram.png" class="social-icon" title="Share on instagram" /></a><a target="_blank" href="https://www.linkedin.com/in/russether"><img src="img/social/linkedin.png" class="social-icon" title="Share on linkedin" /></a><a target="_blank" href="https://twitter.com/russ_ether"><img src="img/social/twitter.png" class="social-icon" title="Share on twitter" /></a></p>--}}
        {{--</div>--}}

        {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contact-text"><p>Have a project in mind, or just want to say hi?</p><p>I’d love to hear from you!</p><p><a href="mailto: contact'@russetheridge.com"><img class="col-xs-12 col-sm-12 col-md-12 col-lg-12" src="img/contact3.png" title=""></a></p><p class="center-text">Follow me!</p></div><div><p class="center-text"><a target="_blank" href="https://www.instagram.com/russ_ether/"><img src="img/social/instagram.png" class="social-icon" title="Share on instagram" /></a><a target="_blank" href="https://www.linkedin.com/in/russether"><img src="img/social/linkedin.png" class="social-icon" title="Share on linkedin" /></a><a target="_blank" href="https://twitter.com/russ_ether"><img src="img/social/twitter.png" class="social-icon" title="Share on twitter" /></a></p></div>--}}


    </div>
    <div class="go-top" onclick="scrollToAnchor('top');">
        <div id="goTopHand-contact" class="bodymovin-hand" onmouseover="startBodymovinHand(CONTACT);"
             onmouseout="stopBodymovinHand(CONTACT);">
        </div>
    </div>

@endsection

@section('page-scripts')
    <script type="text/javascript">
        var WORK = 0;
        var ABOUT  = 1;
        var CONTACT = 2;
        var PRESS = 3;
        var TUTORIALS = 4;
        $(document).ready( function()
        {
            // Setup the goto top hands and store them in an array
            handAnims[WORK] = createBodymovinHand(document.getElementById('goTopHand-work'));
            handAnims[ABOUT] = createBodymovinHand(document.getElementById('goTopHand-about'));
            handAnims[CONTACT] = createBodymovinHand(document.getElementById('goTopHand-contact'));
            handAnims[PRESS] = createBodymovinHand(document.getElementById('goTopHand-press'));
            handAnims[TUTORIALS] = createBodymovinHand(document.getElementById('goTopHand-tutorials'));
        });
    </script>
@endsection
