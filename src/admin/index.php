<?php
    session_start();
    if(isset($_SESSION["dangnhap"]) && $_SESSION["dangnhap"] == true && isset($_SESSION["user"]) && $_SESSION["user"][0]["vaitro_kh"] == 2){
        
        // import
        require_once __DIR__ . "./../model/pdo.php";
        // check_connect_db();

        function danhmuc(){

            echo "
                <style>
                    #m2{
                        color:red;
                    }
                </style>
            ";

            require_once __DIR__ . "./../model/danhmuc.php";
    
            if(isset($_GET["a"]) && !empty($_GET["a"])){
                switch($_GET["a"]){
                    case "list":
                        $dm = list_dm("");
                        require_once __DIR__ . "./view/danhmuc/list.php";
                        break;
                    case "delete":
                        delete_dm($_GET["id_dm"]);
                        header("Location: index.php?act=dm&a=list");
                        break;
                    case "update":
                        $dm = list_dm($_GET["id_dm"]);
                        require_once __DIR__ . "./view/danhmuc/update.php";
                        break;
                    case "deletesl":
                        // var_dump(str_replace(","," ",$_GET["array"]));
                        // var_dump(explode(" ",str_replace(","," ",$_GET["array"])));
                        $array = explode(",",$_GET["array"]);
                        // var_dump($array);
                        delete_dm_select($array);
                        header("Location: index.php?act=dm&a=list");
                        break;
                }
            }else{
                require_once __DIR__ . "./view/danhmuc/add.php";
            }
        }

        function hanghoa(){ 

            echo "
                <style>
                    #m3{
                        color:red;
                    }
                </style>
            ";

            require_once __DIR__ . "./../model/hanghoa.php";
    
            if(isset($_GET["a"]) && !empty($_GET["a"])){
                switch($_GET["a"]){
                    case "list":
                        $dm = list_dm("");
                        $hh = list_hh_filter($key??"",$id_dm??"");
                        require_once __DIR__ . "./view/hanghoa/list.php";
                        break;
                    case "delete":
                        delete_hh($_GET["id_hh"]);
                        header("Location: index.php?act=hh&a=list");
                        break;
                    case "deletesl":
                        $array = explode(",",$_GET["array"]);
                        // var_dump($array);
                        delete_hh_select($array);                      
                        header("Location: index.php?act=hh&a=list");
                        break;
                    case "update":
                        $dm = list_dm("");
                        $hh = list_hh($_GET["id_hh"]);
                        require_once __DIR__ . "./view/hanghoa/update.php";
                        break;
                }
            }else{
                $dm = list_dm("");
                require_once __DIR__ . "./view/hanghoa/add.php";
            }
        }

        function khachhang(){
            echo "
                <style>
                    #m4{
                        color:red;
                    }
                </style>
            ";

            require_once __DIR__ . "./../model/khachhang.php";

            if(isset($_GET["a"]) && !empty($_GET["a"])){
                switch($_GET["a"]){
                    case "list":
                        $kh = list_kh("");
                        require_once __DIR__ . "./view/khachhang/list.php";
                        break;
                    case "delete":
                        $message = delete_kh($_GET["id_kh"]);
                        if(empty($message)){
                            header("Location: index.php?act=kh&a=list");
                        }else{
                            echo $message;
                        }
                        break;
                    case "deletesl":
                        $array = explode(",",$_GET["array"]);
                        $message = delete_kh_select($array);
                        if(empty($message)){
                            header("Location: index.php?act=kh&a=list");
                        }else{
                            echo $message;
                        }
                        break;
                    case "update":
                        $kh = list_kh($_GET["id_kh"]);
                        require_once __DIR__ . "./view/khachhang/update.php";
                        break;
                }

            }else{
                require_once __DIR__ . "./view/khachhang/add.php";
            }
        }

        function binhluan(){
            echo "
                <style>
                    #m5{
                        color:red;
                    }
                </style>
            ";
            
            require_once __DIR__ . "./../model/binhluan.php";
        

            if(isset($_GET["a"]) &&  !empty($_GET["a"])){
                switch($_GET["a"]){
                    case "blhh":
                        $blhh = list_bl_hh($_GET["id_dm"]);
                        // var_dump($blhh);
                        require_once __DIR__ . "./view/binhluan/blhh.php";
                        break;
                    case "delete":
                        delete_bl($_GET["id_bl"]);
                        header("Location: index.php?act=bl&a=blhh&id_dm={$_GET['id_dm']}");
                        break;
                    case "deletesl":
                        $array = explode(",",$_GET["array"]);
                        delete_bl_select($array);
                        header("Location: index.php?act=bl&a=blhh&id_dm={$_GET['id_dm']}");
                        break;
                }
            }else{
                $bldm = list_bl_dm();
                // var_dump($bldm);
                require_once __DIR__ . "./view/binhluan/bldm.php";
            }
        }

        function thongke(){
            echo "
                    <style>
                        #m6{
                            color:red;
                        }
                    </style>
                ";

            require_once __DIR__ . "./../model/hanghoa.php";
            $tk = thongke_hh_dm();

            if(isset($_GET["a"]) && $_GET["a"] == "bd"){
                require_once __DIR__ . "./view/thongke/bieudo.php";
            }else{
                require_once __DIR__ . "./view/thongke/thongke.php";
            }
        }

        require_once __DIR__ . "./view/header.php";
        if(isset($_GET["act"]) && !empty($_GET["act"])){
            switch($_GET["act"]){
                case "dm":
                    danhmuc();
                    break;
                case "hh":
                    hanghoa();
                    break;
                case "kh":;
                    khachhang();
                    break;
                case "bl":
                    binhluan();
                    break;
                case "tk";
                    thongke();
                    break;
            }
        }else{
            require_once __DIR__ . "./view/trangchu/main.php";
        }
        require_once __DIR__ . "./view/footer.php";
    }else{
        echo "ĐĂNG NHẬP VỚI TƯ CÁCH ADMIN";
    }
?>