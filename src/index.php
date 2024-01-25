<?php
    require_once __DIR__ . "./model/pdo.php";
    // require_once __DIR__ . "./model/acount.php";
    // check_connect_db();
    session_start();
    

    function trangchu(){
        require_once __DIR__ . "./model/hanghoa.php";

        echo "
            <style>
                #m1{
                    color:red;
                }
            </style>
        ";
        
        if(isset($_GET["a"]) && !empty($_GET["a"])){
            switch($_GET["a"]){
                case "hhct":
                    $dm = list_dm("");
                    $top = list_hh_ten();

                    $hh = list_hh($_GET["id_hh"]);
                    add_view_hh($_GET["id_hh"]);
                    $hhcl = list_hh_dm($_GET["id_hh"],$hh["id_dm"]);
                    require_once __DIR__ . "./user/view/trangchu/hhct.php";
                    break;
                case "hhdm":
                    $dm = list_dm("");
                    $top = list_hh_ten();
                    
                    $hh = list_hh_dm("",$_GET["id_dm"]);
                    $tendm = list_dm($_GET["id_dm"]);
                    require_once __DIR__ . "./user/view/trangchu/hhdm.php";
                    break;
                case "hhs":
                    $dm = list_dm("");
                    $top = list_hh_ten();

                    $hh = list_hh_filter($key??"","");
                    require_once __DIR__ . "./user/view/trangchu/hhs.php";
                    break;
            }
        }else{
            $dm = list_dm("");
            $top = list_hh_ten();

            $hh = list_hh_nine();
            require_once __DIR__ . "./model/acount.php";

            require_once __DIR__ . "./user/view/trangchu/main.php";
        }
    }

    function taikhoan(){
        require_once __DIR__ . "./model/khachhang.php";
        if(isset($_GET["a"]) && !empty($_GET["a"])){
            switch($_GET["a"]){
                case "update":
                    $kh = list_kh($_GET["id_kh"]);
                    require_once __DIR__ . "./user/view/taikhoan/update.php";
                    break;
                case "qmk":
                    require_once __DIR__ . "./model/acount.php";
                    require_once __DIR__ . "./user/view/taikhoan/quenmk.php";
                    break;
                case "logout":
                    session_destroy();
                    // setcookie("ghinho", "", time() - 86400, "/");
                    header("Location: index.php");
                    break;
            }
        }else{
            require_once __DIR__ .  "./user/view/taikhoan/add.php";
        }
    }

    require_once __DIR__ . "./user/view/header.php";

    if(isset($_GET["act"]) && !empty($_GET["act"])){
        switch($_GET["act"]){
            case "tk":
                taikhoan();
                break;
        }
    }else{
        trangchu();
    }

    require_once __DIR__ . "./user/view/footer.php";
?>