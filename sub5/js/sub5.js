 $(document).ready(function(){
  
          $('.eventSlideMenu ul li span').mouseenter(function(event){
             var $target=$(event.target);//$(this).
	  
	 if($target.is('.buttonMenu01')){//첫번재 버튼에 마우스가 올라가면
	       $('.eventSlideMenu .img02').animate({left:800},900,'easeOutQuad').clearQueue();
	       $('.eventSlideMenu .img03').animate({left:900},900,'easeOutQuad').clearQueue();
	      
	 }else if($target.is('.buttonMenu02')){
	       $('.eventSlideMenu .img02').animate({left:100},900,'easeOutQuad').clearQueue();
	       $('.eventSlideMenu .img03').animate({left:900},900,'easeOutQuad').clearQueue();
	   
	 }else if($target.is('.buttonMenu03')){
	       $('.eventSlideMenu .img02').animate({left:100},900,'easeOutQuad').clearQueue();
	       $('.eventSlideMenu .img03').animate({left:200},900,'easeOutQuad').clearQueue();
	     
	
	 }
          });
     
     
     
           $('.eventSlideMenu02 ul li span').mouseenter(function(event){
             var $target=$(event.target);//$(this).
	  
	 if($target.is('.buttonMenu01')){//첫번재 버튼에 마우스가 올라가면
	       $('.eventSlideMenu02 .img02').animate({left:800},900,'easeOutQuad').clearQueue();
	       $('.eventSlideMenu02 .img03').animate({left:900},900,'easeOutQuad').clearQueue();
	      
	 }else if($target.is('.buttonMenu02')){
	       $('.eventSlideMenu02 .img02').animate({left:100},900,'easeOutQuad').clearQueue();
	       $('.eventSlideMenu02 .img03').animate({left:900},900,'easeOutQuad').clearQueue();
	   
	 }else if($target.is('.buttonMenu03')){
	       $('.eventSlideMenu02 .img02').animate({left:100},900,'easeOutQuad').clearQueue();
	       $('.eventSlideMenu02 .img03').animate({left:200},900,'easeOutQuad').clearQueue();
	     
	
	 }
          });
     
     
     
     
     
     
     
       });
