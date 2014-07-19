$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$('#uploadPreviewImage').on( "click", function() {
        var $this = $(this);
        var file = $this.parents().parents().find('.preview_image_bookmark .li_image').attr('src');
        $.ajax({
            url: '/ajax/uploadAndSaveBookmarkImage',
            dataType: 'json',
            type: 'POST',
            data: {file: file}
        })
        .done(function (data) {
            $('#p_images').val(data.files);
            $this.text('Done');
        });
        
    });

});