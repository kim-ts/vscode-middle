<?php
    $id = $_POST['id'];
    
    $pass = $_POST['pass'];
    $pass = sha1($pass);
    $connectserver=mysql_connect("192.168.1.10", "join", "1234");  //접속할 정보
    $connectdb=mysql_select_db("joinhost");  // 사용할 데이터베이스 use ~~~ 에해당

    $sql = "select * from member where id='$id' and pass='$pass'"; 
    $result = mysql_fetch_array(mysql_query($sql));//데이터베이스에 있는 정보와 일치하는지 (일치,불일치)를 이 result이라는 변수에 저장한다는뜻

    if($connectserver){
        echo "";
    }else{
        echo "서버접속실패\n";
    }
    if($connectdb){
        echo "";
    }else{
        echo "db접속실패\n";
    }
    if($result){
        echo "$id 님 환영합니다.";
        session_start();
        $_SESSION['loginID'] = $id;
    }
    else {
        echo "없는 아이디 혹은 비밀번호가 틀렸습니다.";
    }


    
    //session_start();
    ////session_start를 실행한 시점부터 $_SESSION['이름'] 세션 변수에 값을 지정
    //// 세션 변수는 session id를 통해 구분됨
    //// 사용자 별로 독립된 공간에 저장 변수
    //$_SESSION['loginID'] = $_POST['id'];
?><br>
<body>
<a href="index.php">홈페이지로</a><br>
<button onclick="history.go(-1);">Back </button>
</body>