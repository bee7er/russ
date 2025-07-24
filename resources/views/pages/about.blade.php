<?php use App\Http\Helpers\TemplateHelper; ?>

@extends('layouts.app')
@section('title') About :: @parent @endsection
@section('content')

    <div id="about" class="about-panel-title">about</div>
    <div id="about-row-container" class="row about-row-container" style="padding:0;">
        <div><img alt="" src="img/russ_headshot.jpg" class="headshot"></div>

        {!! $aboutText !!}

    </div>

    <div style="text-align: center;"><img class="load-all" src="{{config('app.base_url')}}img/nav/home.png" title="" alt="" onclick="gotoPage('home');" /></div>

    <script type='text/javascript'>

    </script>
@endsection