(function($){
	$(function(){
		console.log("hello");
		wp.customize('kdtheme_header_color', function(value){
			value.bind(function(to){
				$('h1, h2, h3, h4, h5, h6').css('color',to);
			});
		});
		
	});
}(jQuery))
