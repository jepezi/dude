@extends('frontend.layouts.master')

@section('title')
@parent
- Tell Dude
@stop


@section('content')

<div id="wrapper">
    
    <div id="sidebar-wrapper">
        @include('frontend.includes.nav')
        </div>

    <div id="page-content-wrapper">
        <div class="content-header visible-xs-block">
                <h1>
                    <a id="menu-toggle" href="#" class="btn btn-default"><i class="fa fa-bars"></i></a>
                    DudeDB
                </h1>
            </div>
        <div class="page-content inset">
            @include('frontend.includes.tell')
            </div>
        </div>


    </div>

@stop