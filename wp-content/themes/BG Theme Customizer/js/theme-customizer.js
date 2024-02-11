(function($){
	$(function(){
		console.log("hello");
		wp.customize('kdtheme_header_color', function(value){
			value.bind(function(to){
				$('#first').css('color',to);
			});
		});
		
	});
}(jQuery))

