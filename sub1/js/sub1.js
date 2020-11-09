

$(document).ready(function(){
    
  var value=0;                
   
 $('.history_list li:eq(0)').find('a').addClass('spy');
    
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
        
        if(scroll>650){
            $('.history_list').addClass('navOn');
            $('header').hide();
        }else{
            $('.history_list').removeClass('navOn');
            $('header').show();
        }
        
        $('.history_list li').find('a').removeClass('spy');
        if(scroll>=950 && scroll<2800){
            $('.history_list li:eq(0)').find('a').addClass('spy');
            
        }else if(scroll>=2800 && scroll<4900){
            $('.history_list li:eq(1)').find('a').addClass('spy');
        }else if(scroll>4900){
            $('.history_list li:eq(2)').find('a').addClass('spy');
        }
    });
    
 
      $('.history_list li a').click(function(){
        
            if($(this).hasClass('link1')){
                     value= 950;   
            }else if($(this).hasClass('link2')){
                     value= 2963; 
            }else if($(this).hasClass('link3')){
                     value= 5100; 
            }
          $("html,body").stop().animate({"scrollTop":value},500);
        
        
    }); 
     
});
