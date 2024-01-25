<?php
    // || isset($_COOKIE["ghinho"]) && $_COOKIE["ghinho"] == true
    if(isset($_SESSION["dangnhap"]) && $_SESSION["dangnhap"]==true){
        require_once __DIR__ . "./ddn.php";
    }else{
        require_once __DIR__ . "./cdn.php";
    }
?>