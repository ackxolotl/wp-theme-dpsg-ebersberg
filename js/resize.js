$( document ).ready(function() {
	var changed = 0;
	
	if($( window ).width()>600) {
		set_image_sizes("900x500");
		changed = 1;
	}
	
	$( window ).resize(function() {
		if(changed==0 && $( window ).width()>560) {
			set_image_sizes("900x500");
			changed = 1;
		}
	});
});

function set_image_sizes(size) {
	var dvImages = $("article .entry-header img");
	$.each(dvImages, function(index){
		var exists = 1;
		var source = $(this).attr("src");
		var output = source.substr(0, source.lastIndexOf('-')+1)+size+source.substr(source.lastIndexOf('.')) || source;
		$.ajax({
			url: output,
			async: false,
			success: function(data){
				exists = 0;
			},
			error: function(data){
				exists = 1;
			}
		})
		if(exists==0) $(this).attr("src", output);
	});
}