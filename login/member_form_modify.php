<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>회원정보수정</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../member/css/member_form.css">
	
	
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>

	<script>
	 $(document).ready(function() {
		 
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 


});
	
	
	
	</script>
	<script>
    function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>

</head>
<?
    //$userid='aaa';
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>

<body>
	 <script>
   window.onload=function(){

        var num = '<?=$_GET['num']?>';

        var nav1= document.getElementById('nav1'); 

        var nav2= document.getElementById('nav2');

        var nav3= document.getElementById('nav3');


          if(num==1){

              nav1.className='current';

          }else if(num==2){

              nav2.className='current';

          }else if(num==3){

              nav3.className='current';

          }
}
    </script>
    <div id="skipNav">
 <a href="#content">본문 바로가기</a>
 <a href="#gnb">글로벌 네비게이션 바로가기</a>
 
</div>



<div id="wrap">
  
  
  
   <header id="headerArea">
       <div class="header_inner">
        <div class="top">
            <h1 class="logo"><a href="../index.html">삼육식품로고</a></h1>
            <div class="top_menu">
               <ul>
                   
                   <li><a href="../index.html">home</a></li>
                   
 <? 
                 if(!$userid)//세션변수가 생성되어 있지 않으면
                 {
          ?>                  
                   
                   
                    <li><a href="../login/login_form.php">로그인</a></li>
                    <li><a href="../member/join.html">회원가입</a></li>
                    
             <?
               }
                   else
                   {    
                   ?>   
                    <li><?=$usernick?></li>
                      <li><a href="../login/logout.php">로그아웃</a></li>
                    <li><a href="../login/member_form_modify.php">회원정보수정</a></li>
                    <?
                        }
                    ?>
                </ul>
                
                
                
            </div>
            
        </div>
        <nav id="gnb">
           <h2 class="hidden">글로벌네비게이션영역</h2>
            
            <ul class="dropdownmenu">
              	<li class="m1 menu">
                	<h3><a class="depth1" href="../sub1/sub1_1.html">기업정보</a></h3>
                    <ul>
                        <li><a href="../sub1/sub1_1.html">CEO인사말</a></li>
                        <li><a href="../sub1/sub1_2.html">삼육히스토리</a></li>
                        <li><a href="../sub1/sub1_3.html">삼육의철학</a></li>
                        <li><a href="../sub1/sub1_4.html">사회공헌</a></li>
                        <li><a href="../sub1/sub1_5.html">오시는길</a></li>
                    </ul>
                </li>
                <li class="m2 menu">
                	<h3><a class="depth1" href="../sub2/sub2_1.html">제품소개</a></h3>
                	<ul>
                    	<li><a href="../sub2/sub2_1.html">일반두유</a></li>
                        <li><a href="../sub2/sub2_2.html">아몬드두유</a></li>
                        <li><a href="../sub2/sub2_3.html">특수용도식</a></li>
                        <li><a href="../sub2/sub2_4.html">기능성두유</a></li>
                        <li><a href="../sub2/sub2_5.html">블랙두유</a></li>
                    </ul>
                </li>
                <li class="m3 menu">
                	<h3><a class="depth1" href="../sub3/sub3_1.html">기업광고</a></h3>
                	<ul>
                    	<li><a href="../sub3/sub3_1.html">홍보영상</a></li>
                        <li><a href="../sub3/sub3_2.html">TV광고</a></li>
                        <li><a href="../sub3/sub3_3.html">지면광고</a></li>
                        
                    </ul>
                </li>
                <li class="m4 menu">
                	<h3><a class="depth1" href="../sub4/sub4_1.html">연구개발</a></h3>
                	<ul>
                    	<li><a href="../sub4/sub4_1.html">연구분야</a></li>
                        <li><a href="../sub4/sub4_2.html">생산설비현황</a></li>
                        <li><a href="../sub4/sub4_3.html">품질관리시스템</a></li>
                        <li><a href="../sub4/sub4_4.html">개발제품현황</a></li>
                        <li><a href="../sub4/sub4_5.html">유통조직현황</a></li>
                    </ul>
                </li>
                <li class="m5 menu">
                	<h3><a class="depth1" href="../sub5/sub5_1.html">식품정보</a></h3>
                	<ul>
                    	<li><a href="../sub5/sub5_1.html">푸드이야기</a></li>
                        <li><a href="../sub5/sub5_2.html">레시피제공</a></li>
                        <li><a href="../sub5/sub5_3.html">건강이야기</a></li>
                        
                    </ul>
                </li>
                <li class="m6 menu">
                	<h3><a class="depth1" href="../sub6/sub6_1.html">고객센터</a></h3>
                	<ul>
                    	<li><a href="../sub6/sub6_1.html">FAQ</a></li>
                        <li><a href="../concert/list.php">NEWS</a></li>
                        <li><a href="../greet/list.php">공지사항</a></li>
                    </ul>
               	</li>
              </ul>
            
        </nav>
        </div>
    </header>
    
   


	 
	<article id="content">  
	  
	  <h2>회원정보수정</h2>
	  
	  <form  name="member_form" method="post" action="modify.php"> 
		
    <ul>
        <li>
            <label for="id">아이디</label>
            <?= $row[id] ?>
        </li>
        <li>
            <label for="pass">비밀번호</label>
             <input type="password" name="pass" value="">
             
        </li>
        <li>
            <label for="pass_confirm">비밀번호확인</label>
            <input type="password" name="pass_confirm" value="">
            
        </li>
        <li>
            <label for="name">이름</label>
            <input type="text" name="name" value="<?= $row[name] ?>">
        </li>
        <li>
            <label for="nick">닉네임</label>
            <div id="nick1"><input type="text" name="nick" value="<?= $row[nick] ?>"></div><div id="nick2" ><a href="#"></a></div>
			     <span id="loadtext2"></span>
        </li>
        <li>
            <input type="text" class="hp" name="hp1" value="<?= $hp1 ?>"> 
             - <input type="text" class="hp" name="hp2" value="<?= $hp2 ?>"> - <input type="text" class="hp" name="hp3" value="<?= $hp3 ?>">
        <li>
           <input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @ <input type="text" name="email2" 
			           value="<?= $email2 ?>">
        </li>
        <li>
            
        </li>
    </ul>
    
    
    <div class="button">
    <a href="#" class="join_btn" onclick="check_input()">수정완료</a>&nbsp;&nbsp;
				 <a href="#" class="reset_btn" onclick="reset_form()">다시쓰기</a>
    
    </div>
    
    
     

	 </form>
	  
	</article>

  <a class="topMove" href="javascript:void(0);">
            <span>
            <i class="fas fa-caret-up"></i>top
         </span></a>
     <footer id="footerArea">
       <div class="footer_inner">
        <div class="footer_top">
            <ul>
                <li><a href="#">회사소개</a></li>
                <li><a href="#">서비스 이용약관</a></li>
                <li><a href="#">개인정보 처리방침</a></li>
                <li><a href="#">전자공고</a></li>
                <li><a href="#">사이트맵</a></li>
            </ul>
        </div>
        <div class="footer_mid">
        <div class="footer_mark"><ul>
            <li class="hccp"><a href="#"><img src="../common/images/hccp_03.png" alt=""></a></li>
            <li class="kfq"><a href="#"><img src="../common/images/kfq_03.png" alt=""></a></li>
            
        </ul>
        <div class="family_site">
                <a class="arrow" href="#none">Family site ▼</a>
	            <ul class="a_list">
        <li><a href="http://www.abc3636.com/" target="_blank" title="삼육유기농자연식품이 새창에 열림">삼육유기농자연식품</a></li>
        <li><a href="https://www.syu.ac.kr/web/kor/home" target="_blank" title="삼육대학교가 새창에 열림">삼육대학교</a></li>
        <li><a href="/http://www.shu.ac.kr/shu_intro.asp" target="_blank" title="삼육보건대학이 새창에 열림">삼육보건대학</a></li>
            <li><a href="http://www.sijosa.com/" target="_blank" title="시조사가 새창에 열림">시조사</a></li></ul>

</div>
        </div>
        
        </div>
        <div class="footer_bottom">
            <div class="address"><p>대표: 박신국 사업자 등록번호: 312-82-01247</p><address><p>충청남도 천안시 서북구 직산읍 성진로 354-12 삼육식품<br>
Samyook Foods: Seongjin-Ro 354-13, Jiksan-Eup, Seobuk-Ku, Chunan-City, Choongchungnam-Do, Korea</p></address>
<p>대표전화: 041-575-3636<br>

고객상담실: 080-580-3636<br>

COPYRIGHT(C) 2007 SAHMYOOK FOODS. ALL RIGHTS RESERVED.</p></div>
            <div class="sns"><ul>
                <li>
                    <a href=""><i class="fab fa-facebook-square"></i></a>
                </li>
                <li>
                   <a href=""> <i class="fab fa-twitter-square"></i></a>
                    </li>
                <li>
                    <a href=""><i class="fab fa-youtube-square"></i></a>
                    </li>
            </ul></div>
            </div>
        </div>
    </footer>
   
    </div>
   
 
 <script src="../common/js/jquery-1.12.4.min.js"></script>
<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
<script src="../common/js/gnb.js"></script>
<script src="../common/js/slide_move.js"></script>
<script src="../common/js/familysite.js"></script>
 
 
 

</body>
</html>


