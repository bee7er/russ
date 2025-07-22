<?php use App\Http\Helpers\TemplateHelper; ?>

@extends('layouts.app')
@section('title') Contact :: @parent @endsection
@section('content')

    <div id="contact" class="contact-panel-title">contact</div>
    <div class="row contact-row-container">

        {!! $contactText !!}

    </div>

    <script type='text/javascript'>

    </script>
@endsection