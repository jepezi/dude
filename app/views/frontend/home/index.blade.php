@extends('frontend.layouts.master')

@section('title')
@parent
@stop

@section('head-script')
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
        <div class="page-content inset" id="post-container">
            @include('frontend.includes.posts')
            </div>
        </div>
        
        {{ $posts->links() }}

    </div>

@stop

@section('footer-script')
<script src="{{ asset('assets/js/home.js') }}"></script>
<!--
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=351786284971642&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
-->
@stop