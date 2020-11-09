$(document).ready(function(){
	
    //var h1=$('#content .introduce').offset().top-500;

$(window).on('scroll',function(){
    var scroll = $(window).scrollTop();
   console.log(scroll);
   
if(scroll>=600 && scroll<1900){
	$('#content .introduce').addClass('boxMove');
}else if(scroll>=1900){
    $('#content .information').addClass('boxMove');
}


});

});