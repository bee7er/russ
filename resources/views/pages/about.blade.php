<?php use App\Http\Helpers\TemplateHelper; ?>

@extends('layouts.app')
@section('title') About :: @parent @endsection
@section('content')

    <div id="about" class="about-panel-title">about</div>

    {{-- no comment --}}
    {!! $aboutText !!}

    <div style="text-align: center;"><img class="load-all" src="{{config('app.base_url')}}img/nav/home.png" title="" alt="" onclick="gotoPage('home');" /></div>

    <script type='text/javascript'>

    </script>
@endsection

@section('page-scripts')
    <script type="text/javascript">
        function handleResize() {
            let i = document.getElementById('imgId');
            let d1 = document.getElementById('divId_1');
            let d2 = document.getElementById('divId_2');
            let d3 = document.getElementById('divId_3');

            d1.style.height = ((i.height + 30) + 'px');
            d2.style.height = ((i.height + 30) + 'px');
            d3.style.height = ((i.height + 30) + 'px');

        }

        $(window).load(function(){
            window.addEventListener('resize', handleResize);
            handleResize();
        });

    </script>
@endsection
