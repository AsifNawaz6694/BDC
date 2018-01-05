  $('body').on('change', '.action_list', function(){

        var type = $(this).data('type');
        var action = $(this).val();
        var id = $(this).data('id');
        var method = 'get';

        console.log(type);
        
        // 1 = EDIT
        // 2 = DELETE
        // 3 = ADD
        // 4 = DEACTIVATE

        var redirect_to = url;

        switch(type){

            case 'user':
            
                if(action == 1){

                    redirect_to += "/users/"+id+"/edit";

                }else if(action == 2){

                    redirect_to += "/users/"+id;
                    method = 'delete';

                }


            break;
            
            case 'limit':

                if(action == 1){

                    redirect_to += "/planlimit/"+id+"/edit";

                }else if(action == 2){

                    redirect_to += "/planlimit/"+id;
                    method = 'delete';

                }
            

            break;
        }

        Remove(redirect_to, method);

    });

});
function Remove(url, method){

    var form = _RemoveForm();
    $("body").append(form);

    form = $("#_RemoveForm");

    form.attr('action', url);

    if(method == 'delete'){
        form.attr('method', 'post');
        form.append('<input name="_method" type="hidden" value="DELETE">');
    }
    
    form.submit();

}

function _RemoveForm(url){
    var delete_form = '{{ Form::open(array("method" => "GET", "id" => "_RemoveForm")) }} {{ Form::close() }}';
    return delete_form;
}
