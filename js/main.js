$(document).ready(function() {
	
	setTimeout(function(){
		$('.notify').fadeOut();
	},2500)

	$('#form-film-add').on('submit',function(e){
		currentForm = this;
		// e.preventDefault();
		
		if ( $(this).find(".input[name='title']").val() == "" 
			|| $(this).find(".input[name='genre']").val() == "" 
			|| $(this).find(".input[name='year']").val() == "" ) {

			$('.notify--error').fadeIn(400,function(){
				$(this).fadeOut(1000);
			});

			e.preventDefault();

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