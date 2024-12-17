<?php
    session_start();
    //pag waalang nakalogin, ibato sa index.php
    if(!isset($_SESSION['user_id'])){
        header("Location:index.php");
        exit();
    }
    //pag may nakalogin, delete session, ibato sa index.php
    else{
        $_SESSION = array();
        session_destroy();
        setcookie('PHPSESSID', '', time()-3600,'/', '', 0, 0);
        header("Location:index.php");
        exit();
    }
?>