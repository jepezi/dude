@extends('frontend.layouts.master')

@section('title')
{{ $post->title }} - 
@parent
@stop

@section('meta')
<meta name="description" content="{{{ $post->caption }}}" />

<!-- Twitter Card data --> 
<meta name="twitter:card" content="summary"> 
<meta name="twitter:site" content="@publisher_handle"> 
<meta name="twitter:title" content="{{{ $post->title }}}"> 
<meta name="twitter:description" content="{{{ $post->caption }}}"> 
<meta name="twitter:creator" content="@author_handle"> 
<meta name="twitter:image" content="{{ $_SERVER['HTTP_HOST'].$post->p_images }}">

<!-- Open Graph data --> 
<meta property="og:title" content="{{{ $post->title }}}" /> 
<meta property="og:type" content="article" /> 
<meta property="og:url" content="{{ URL::route('click.to', Hasher::encrypt($post->id) ) }}" />
<meta property="og:image" content="{{ $_SERVER['HTTP_HOST'].$post->p_images }}" />
<meta property="og:description" content="{{{ $post->caption }}}" /> 
<meta property="og:site_name" content="DudeDB" /> 
<meta property="fb:admins" content="" />
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
            @include('frontend.includes.post')

            <hr>

            <!-- START: Livefyre Embed -->
<div id="livefyre-comments"></div>
<script type="text/javascript" src="http://zor.livefyre.com/wjs/v3.0/javascripts/livefyre.js"></script>
<script type="text/javascript">
(function () {
    var articleId = fyre.conv.load.makeArticleId(null);
    fyre.conv.load({}, [{
        el: 'livefyre-comments',
        network: "livefyre.com",
        siteId: "362215",
        articleId: articleId,
        signed: false,
        collectionMeta: {
            articleId: articleId,
            url: fyre.conv.load.makeCollectionUrl(),
        }
    }], function() {});
}());
</script>
<!-- END: Livefyre Embed -->

            </div>
        </div>

    </div>

@stop

@section('footer-script')

<script src="{{ asset('assets/js/home.js') }}"></script>
@stop