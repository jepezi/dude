@extends('admin.layouts.master')

@section('title')
@parent
- Admin Home
@stop


@section('content')
@include('admin.includes.menu')
<h1>Hi admin!</h1>

@if (count($posts) > 0)
    @foreach ($posts as $post)
        <div>
        	<h3><a href="{{ URL::route('click.to', Hasher::encrypt($post->id) ) }}" target="_blank">{{ $post->title }} <small>click: {{ $post->click_total }}</small></a></h3>
        	<p>{{ $post->caption }}</p>
        	<ul>
        	@foreach ($post->genres as $genre)
    			<li>{{ $genre->name }}</li>
        	@endforeach
        		</ul>
        	<img src="{{ $post->p_images }}" alt="">

        </div>
    @endforeach
@else
    Oh! No Posts!
@endif

@stop