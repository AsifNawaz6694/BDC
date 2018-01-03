$(document).ready(function () {
    $('.dashboard_navigation ul li a').click(function () {
        $('ul li a').removeClass("actives");
        $(this).addClass("actives");
    });

    ///*===THis is avatar Box image change function ===*/
    $('.camera_image i').on('click', function () {
        $('#image_upload').trigger('click');
        var Img = $('#image_upload').val();
    });
    ///*===End Avatar Image Function ===*//

    var Window_Height_right = $('.right_dash').height();
    var Window_Height_left = $('.left_dash').height();

    if (Window_Height_right <= Window_Height_left) {
        $('.right_dash').css({'height': Window_Height_left + 'px', 'background-color': '#ffffff'});
    } else {
        $('.left_dash').css({'height': Window_Height_right + 'px', 'background-color': '#ffffff'});
    }

    //Responsive Jquery
    if ($(window).width() < 767) {
        var btn_menu = $('<button type="button" class="btn btn-primary btn_menu" id="mob_menu"><i class="fa fa-bars" aria-hidden="true"></i></button>');
        $('.dashboard_left_side').append(btn_menu);
        $('#mob_menu').on('click', function () {
            $('.dashboard_navigation ul').toggle('slow');
        });
        $('.left_dash').css({'height': 'auto', 'background-color': '#ffffff'});

        $('.navbar-form').addClass('clearfix');
    }


    //if image is select trigger submit form
    $('.camera_image').change(function(){
        if($('input#image_upload').val()){
            $(this).parent('form').trigger( "submit" );
        }
    });


    //on form submit change picture
    $('#change_profile').submit(function(e){
        e.preventDefault();

        console.log($(this).attr('action'));
        var form = new FormData(this);

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: form,
            processData: false,
            contentType: false,
            success: function(response){
                if(response.code === 200){
                    $('.avatar_box > img').attr('src', 'storage/'+response.img);
                    alertify.success(response.success);
                }
                if(response.code === 202){
                    alertify.error(response.error);
                }
            },
            error: function(){
                alertify.error('Image uploading failed');
            }
        });
    });

});