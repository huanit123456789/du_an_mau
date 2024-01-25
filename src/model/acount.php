<?php
    // lien quan den cac tai khoan khach hang khi chua dang nhap

    function check_acount($tk,$mk){
        $sql = "SELECT * FROM khachhang WHERE email_kh = '" . $tk . "'";

        if($mk != ""){
            $sql .= " AND mk_kh = '" . $mk . "'";
        }

        // qr_one se bao loi [0]
        return pdo_qr($sql);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["dn"]) && !empty($_POST["dn"])){
            $check = true;

            if(empty($_POST["tk"])){
                $tkErr = "<span class='err'> * Tk không được bỏ trống</span>";
                $check = false;
            }

            if(empty($_POST["mk"])){
                $mkErr = "<span class='err'> * Mk không được bỏ trống</span>";
                $check = false;
            }

            if($check){
                $user = check_acount($_POST["tk"],$_POST["mk"]);
                if(empty($user)){
                    $message = '<div class="row message">
                                    <h2>Đăng nhập không thành công</h2>
                                </div>';
                }else{

                    // if(isset($_POST["cookies"]) && !empty($_POST["cookies"])){
                    //     setcookie("ghinho",true, time() + 86400, "/");
                    // }

                    unset($_POST["tk"],$_POST["mk"]);
                    $_SESSION["dangnhap"] = true;
                    $_SESSION["user"] = $user;
                    // var_dump($_SESSION["user"]);
                }
            }
        }

        if(isset($_POST["qmk"]) && !empty($_POST["qmk"])){
            $check = true;
            
            if(empty($_POST["email_kh"])){
                $email_khErr =  "<span class='err'> * Email không được bỏ trống</span>";
                $check = false;
            }
            
            if(filter_var($_POST["email_kh"],FILTER_VALIDATE_EMAIL) === false){
                $email_khErr =  "<span class='err'> * Email không đúng định dạng</span>";
                $check = false;
            }

            if($check){
                $temp = check_acount(trim($_POST["email_kh"]),"");
                
                if(!empty($temp)){
                    if($temp[0]["email_kh"] == $_POST["email_kh"]){
                        $message = "<div class='row message'>
                                        <p>Mật khẩu: {$temp[0]['mk_kh']}</p>
                                    </div>";
                    }
                }else{
                    $message = "<div class='row message'>
                                    <p>Tài khoản không tồn tại</p>
                                </div>";
                }

            }
        }
    }
?>