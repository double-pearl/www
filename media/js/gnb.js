  var screenHeight = $(window).height();
    
    $('.ham_btn').toggle(function(){
       $('#gnb ul').slideDown('slow');
        $('.ham_btn').addClass('open');
        
    },function(){
       $('#gnb ul').slideUp('slow');
        $('.ham_btn').removeClass('open');
    });
    
        
    var current=0;
    
    $(window).resize(function(){
       var screenSize= $(window).width(); 
        
        if( screenSize > 768){
            $('#gnb ul').slideDown('slow');
            $('.ham_btn').removeClass('open');
             current=1;
        }
        if(current==1 && screenSize <= 768){
            $('#gnb ul').slideUp('slow');
            current=0;
        }
    });