 $(document).ready(function () {


     $(".open").click(function () { //硫붾돱踰꾪듉 �대┃��

         var documentHeight = $(document).height();
         //�ㅼ젣 �섏씠吏��� �믪씠 = $(document).height();
         $(".box").css('height', documentHeight);
         $("#gnb").css('height', documentHeight);
         //諛섑닾紐낅컯�ㅼ� �ㅻ퉬�� �믪씠瑜� �ㅼ젣 �섏씠吏��� �믪씠濡� 諛붽씀�대씪   
       
         $("#gnb").animate({
             right: 0,
             opacity: 1
         }, 'slow');
         $(".box").show();
     });

     $(".box,.close").click(function () { 
         $("#gnb").animate({
             right: '-100%',
             opacity: 0
         }, 'fast');
       
         $(".box").hide();
         
         $('#gnb .depth1 ul').slideUp('fast');
         
         $('#gnb .depth1 h3>a i').removeClass('fa-chevron-down').addClass('fa-chevron-right');
              $('#gnb .depth1 h3').removeClass('on');
     });

     //2depth 硫붾돱 援먮�濡� �닿린 泥섎━ 
     $('#gnb .depth1 h3>a').click(function () {
         //$('#gnb .depth1 ul').hide(); // 紐⑤뱺 �щ럞�� �� �レ븘
         //$('#gnb .depth1 i').removeClass('fa-chevron-down').addClass('fa-chevron-right')
         $(this).parent().next('ul').slideToggle('fast'); //�대┃�� �щ럞�ㅻ쭔 �댁뼱��
         if ($(this).find('i').hasClass('fa-chevron-right')) {
             $(this).find('i').removeClass('fa-chevron-right').addClass('fa-chevron-down');
             $(this).parent().addClass('on');
         } else if ($(this).find('i').hasClass('fa-chevron-down')) {
             $(this).find('i').removeClass('fa-chevron-down').addClass('fa-chevron-right');
             $(this).parent().removeClass('on');
         } else {}
         //$(this).find('i').removeClass('fa-chevron-right').addClass('fa-chevron-down')
         // $('#nav .depth1>a span').css();
     });

 });