<?php use App\Http\Helpers\TemplateHelper; ?>

@extends('layouts.app')
@section('title') Tutorial :: @parent @endsection
@section('content')

    @if(count($tutorials)>0)
        <div id="tutorials" class="tutorial-panel-title">tutorials</div>
        <div class="row news-row-container news-adjust-div" style="max-width: 70%;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tutorial-text">
                @foreach($tutorials as $tutorial)

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
    @else
        <div id="tutorials" class="tutorial-panel-title">Sorry, no tutorials found</div>
    @endif

    <script type='text/javascript'>

    </script>
@endsection