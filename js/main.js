$('.day').click(function () {
	var _date = $(this).data('id');
    $(this).css('background-color','pink');
	$('span').html(_date);
	$('#myModal').modal('show');
    $('.evente').css('display','none');
    
});

$('.dob').click(function () {
	var name = $('#event_name').val();
	var disc = $('#discription').val();
	var to = $('#town').val();
	var date = $('span').html();
	$('#myModal').modal('hide');

	$.post(
		"/index.php", {
			Название : name,
			Описание: disc,
			Город: to,
			Дата: date
		},
		onAjaxSuccess
	);

	function onAjaxSuccess(data) {
		$('.evente').html(data);
        $('.evente').css('display','block');
        $('h2').css('display','block');
        $('.next').click(function(){
            $(this).slideUp();
        });
	}

	var name = $('#event_name').val('');
	var disc = $('#discription').val('');
	var to = $('#town').val('');

});

$('.next').click(function(){
    $(this).slideUp();
});