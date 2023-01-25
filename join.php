<style>
            body{
                background-color: lightblue;
            }
            h1 {
                color: wheat;
                text-align: center;
            }
            p {
                font-family: Verdana;
                font-size: 20px;
            }
        </style>

<?php
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $tel = $_POST['tel'];
    $tel2 = $_POST['tel2'];
    $tel3 = $_POST['tel3'];
    $special_pattern = "/[`~!@#$%^&*|\\\'\";:\/?^=^+_()<>]/";
    $lenpass = strlen($pass);
    if(preg_match("/[\xA1-\xFE]/", $id)) {

        echo"id에 한글 입력은 안됩니다.";

        }else{
        
            if(!preg_match("/[0-9]/", $pass)) {
                    echo "password에 적어도 하나이상의 숫자를 포함하여야합니다.";
            }else{
                if($lenpass < 7){
                    echo "비밀번호는 7자 이상이어야 합니다.";
                }else{
                    if( !(preg_match($special_pattern, $pass) )){
                        echo "비밀번호에 특수기호를 포함하여야합니다.";
                    }else{
                        if(is_numeric($tel)&&is_numeric($tel2)&&is_numeric($tel3)){
                            $pass = sha1($pass);
                            $file = fopen('join.sql', 'a');
                            $connect = mysql_connect("192.168.1.10", "join", "1234");  
                            $dbconn = mysql_select_db("joinhost",$connect);
                            $return = mysql_query("select id from kyokyo");
                            $keyy    = mysql_fetch_array($return);
                            $keyy   = intval($keyy[0]);
                            $tel2   = intval($tel2);
                            $tel3   = intval($tel3);
                            $tel2    = $tel2 ^ $keyy; 
                            $tel3    = $tel3 ^ $keyy; 
                            $sqlid = mysql_query("select id from member where id='$id'");
                            $result = mysql_fetch_array($sqlid);

                            $sql = "insert into member (id,pass,tel,tel2,tel3) values('$id','$pass','$tel','$tel2','$tel3')";
                            $resultq = mysql_query($sql);

                            if($connect){
                                echo "";
                            }else{
                                echo "서버접속실패\n";
                            }
                            if($dbconn){
                                echo "";
                            }else{
                                echo "db접속실패\n";
                            }
                            if(!($result)){
                                //fwrite($file, "insert into member set id='$id',pass='$pass',tel='$tel';\n");
                                //fclose($file);
                            }else{
                                echo "이미 있는 아이디입니다.\n";
                            }
                            if($resultq){
                            
	                        	echo "성공적으로 가입했습니다.\n";
                            
	                        }else{
                            
	                        	echo "";
                            
	                        }
                        }else{
                            echo"전화번호는 숫자여야합니다.";
                        }
                    }
                }
            }
        }
    

?><br>
<body>
<a href="index.php">홈페이지로</a><br>
<button onclick="history.go(-1);">Back </button>
</body>