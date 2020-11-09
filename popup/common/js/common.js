// JavaScript Document

$(document).ready(function(){
  var cnt= $('.tabs h3 .tab').length ; //탭메뉴개수  ***
    
  $('.tabs .contlist:eq(0)').show(); //첫번째 내용만 보여라
  $('.tabs .tab1').addClass('on');
  
  $('.tabs .tab').each(function (index) {  // index=> 0 1 2
    $(this).click(function(){   //각각의 탭메뉴를 클릭하면 
	  $('.tabs .contlist').hide(); // 모든 탭내용을 안보이게 한다
	  $('.tabs .contlist:eq('+index+')').show();
	  for(var i=1;i<=cnt;i++){
           $('.tab'+i).removeClass('on');
      } //모든 탭메뉴 비활성화
      $(this).addClass('on'); 
   });
  });
});

//자잘한 스크립트들은 파일 하나에  모아서 js하나만 연결시켜라
$(document).ready(function() {
	$('.family_site .arrow').click(function(){
		$('.family_site .a_list').show();			  
	});
	$('.family_site .a_list').mouseleave(function(){
		$(this).hide();			  
	});
	//tab키 처리
	  $('.family_site .arrow').bind('focus', function () {        
              $('.family_site .a_list').show();	
       });//find는 자식임. 마지막 리스트에서 닫히도록..오버플로우 뺐을시 라인이 무너지면 높이갚주는걸로해결
       $('.family_site .a_list li:last').find('a').bind('blur', function () {        
              $('.family_site .a_list').hide();
       });  
});