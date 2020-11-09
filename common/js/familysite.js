
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
       });//find는 자식임. 마지막 리스트에서 닫히도록..오버플로우 뺐을시 라인이 무너지면 높이값주는걸로해결
       $('.family_site .a_list li:last').find('a').bind('blur', function () {        
              $('.family_site .a_list').hide();
       });  
});