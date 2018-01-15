
$(document).ready(function(){
	$('#all_users').DataTable(
	{    	 	
		"aoColumnDefs": [
		{
			'bSortable': true

		}
		]
	});
	$(".add-more").click(function(){ 
		var html = $(".copy-fields .add-questions > div").html();
		console.log(html);
		$(".add-questions").append(html);
	}); 
});

