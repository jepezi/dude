$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
	// add new wip
    $('#fileupload').fileupload({
        url: '/ajax/uploadAndSaveImagePostLink',
        dataType: 'json',
        done: function (e, data) {
            // window.location.replace("/wip/new/"+data.result.wipid);
            $.each(data.result.files, function (index, file) {
                // $('<p/>').text(file.name).appendTo('#files');
                // $('#profile-avatar-preview').attr('src', file.path + file.filename + '_m.' + file.ext);
                $('#preview_upload').attr('src', file.name);
                $('input#p_images').val(file.name);
            });
        },
        fail: function(e, data) {
            console.log(data.errorThrown+', '+data.textStatus);
        },
        stop: function (e) {
            $('#fileuploadprogress').fadeOut("fast");
        },
        start: function (e) {
            $('#fileuploadprogress').show();
            $('#fileuploadprogress .progress-bar').css(
                'width','0%'
            );
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#fileuploadprogress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');

});