@extends('admin.layouts.master')

@section('title')
@parent
- Admin
@stop


@section('content')
@include('admin.includes.menu')
@include('admin.includes.noti')
<h1>Create Post Link</h1>

{{ Form::open(['route' => 'admin.post.storeLink']) }}
				<div class="form-group">
					<label for="dude-title">Title</label>
                    <input type="text" class="form-control" name="title" id="dude-title" placeholder="Title" value="{{{ Input::old('title') }}}">
                	</div>

                <div class="form-group">
                    <label for="dude-slug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="dude-slug" placeholder="Slug in English" value="{{{ Input::old('slug') ? Input::old('slug') : "" }}}">
                    </div>

				<div class="form-group">
					<label for="dude-caption">Caption</label>
                    <textarea class="form-control" name="caption" id="dude-caption" placeholder="Caption this list" rows="3">{{{ Input::old('caption') }}}</textarea>
                	</div>
<!-- tag -->
<!-- genre -->
                @if (count($genres) > 0)
                    @foreach ($genres as $genre)
                        <label class="checkbox-inline">
                            <!-- <input type="checkbox" id="genre{{ $genre->id }}" value="{{ $genre->id }}"> <img src="{{ $genre->icon }}" alt="">{{ $genre->name }} -->
                            {{ Form::checkbox('genres[]', $genre->id); }}<img src="{{ $genre->icon }}" alt="">{{ $genre->name }}
                            </label>
                    @endforeach
                @else
                    Oh! No Genres!
                @endif
<!-- radio -->
                <div class="radio">
                    <label>
                        <input type="radio" name="type" id="postTypeDefault" value="default" checked>
                        Default
                        </label>
                    </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="type" id="postTypeVideo" value="video">
                        Video
                        </label>
                    </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="type" id="postTypePantip" value="pantip">
                        Pantip
                        </label>
                    </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="type" id="postTypeNote" value="note">
                        Note
                        </label>
                    </div>
<!-- end radio -->
                <div class="form-group">
                    <label for="dude-url">URL</label>
                    <input type="text" class="form-control" name="url" id="dude-url" placeholder="URL" value="{{{ Input::old('url') }}}">
                    </div>

                <div class="form-group">
					<label for="dude-p-title">Link Title</label>
                    <input type="text" class="form-control" name="p_title" id="dude-p-title" placeholder="Link Title" value="{{{ Input::old('p_title') }}}">
                	</div>

                <div class="form-group">
                    <label for="dude-p-description">Link Description</label>
                    <textarea class="form-control" name="p_description" id="dude-p-description" rows="3" placeholder="Link Description">{{{ Input::old('p_description') }}}</textarea>
                    </div>
                
                <div class="form-group">
                    <span class="btn btn-default fileinput-button">
                        <span>Choose Image</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload" type="file" name="files[]" multiple>
                    </span>
                    <small class="help">(size 240x240)</small>
                    <br>
                    <br>
                    <!-- The global progress bar -->
                    <div id="fileuploadprogress" class="progress">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>
                    <!-- The container for the uploaded files -->
                    <div id="files" class="files"></div>
                    <img src="" alt="" id="preview_upload">
                    </div>
                

                <input type="hidden" name="p_images" id="p_images" value="">
					
				<button type="submit" class="btn btn-primary btn-block btn-lg">Add this List</button>
				
{{ Form::close() }}

@stop


@section('footer-script')

<script src="{{ asset('assets/js/uploadImagePostLink.js') }}"></script>
@stop


