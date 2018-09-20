$(document).ready(function() {
	
	setTimeout(function(){
		$('.notify').fadeOut();
	},1500)

	$('#form-film-add').on('submit',function(e){
		currentForm = this;
		// e.preventDefault();
		
		if ( $(this).find(".input[name='title']").val() == "" 
			|| $(this).find(".input[name='genre']").val() == "" 
			|| $(this).find(".input[name='year']").val() == "" ) {

			e.preventDefault();
			$('.notify--error').fadeIn(400,function(){
				$(this).fadeOut(2000);
			});

		} else {

			// $('.notify--success').fadeIn(400,function(){
			// 	$(this).delay(400).fadeOut(600);
			// });

			// setTimeout(function(){
			// 	currentForm.submit();
			// },2000)
		}

	})

});