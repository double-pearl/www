<? 
	session_start(); 
     @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

    //세션변수
    //view.php?num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
if ($is_html!="y")
{
   $item_content = str_replace("&lt;", "<", $item_content);
   $item_content = str_replace("&gt;", ">", $item_content);
}
	$new_hit = $item_hit + 1;

	$sql = "update greet set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link href="../common/css/common.css" rel="stylesheet">
<link rel="stylesheet" href="../sub6/common/sub6common.css">
<link rel="stylesheet" href="../sub6/css/content1.css">
<link href="css/greet.css" rel="stylesheet" >
<link rel="stylesheet" href="css/view.css">
<script>
    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
</head>

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
                        <li><a href="list.php">공지사항</a></li>
                    </ul>
               	</li>
              </ul>
            
        </nav>
        </div>
    </header>
    
   
<!-- 메인 비주얼영역 -->
    <div class="visual">

    </div>
<!-- 서브네비영역 -->
    <div class="subnav_box">
        <h3>고객센터</h3>
        <p>고객의 감사한 의견과 말씀에 귀기울이겠습니다.</p>
        
        <div class="subNav">
            <ul>
                <li><a id="nav1" href="../sub6/sub6_1.html">FAQ</a></li>
                <li><a id="nav2" href="../concert/list.php">NEWS</a></li>
                <li><a id="nav3" href="list.php">공지사항</a></li>
            </ul>
            
        </div>
    </div>
 
 <div id="content">
    <div class="title_area">
            <div class="lineMap">
                <span>home</span>&gt;<span>고객센터</span>&gt;<strong>공지사항</strong>
            </div>
            <h2>공지사항</h2>
            <p></p>
        </div>
   
        
 
	

	<div id="col2">
        
		<div id="title">
			
		</div>

		<div id="view_comment"> &nbsp;</div>

		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>  
			                      | <?= $item_date ?> </div>	
		</div>

		<div id="view_content">
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a href="list.php?page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userlevel==1 || $userid=="admin")
	{
?>
				<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
				<a href="javascript:del('delete.php?num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>
<? 
	if($userid )  //로인인이 되면 글쓰기
	{
?>
				<a href="write_form.php">글쓰기</a>
<?
	}
?>
		</div>

		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
