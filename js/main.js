$(document).ready(function() {
	
	$('#form-film-add').on('submit',function(e){
		
		if ( $(this).find(".input[name='title']").val() == "" 
			|| $(this).find(".input[name='genre']").val() == "" 
			|| $(this).find(".input[name='year']").val() == "" ) {
			
			$('.notify--error').removeClass('d-none');
			setTimeout(function(){
				$('.notify--error').addClass('d-none');
			},1000)

			e.preventDefault();

		} else {
			$('.notify--success').removeClass('d-none');
			setTimeout(function(){
				$('.notify--success').addClass('d-none');
			},1000)
		}

	})

});