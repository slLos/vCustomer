$('.togglePanel').change(function () {
	var checked = $(this).prop( "checked" );
	var target = $(this).attr("data-toggle");
	if(checked)
		$(target).addClass('blocoInvisivel');
	else
		$(target).removeClass('blocoInvisivel');
		
});