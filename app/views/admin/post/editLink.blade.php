@extends('admin.layouts.master')

@section('title')
@parent
- Edit Link
@stop


@section('content')
@include('admin.includes.menu')
@include('admin.includes.noti')
<h1>Edit Post Link</h1>

{{ Form::model($post, ['route' => ['admin.post.updateLink', $post->id] , 'method' => 'post' , 'files' => true]) }}
				<div class="form-group">
					<label for="dude-title">Title</label>
                    <!-- <input type="text" class="form-control" name="title" id="dude-title" placeholder="Title"> -->
                    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
                	</div>

                <div class="form-group">
                    <label for="dude-slug">Slug</label>
                    <!-- <input type="text" class="form-control" name="slug" id="dude-slug" placeholder="Slug in English" value="{{{ Input::old('slug') ? Input::old('slug') : "" }}}"> -->
                    {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug']) }}
                    </div>

				<div class="form-group">
					<label for="dude-caption">Caption</label>
                    <!-- <textarea class="form-control" name="caption" id="dude-caption" placeholder="Caption this list" rows="3">{{{ Input::old('caption') }}}</textarea> -->
                	{{ Form::textarea('caption', null, ['class' => 'form-control', 'placeholder' => 'Caption']) }}
                    </div>
<!-- tag -->
<!-- genre -->
                @if (count($genres) > 0)
                    @foreach ($genres as $genre)
                        <label class="checkbox-inline">
                            <input type="checkbox" name="genres[]" id="genre{{ $genre->id }}" value="{{ $genre->id }}" <?php echo in_array($genre->id, $post->genres->lists('id')) ? "checked" : ""; ?>> <img src="{{ $genre->icon }}" alt="">{{ $genre->name }}
                            <!-- {{ Form::checkbox( 'genres[]', $genre->id, in_array($genre->id, $post->genres->lists('id')) ) }}<img src="{{ $genre->icon }}" alt="">{{ $genre->name }} -->
                            </label>
                    @endforeach
                @else
                    Oh! No Genres!
                @endif
<!-- radio -->
                <div class="radio">
                    <label>
                        <input type="radio" name="type" id="postTypeDefault" value="default" <?php if($post->type == 'default') echo "checked" ?>>
                        Default
                        </label>
                    </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="type" id="postTypeVideo" value="video" <?php if($post->type == 'video') echo "checked" ?>>
                        Video
                        </label>
                    </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="type" id="postTypePantip" value="pantip" <?php if($post->type == 'pantip') echo "checked" ?>>
                        Pantip
                        </label>
                    </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="type" id="postTypeNote" value="note" <?php if($post->type == 'note') echo "checked" ?>>
                        Note
                        </label>
                    </div>
<!-- end radio -->
                <div class="form-group">
                    <label for="dude-url">URL</label>
                    <!-- <input type="text" class="form-control" name="url" id="dude-url" placeholder="URL" value="{{{ Input::old('url') }}}"> -->
                    {{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'URL']) }}
                    </div>

                <div class="form-group">
					<label for="dude-p-title">Link Title</label>
                    <!-- <input type="text" class="form-control" name="p_title" id="dude-p-title" placeholder="Link Title" value="{{{ Input::old('p_title') }}}"> -->
                	{{ Form::text('p_title', null, ['class' => 'form-control', 'placeholder' => 'Link Title']) }}
                    </div>

                <div class="form-group">
                    <label for="dude-p-description">Link Description</label>
                    <!-- <textarea class="form-control" name="p_description" id="dude-p-description" rows="3" placeholder="Link Description">{{{ Input::old('p_description') }}}</textarea> -->
                    {{ Form::textarea('p_description', null, ['class' => 'form-control', 'placeholder' => 'Link Description']) }}
                    </div>

                <div class="form-group">
                    <img src="{{ $post->p_images }}" alt="">
                </div>
                
                <div class="form-group">
                    <span class="btn btn-default fileinput-button">
                        <span>Choose Image</span>

                        <input id="fileupload" type="file" name="files[]">
                    </span>
                    <small class="help">(size 240x240)</small>
                    <br>
                    <br>

                    <div id="fileuploadprogress" class="progress">
                        <div class="progress-bar progress-bar-success"></div>
                    </div>

                    <div id="files" class="files"></div>
                    <img src="" alt="" id="preview_upload">
                    </div>
                

                <input type="hidden" name="p_images" id="p_images" value="{{ $post->p_images }}">
					
				<button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
				
{{ Form::close() }}

@stop


@section('footer-script')

<script src="{{ asset('assets/js/uploadImagePostLink.js') }}"></script>
@stop


