$(function(){
	$('.sort').click(function(){
		var cell = $(this).attr('id')
		$.getJSON('sort.php',{cell:cell},function(data){	
			if(!data.error){
				location.reload();
			}
		})	
	})
})