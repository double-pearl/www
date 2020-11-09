<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    
	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0]; //첨부파일의 실제이름
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];

//배열로 해줘야 편함... 
	$image_copied[0] = $row[file_copied_0]; //날짜,시간 으로 바뀐이름
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

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
	
	for ($i=0; $i<3; $i++) //0~2 첨부된 이미지 처리를 위한 반복문..for문
	{
		if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
            //GetImageSize(서버에 업로드된 파일 경로 파일명)
            // => 배열형태의 리턴값
              // => 파일의 $imageinfo[0](너비)와 높이값, 종류
			$image_width[$i] = $imageinfo[0];  //파일너비
			$image_height[$i] = $imageinfo[1]; //파일높이
			$image_type[$i]  = $imageinfo[2];  //파일종류

        if ($image_width[$i] > 785) //첨부된 이미지의 최대너비를 785지정
				$image_width[$i] = 785;
		}
		else //업로드된 이미지가 없으면
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link href="../common/css/common.css" rel="stylesheet">
<link rel="stylesheet" href="../sub6/common/sub6common.css">
<link rel="stylesheet" href="css/view.css">
<link href="css/concert.css" rel="stylesheet">
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
                        <li><a href="list.php">NEWS</a></li>
                        <li><a href="../greet/list.php">공지사항</a></li>
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
                <li><a class="current" id="nav2" href="list.php">NEWS</a></li>
                <li><a  id="nav3" href="../greet/list.php">공지사항</a></li>
            </ul>
            
        </div>
    </div>
 
 <div id="content">
    <div class="title_area">
            <div class="lineMap">
                <span>home</span>&gt;<span>고객센터</span>&gt;<strong>NEWS</strong>
            </div>
            <h2>NEWS</h2>
            <p></p>
        </div>
   
        

  <div id="header">
    <? include "../lib/top_login2.php"; ?>
  </div>  <!-- end of header -->

  <div id="menu">
	<? include "../lib/top_menu2.php"; ?>
  </div>  <!-- end of menu --> 

  <div id="content">
	<div id="col1">
		<div id="left_menu">
<?
			include "../lib/left_menu.php";
?>
		</div>
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
<?
	for ($i=0; $i<3; $i++)  //업로드된 이미지를 출력한다
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name; 
             // ./data/2019_03_22_10_07_15_0.jpg
			$img_width = $image_width[$i]; //785보다 크면 785가 되도록..css에서 안됨
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</div>

		<div id="view_button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==$item_id || $userid=="admin" || $userlevel==1 )
	{
?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>&nbsp;
<?
	}
?>
<? 
	if($userid)
	{
?>
				<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
		</div>

		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

   
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
