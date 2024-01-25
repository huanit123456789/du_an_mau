<?php
    // lien quan den tat ca tai khoan khach hang

    function add_kh($mk_kh,$hoten_kh,$anh_kh,$email_kh,$vaitro_kh){
        $sql = "INSERT INTO khachhang(mk_kh,hoten_kh,anh_kh,email_kh,vaitro_kh) VALUES (?,?,?,?,?)";
        pdo_exe($sql,$mk_kh,$hoten_kh,$anh_kh,$email_kh,$vaitro_kh);
    }

    function list_kh($id_kh){
        $sql = "SELECT * FROM khachhang";

        if(!empty($id_kh)){
            $sql .= " WHERE id_kh = (?)";
            return pdo_qr_one($sql,$id_kh);
        }

        return pdo_qr($sql);
    }

    function update_kh($mk_kh,$hoten_kh,$anh_kh,$vaitro_kh,$id_kh){
        $sql = "UPDATE khachhang SET mk_kh = ?, hoten_kh = ?, anh_kh = ?, vaitro_kh = ? WHERE id_kh = ?";
        pdo_exe($sql,$mk_kh,$hoten_kh,$anh_kh,$vaitro_kh,$id_kh);
    }

    function delete_kh($id_kh){

        $id_user = $_SESSION["user"][0]["id_kh"];

        if($id_user == $id_kh){
            return '<div class="row message">
                        <h2>Không xóa tài khoản đang sử dụng</h2>
                    </div>';
        }else{
            // xoa anh khach hang
            $sql = "SELECT * FROM khachhang WHERE id_kh = (?)";
            $temp = pdo_qr_one($sql,$id_kh);
            delete_img($temp["anh_kh"]);

            $sql = "DELETE FROM khachhang WHERE id_kh = (?)";
            pdo_exe($sql,$id_kh);
        }
    }

    function delete_kh_select($array){
        foreach($array as $temp){
            if(!empty(delete_kh($temp))){
                return delete_kh($temp);
                // break;
            }
            // delete_kh($temp);
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["add"]) && !empty($_POST["add"])){
            $check = true;

            $hoten_khErr = validation_name(trim($_POST["hoten_kh"]));
            if(!empty($hoten_khErr)) $check = false;

            $email_khErr = validation_email(trim($_POST["email_kh"]));
            if(!empty($email_khErr)) $check = false;

            if($_POST["add"] == "Gửi"){
                $vaitro_khErr = validation_dacbiet($_POST["vaitro_kh"]??"");
            }else{
                $vaitro_khErr = validation_dacbiet($_POST["vaitro_kh"]??0);
            }
            if(!empty($vaitro_khErr)) $check = false;
            

            $mk_khErr = validation_password($_POST["mk_kh"]);
            if(!empty($mk_khErr)) $check = false;

            $mk_khErr2 = validation_password($_POST["mk_kh2"]);
            if(!empty($mk_khErr2)) $check = false;

            if($_FILES["anh_kh"]["size"] == 0){
                $check = false;
                $anh_khErr = "<span style='color:red;'> * Ảnh không được bỏ trống</span>";
                // var_dump($_FILES["anh_hh"]);
            }else{
                $anh_khErr = validation_img($_FILES["anh_kh"]);
                if(!empty($anh_khErr)) $check = false;
            }
    
            // var_dump($check);
            if($check){
                if($_POST["mk_kh"] !== $_POST["mk_kh2"]){ 
                    $message = '<div class="row message">
                                    <h2>Mật khẩu không khớp</h2>
                                </div>';
                }else{
                    $img_path = time() . $_FILES["anh_kh"]["name"];

                    if(move_uploaded_file($_FILES["anh_kh"]["tmp_name"],__DIR__ . "./../upload/" . $img_path)){
                        add_kh($_POST["mk_kh"],trim($_POST["hoten_kh"]),$img_path,trim($_POST["email_kh"]),$_POST["vaitro_kh"]??1); 
                        unset($_POST["mk_kh"],$_POST["hoten_kh"],$_POST["email_kh"],$_POST["vaitro_kh"],$_POST["mk_kh2"]);
                        $message = '<div class="row message">
                                        <h2>Đăng ký khoản thành công</h2>
                                    </div>';
                    }else{
                        $message = '<div class="row message">
                                        <h2>Thêm tài khoản không thành công</h2>
                                    </div>';
                    }
                }
            }
        }

        if(isset($_POST["update"]) && !empty($_POST["update"])){
            $kh = list_kh($_GET["id_kh"]);
            $check = true;

            $hoten_khErr = validation_name(trim($_POST["hoten_kh"]));
            if(!empty($hoten_khErr)) $check = false;

            $vaitro_khErr = validation_dacbiet($_POST["vaitro_kh"]??"");
            if(!empty($vaitro_khErr)) $check = false;

            $mk_khErr = validation_password($_POST["mk_kh"]);
            if(!empty($mk_khErr)) $check = false;

            $mk_khErr2 = validation_password($_POST["mk_kh2"]);
            if(!empty($mk_khErr2)) $check = false;

            if($_FILES["anh_kh"]["size"] != 0){
                $anh_khErr = validation_img($_FILES["anh_kh"]);
                if(!empty($anh_khErr)){
                    $check = false;
                }else{
                    $img_path = time() . $_FILES["anh_kh"]["name"];
                }
            }else{
                $img_path = $kh["anh_kh"];
            }

            if($check){
                if($_POST["mk_kh"] !== $_POST["mk_kh2"]){ 
                    $message = '<div class="row message">
                                    <h2>Mật khẩu không khớp</h2>
                                </div>';
                }else{
                    if($_FILES["anh_kh"]["size"] != 0){
                        if(move_uploaded_file($_FILES["anh_kh"]["tmp_name"],__DIR__ . "./../upload/" . $img_path)){
                            delete_img($kh["anh_kh"]);
                            update_kh($_POST["mk_kh"],trim($_POST["hoten_kh"]),$img_path,$_POST["vaitro_kh"],$kh['id_kh']); 
                            unset($_POST["mk_kh"],$_POST["hoten_kh"],$_POST["email_kh"],$_POST["vaitro_kh"],$_POST["mk_kh2"]);
                            $message = '<div class="row message">
                                            <h2>Cập nhật tài khoản thành công</h2>
                                        </div>';
                        }else{
                            $message = '<div class="row message">
                                            <h2>Cập nhật khoản không thành công</h2>
                                        </div>';
                        }
                    }else{
                        update_kh($_POST["mk_kh"],trim($_POST["hoten_kh"]),$img_path,$_POST["vaitro_kh"],$kh['id_kh']); 
                        unset($_POST["mk_kh"],$_POST["hoten_kh"],$_POST["email_kh"],$_POST["vaitro_kh"],$_POST["mk_kh2"]);
                        $message = '<div class="row message">
                                        <h2>Cập nhật tài khoản thành công</h2>
                                    </div>';
                    }
                }
            }
        }

        // Cap nhat tai khoan
        if(isset($_POST["updatemk"]) && !empty($_POST["updatemk"])){
            $kh = list_kh($_GET["id_kh"]);
            $check = true;

            $hoten_khErr = validation_name(trim($_POST["hoten_kh"]));
            if(!empty($hoten_khErr)) $check = false;

            $mk_cuErr = validation_password($_POST["mk_cu"]);
            if(!empty($mk_cuErr)) $check = false;

            $mk_khErr = validation_password($_POST["mk_kh"]);
            if(!empty($mk_khErr)) $check = false;

            $mk_khErr2 = validation_password($_POST["mk_kh2"]);
            if(!empty($mk_khErr2)) $check = false;

            if($_FILES["anh_kh"]["size"] != 0){
                $anh_khErr = validation_img($_FILES["anh_kh"]);
                if(!empty($anh_khErr)){
                    $check = false;
                }else{
                    $img_path = time() . $_FILES["anh_kh"]["name"];
                }
            }else{
                $img_path = $kh["anh_kh"];
            }

            if($check){
                if($_POST["mk_cu"] !==$kh["mk_kh"]){
                    $message = '<div class="row message">
                                    <h2>Mật khẩu không cũ không chính xác</h2>
                                </div>';
                }else{
                    if($_POST["mk_kh"] !== $_POST["mk_kh2"]){ 
                        $message = '<div class="row message">
                                        <h2>Mật khẩu không khớp</h2>
                                    </div>';
                    }else{
                        if($_FILES["anh_kh"]["size"] != 0){
                            if(move_uploaded_file($_FILES["anh_kh"]["tmp_name"],__DIR__ . "./../upload/" . $img_path)){
                                delete_img($kh["anh_kh"]);
                                update_kh($_POST["mk_kh"],trim($_POST["hoten_kh"]),$img_path,$_POST["vaitro_kh"],$kh['id_kh']); 
                                unset($_POST["mk_kh"],$_POST["hoten_kh"],$_POST["email_kh"],$_POST["vaitro_kh"],$_POST["mk_kh2"]);
                                $message = '<div class="row message">
                                                <h2>Cập nhật tài khoản thành công</h2>
                                            </div>';
                            }else{
                                $message = '<div class="row message">
                                                <h2>Cập nhật khoản không thành công</h2>
                                            </div>';
                            }
                        }else{
                            update_kh($_POST["mk_kh"],trim($_POST["hoten_kh"]),$img_path,$kh["vaitro_kh"],$kh['id_kh']); 
                            unset($_POST["mk_cu"],$_POST["mk_kh"],$_POST["hoten_kh"],$_POST["email_kh"],$_POST["vaitro_kh"],$_POST["mk_kh2"]);
                            $message = '<div class="row message">
                                            <h2>Cập nhật tài khoản thành công</h2>
                                        </div>';
                        }
                    }
                }
            }
        }
    }
?>