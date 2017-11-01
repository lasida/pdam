
$( document ).ready(function(){

	$( ".nav-pills li" ).click(function() {
	  $(this).toggleClass("open");
	  console.log(this);
	});


})