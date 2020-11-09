<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "event"; //해당 게시판의 테이블명
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <link href="../common/css/common.css" rel="stylesheet">
     <link rel="stylesheet" href="../sub6/common/sub6common.css">
    <link rel="stylesheet" href="../sub6/css/content1.css">
    <link href="css/concert.css" rel="stylesheet">
   
   <script src="https://kit.fontawesome.com/b05901adb6.js" crossorigin="anonymous"></script>     
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
</head>
<?
	include "../lib/dbconn.php";

    
   if (!$scale)
    $scale=10;			// 한 화면에 표시되는 글 수

    
    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
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
   
        
 
	<div id="col2">        
		<div id="title">
			
		</div>

		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다.  </div>
			<div id="list_search2">select</div>
			<div id="list_search3">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>별명</option>
                    <option value='name'>이름</option>
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="search.jpg"></div><a href=""></a>
		</div>
		</form>
		
		<select name="scale" onchange="location.href='list.php?scale='+this.value">
                    <option value=''>보기</option>
                    <option value='5'>5</option>
                    <option value='10'>10</option>
                    <option value='15'>15</option>
                    <option value='20'>20</option>
        </select>
		
		<div class="clear"></div>

		<div id="list_top_title">
			<ul>
				<li id="list_title1">번호</li>
				<li id="list_title2">제목</li>
				<li id="list_title3">글쓴이</li>
				<li id="list_title4">등록일</li>
				<li id="list_title5">조회</li>
			</ul>		
		</div>

		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
        
      if($row[file_copied_0]){ //첫번째 첨부 이미지가 있으면..
        $item_img = './data/'.$row[file_copied_0];  //./2020_10_12_10_41_29_0.jpg 쩜 슬러시는 넣어주면 좋다
      }else{ //첨부된 이미지가 없으면..
        $item_img = './data/default.jpg'  ;
      }
      
?>
			<div id="list_item">
				<div id="list_item1"><?= $number ?></div>
				<div id="list_item2"><a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
				
				<img src="<?=$item_img?>" alt="" width="50"
				 height="50"><!-- width height는 css에서 적용하기 -->
				
				<?= $item_subject ?></a></div>
				<div id="list_item3"><?= $item_nick ?></div>
				<div id="list_item4"><?= $item_date ?></div>
				<div id="list_item5"><?= $item_hit ?></div>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
            
          if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
          }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
           }
            
          
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
 <!-- end of wrap -->

    
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