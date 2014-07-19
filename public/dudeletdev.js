(function(){

	var v = "1.11.1";

	if (window.jQuery === undefined || window.jQuery.fn.jquery < v) {
		var done = false;
		var script = document.createElement("script");
		script.src = "http://ajax.googleapis.com/ajax/libs/jquery/" + v + "/jquery.min.js";
		script.onload = script.onreadystatechange = function(){
			if (!done && (!this.readyState || this.readyState == "loaded" || this.readyState == "complete")) {
				done = true;
				initDudelet();
			}
		};
		document.getElementsByTagName("head")[0].appendChild(script);
	} else {
		initDudelet();
	}
	
	function initDudelet() {
		(window.myDudelet = function($) {
			var p_title = $('meta[property="og:title"]').attr('content');
			if(!p_title){ p_title = window.document.title; }
			var p_url = $('meta[property="og:url"]').attr('content');
			if(!p_url){ p_url = location.href; }
			var p_description = $('meta[property="og:description"]').attr('content');
			if(!p_description) {
				p_description = $('meta[name="twitter:description"]').attr('content');
			}
			if(!p_description) {
				p_description = $('meta[name="description"]').attr('content');
			}
			if(!p_description) {
				p_description = $('meta[name="Description"]').attr('content');
			}
			var p_images = "";
			var meta_img = $('meta[property="og:image"]');
			if(meta_img.length > 1)
			{
				meta_img.each(function(index){
					p_images += $(this).attr('content');
					if(index!==(meta_img.length-1)) p_images += "|";
				});
			}else{
				p_images = meta_img.attr('content') || "";
			}
			if(!p_images){
				p_images = $('link[rel="image_src"]').attr('href');
			}
			// var p_images = $('meta[property="og:image"]').attr('content');
			location.href="http://dude.app:8000//admin/post/createLinkFromBookmarklet?url="+
								encodeURIComponent(p_url)+
								"&p_title="+encodeURIComponent(p_title)+
								"&p_description="+encodeURIComponent(p_description)+
								"&p_images="+encodeURIComponent(p_images);
		})(jQuery);
	}


})();