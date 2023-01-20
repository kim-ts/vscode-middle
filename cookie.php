<?php
    setcookie('popup', '0', time()+3600*24*7, '/', 'parang.com');
    header('Location: /index.php');
?>