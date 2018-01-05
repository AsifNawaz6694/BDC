function deleteFor(ent, id){


	if( confirm('Deleteing this item will also delete all products & shop associated with it. Do you want to continue?') ){

		$.ajax({
		    headers: {'X-CSRF-TOKEN': csrf_token},
		    url:  url + '/' + ent +'/' + id ,
		    type: "DELETE",
		});

	}

	location.reload();

	return false;

}

