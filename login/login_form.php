<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>로그인</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link href="css/login.css" rel="stylesheet">  
    <script src="https://kit.fontawesome.com/b05901adb6.js" crossorigin="anonymous"></script> 
</head>
<body>
  <div id="wrap">
  <div id="bg"><img src="images/login_bg.jpg" alt=""></div>
	      
        <form  name="member_form" method="post" action="login.php"> 
		       <div id="login_form">
		          <div class="login_box" >  
        <a href="../index.html" class="close" onclick="cancle()"><i class="fas fa-times"></i></a>
                  <ul id="login2">
		              <li>
		                  <p>LOGIN</p>
                      </li>
		              <li>
                          <label for="id" class="hidden">아이디</label>
                          <input type="text" id="id" name="id" class="login_input" placeholder="아이디" maxlength="10">
		                  
		              </li>
		              <li>
                          <label for="pass" class="hidden">비밀번호</label>
                          <input type="password" id="pass" name="pass" class="login_input" placeholder="비밀번호">
		                  
		              </li>
		              <li id="login_button">
		                  <input type="submit" value="LOGIN">
		              </li>
		              <li>
		                  <a href="../member/join.html"><span>JOIN</span></a>
		              </li>
		          </ul>
		          
		      </div>
					
		
            </form>
            
           
      </div>        
        </div>

  <!-- end of content -->    
    
</body>
</html>