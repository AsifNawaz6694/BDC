function MarkNotificationAsRead(){
	url = $('#markasread a').attr('href');
	window.location.href = url;	
}
$('.singleRead').click(function(){
	$(this).parent('form').trigger('submit');
})