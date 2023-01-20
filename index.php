<!-- <!DOCTYPE html>
<html>
    <head>
        <title>
            파랑풍선ariplane
        </title>
        <style>
            body{
                background-color: rgb(255, 255, 255) ;
                background-size: 100%;
            }
            .font{
                text-align: center;
                align-items: center;
                font-weight: bold ;
                font-size: 15px;
            }
        </style>

    </head>
    <body>
        <img src="plane.png" style="width: 100px; height: 100px; position: relative; clear: both;">
        <div class="font">
            <pre>
                <a href="login.html">로그인</a>     <a href="pb.php">비행기 예약하기</a>     <a href="join.html">회원가입</a>
            </pre>
        </div>
        <img src="mang.png" style="width: 300px;height: 300px;" >
    </body>
</html> -->
<?php
    //클라이언트 요청 메시지에 'popup' 쿠키값이 없다면 if 명령 실행
    if($_COOKIE['popup'] == ""){
        // 서버에서 쿠키를 생성하는 명령
        // popup=1, 현재시간부터 일주일동안 사용가능한 쿠키를 발급하는 함수
        setcookie('popup', '1', time()+3600*24*7, '/', 'parang.com');//, true, false);
    }
?>
<!DOCTYPE html>
<html>
    <head>
            <title>parang</title>
            <style>
                body {
                    background-image: linear-gradient(to bottom, skyblue, white);
                    height : 700px;
                }
                .header{
                    position: absolute;
                    top: 5%;
                    right : 35%;
                    color: yellow;
                    font-size: 80px;
                    font-weight: bold ;
                    font-style: italic ;
                }
                .plane2{
                    position: absolute;
                    top: 0;
                    left: 0;
                }
                .mang2{
                    position: absolute;
                    bottom: 0;
                    right: 0;
                }
                .text{
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background-color: rgb(246,187,67);
                    padding: 0 40% 0 40%;
                    font-size: 15px;
                    font-weight: bold ;
                }
                .teamname{
                    position: absolute;
                    top: 60%;
                    right: 0;
                }
                .h1{
                    position: absolute;
                    top:0;
                    left:50%;
                }
            </style>         
    </head>

    <body>
    
    <?php
        //$_COOKIE['popup'] popup 이라는 이름의 cookie 값을 읽을 수 있는 변수
        // popup 쿠키의 값이 0 이랑 같지 않으면 아래 echo 명령들을 실해
        // echo 명령은 출력, 팝업을 실행하기 위한 코드를 출력
        //echo "alert(\"Warning!\")" 여기서 "안에 " 있으면 서로 
        //인식이 이상하게되므로 \를해주거나 또는 안에있는"를 '로써도 된다.
        if($_COOKIE['popup'] != '0'){
            echo "<script>";
            echo "alert(\"Warning!\")";
            echo "</script>";
        }

        session_start();
        if($_SESSION['loginID'] !=""){
            echo "<h1>".$_SESSION['loginID']."님환영합니다.</h1>";//.은 연결시켜주는 기호 파이썬의 + 같은기능인듯
        }
    ?>
    
        <div class="plane2">
            <img src="plane2.png" style="width:80% ; height: 70%;">
        </div>
        <div class="mang2">
            <img src="mang2.png"  style="width:400px; height:420px;">
        </div>
        <div class="header">
            <pre>blue balloon</pre>
        </div>
        <div class="text">
        <pre>
        <a href="cookie.php">1주일간 팝업 보지않기</a>     <a href="login.html">LogIn</a>     <a href="logout.php">Logout</a>       <a href="join.html">회원가입</a>        <a href="pb.html">회원탈퇴</a> 
        </pre></div>
    
        <div class="teamname">
            <img src="teamname.jpg" style="width:30% ; height: 30%;">
        </div>


       
    </body>
</html>