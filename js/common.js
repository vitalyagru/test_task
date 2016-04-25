$(document).ready(function() {
    
	$(".button_menu").click(function(){
		$("#menu-menu_theme").slideToggle();
  	})

}); 

$(window).load(function() { 
	$(".loader_inner").fadeOut(); 
	$(".loader").delay(400).fadeOut("slow"); 
});

