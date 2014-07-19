@extends('admin.layouts.master')

@section('title')
@parent
- Admin
@stop


@section('content')
@include('admin.includes.noti')
<h1>Create Post Link</h1>
<h2>{{ $p_title }}</h2>
{{ Form::open(['route' => 'admin.post.storeLink']) }}
				<div class="form-group">
					<label for="dude-title">Title</label>
                    <input type="text" class="form-control" name="title" id="dude-title" placeholder="Title" value="{{{ Input::old('title') }}}">
                	</div>

                <div class="form-group">
                    <label for="dude-slug">Slug</label>
                    <input type="text" class="form-control" name="slug" id="dude-slug" placeholder="Slug in English" value="{{{ Input::old('slug') ? Input::old('slug') : $slug }}}">
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
                    <input type="text" class="form-control" name="url" id="dude-url" value="{{ $url }}">
                    </div>

                <div class="form-group">
					<label for="dude-p-title">Link Title</label>
                    <input type="text" class="form-control" name="p_title" id="dude-p-title" value="{{{ $p_title }}}">
                	</div>

                <div class="form-group">
                    <label for="dude-p-description">Link Description</label>
                    <textarea class="form-control" name="p_description" id="dude-p-description" rows="3">{{{ $p_description }}}</textarea>
                    </div>
                
                
                <div class="form-group">
                    <ul>

                        @foreach ($imgarray as $img)
                        <li>
                            <div class="preview_image_bookmark"><img src="{{ $img }}" alt="" class="li_image">{{ $img }}</div>
                            <div class="form-group">
                                <!-- <span class="btn btn-default fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>Upload</span>
                                    <input id="fileupload" type="file" name="files[]" multiple>
                                </span> -->
                                <button type="button" class="btn btn-default" id="uploadPreviewImage">Upload</button>
                                <br>
                                <img src="" alt="" id="preview_upload">
                                </div>
                            </li>
                        @endforeach

                        </ul>
                    </div>
                

                <input type="hidden" name="p_images" id="p_images" value="">
					
				<button type="submit" class="btn btn-primary btn-block btn-lg">Add this List</button>
				
{{ Form::close() }}

@stop


@section('footer-script')
<script type="text/javascript">
// auto check type:video for video link
$(document).ready(function() {
   
   // auto-check the post type according to url
   var url = $('#dude-url').val();
   if(url.indexOf('youtube.com') > -1 || url.indexOf('youtu.be') > -1 || url.indexOf('vimeo') > -1)
   {
        $('#postTypeVideo').attr('checked',true);
   }
   if(url.indexOf('pantip.com') > -1)
   {
        $('#postTypePantip').attr('checked',true);
   }

});
</script>
<script src="{{ asset('assets/js/uploadImageFromBookmark.js') }}"></script>
@stop


