$(document).ready(function(){
	
	$('body').on('change', '.action_list', function(){

		var type = $(this).data('type');
		var action = $(this).val();
		var id = $(this).data('id');
		var method = 'get';

		// 1 = EDIT
		// 2 = DELETE
		// 3 = ADD
		// 4 = DEACTIVATE

		var redirect_to = url;

		switch(type){

			case 'user':
			
				if(action == 'edit'){

					redirect_to += "/users/"+id+"/edit";

				}else if(action == 'delete'){

					redirect_to += "/users/"+id;
					method = 'delete';

				}


			break;
			
			case 'limit':

				if(action == 'edit'){

					redirect_to += "/planlimit/"+id+"/edit";

				}else if(action == 2){

					redirect_to += "/planlimit/"+id;
					method = 'delete';

				}
			

			break;
		}

		Action(this, redirect_to, method);


	});

});


function Action(obj, url, method){


	if(method == 'delete'){

		$("table").DataTable().row($(':selected',obj).closest('tr')).remove().draw();

	}else{


	}

}

