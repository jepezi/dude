@extends('admin.layouts.master')

@section('title')
@parent
- Genre
@stop


@section('content')
@include('admin.includes.noti')
@include('admin.includes.menu')
<h1>Create Genre</h1>
{{ Form::open(['route' => 'admin.genre.store', 'files' => true]) }}
				<div class="form-group">
					<label for="genre-name">Name</label>
                    <input type="text" class="form-control" name="name" id="genre-name" placeholder="Name">
                	</div>

                <div class="form-group">
                    <span class="btn btn-default fileinput-button">
                        <i class="glyphicon glyphicon-plus"></i>
                        <span>Choose Image</span>
                        <!-- The file input field used as target for the file upload widget -->
                        <input id="fileupload" type="file" name="files[]" multiple>
                    </span>
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

                <div class="radio">
                    <label>
                        <input type="radio" name="status" id="statusOn" value="1" checked>
                        Activate Now
                        </label>
                    </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="status" id="statusOff" value="0">
                        Later
                        </label>
                    </div>

                <input type="hidden" name="icon" id="icon" value="">

				<button type="submit" class="btn btn-primary btn-block btn-lg">Add this Genre</button>
				
{{ Form::close() }}

@stop

@section('footer-script')
  <script src="{{ asset('assets/js/uploadGenreIcon.js') }}"></script>
@stop