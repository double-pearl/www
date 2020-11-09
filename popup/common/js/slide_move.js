$(document).ready(function () {
        var th= $('#headerArea').height() +$('.visual').height();
            
              $('.topMove').hide();//이거없으면 display:none하고 시작해도됨
        
        //console.log(th);
        //console.log($('header').height());   
       // console.log($('.main').height());   
         $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다

 if(scroll>500){
                      $('.topMove').fadeIn('slow');
                  }else{
                      $('.topMove').fadeOut('fast');
                  }
              
              $('.topMove').click(function(){
                  //상단으로 스르륵 이동합니다.
                 $("html,body").stop().animate({"scrollTop":0},1000); 
              });//스크롤탑 0을 변경하면 클릭시 이동위치를 변경
             
       
     });
     });