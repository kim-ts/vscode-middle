<?php
     $id = $_POST['id'];
    
     $pass = $_POST['pass'];
     $pass = sha1($pass);
     $connectserver=mysql_connect("192.168.1.10", "join", "1234");  
     $connectdb=mysql_select_db("joinhost");  
 
     $sql = mysql_query("select * from member where id='$id' and pass='$pass'");
     $result = mysql_fetch_array($sql);

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
        $del = mysql_query("call del('$id')");
        
        echo "성공적으로 탈퇴하였습니다..";
        
    }
    else {
        echo "없는 아이디 혹은 비밀번호가 틀렸습니다.";
    }
?><br>
<body>
<a href="index.php">홈페이지로</a><br>
<button onclick="history.go(-1);">Back </button>
</body>