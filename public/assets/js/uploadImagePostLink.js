$(document).ready(function(){$.ajaxSetup({headers:{"X-CSRF-Token":$('meta[name="csrf-token"]').attr("content")}}),$("#fileupload").fileupload({url:"/ajax/uploadAndSaveImagePostLink",dataType:"json",done:function(e,a){$.each(a.result.files,function(e,a){$("#preview_upload").attr("src",a.name),$("input#p_images").val(a.name)})},fail:function(e,a){console.log(a.errorThrown+", "+a.textStatus)},stop:function(){$("#fileuploadprogress").fadeOut("fast")},start:function(){$("#fileuploadprogress").show(),$("#fileuploadprogress .progress-bar").css("width","0%")},progressall:function(e,a){var o=parseInt(a.loaded/a.total*100,10);$("#fileuploadprogress .progress-bar").css("width",o+"%")}}).prop("disabled",!$.support.fileInput).parent().addClass($.support.fileInput?void 0:"disabled")});