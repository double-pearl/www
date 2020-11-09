   $(document).ready(function() {
   

    $('.dropdownmenu').hover(
        function() { 
            $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();});
            //모든 서브를 열어라..
            
	       $('#headerArea').animate({height:470},'fast').clearQueue(); //서브메뉴가 열렸을 때 헤더에 높이를 준다
                 },
        function() {
	    
	      $('ul.dropdownmenu li.menu ul').fadeOut('fast');
            //모든 서브를 닫아주세요
          $('#headerArea').animate({height:210},'fast').clearQueue();//서브가 닫혔을때 헤더의 높이
    });
               
           
       //tab키처리
         $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
                $('ul.dropdownmenu li.menu ul').slideDown('fast');
                $('#headerArea').animate({height:470},'fast').clearQueue();  
          });

         $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
                  $('ul.dropdownmenu li.menu ul').slideUp('fast');
                 $('#headerArea').animate({height:210},'fast').clearQueue();
         });
       
});














