$(document).ready(function() {

$('.acc_trigger').click(function(){
	if( $(this).next().is(':hidden') ) { //If immediate next container is closed...
		$('.acc_trigger').removeClass('active').next().slideUp(); //Remove all .acc_trigger classes and slide up the immediate next container
		$(this).toggleClass('active').next().slideDown(); //Add .acc_trigger class to clicked trigger and slide down the immediate next container
	}
	
	$('.ym-hlist').mouseleave(function(){
	   $('.drop_down_menu').slideUp();
	   $('.acc_trigger').removeClass('active');
});
	
	return false
});

////////////
$('.input-text').click(function(e){
	$('#locmenu').slideDown('fast');
	e.stopPropagation(); 
	return false
})

$(document).click(function() {
	$('#locmenu').slideUp('fast');
	return false
});

});


////////////////////////

