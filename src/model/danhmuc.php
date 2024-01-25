<?php
    // lien quan den tat ca danh muc

    function add_dm($ten_dm){
        $sql = "INSERT danhmuc(ten_dm) VALUES (?)";
        pdo_exe($sql,$ten_dm);
    }

    function delete_dm($id_dm){
        $sql = "SELECT * FROM hanghoa WHERE id_dm = (?)";
        $hh = pdo_qr($sql,$id_dm);
        if(!empty($hh)){
            foreach($hh as $temp){
                delete_img($temp["anh_hh"]);
            }
        }

        $sql = "DELETE FROM hanghoa WHERE id_dm = (?)";
        pdo_exe($sql,$id_dm);

        $sql = "DELETE FROM danhmuc WHERE id_dm = (?)";
        pdo_exe($sql,$id_dm);
    }

    function delete_dm_select($array){
        foreach($array as $temp){
            delete_dm($temp);
        }
    }

    function update_dm($ten_dm,$id_dm){
        $sql = "UPDATE danhmuc SET ten_dm = (?) WHERE id_dm = (?)";
        pdo_exe($sql,$ten_dm,$id_dm);
    }
    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(isset($_POST["add"]) && !empty($_POST["add"])){
            $check = true;

            $ten_dmErr = validation_name(trim($_POST["ten_dm"]));
            if(!empty($ten_dmErr)) $check = false;

            $sql = "SELECT ten_dm FROM danhmuc";
            $dm = pdo_qr($sql);

            foreach($dm as $temp){
                if(strcasecmp($temp["ten_dm"],trim($_POST["ten_dm"])) == 0){
                    $check = false;
                    $ten_dmErr = "<span class='err'> * Danh mục đã tồn tại</span>";
                    break;
                }
            }

            if($check){
                add_dm(trim($_POST["ten_dm"]));
                unset($_POST["ten_dm"]);

                $message = "<div class='row message'>
                                <h2>Thêm thành công</h2>
                            </div>";
            }
        }

        if(isset($_POST["update"]) && !empty($_POST["update"])){


            $check = true;

            $ten_dmErr = validation_name(trim($_POST["ten_dm"]));
            if(!empty($ten_dmErr)) $check = false;

            $sql = "SELECT ten_dm FROM danhmuc";
            $dm = pdo_qr($sql);

            foreach($dm as $temp){
                if(strcasecmp($temp["ten_dm"],trim($_POST["ten_dm"])) == 0){
                    $check = false;
                    $ten_dmErr = "<span class='err'> * Danh mục đã tồn tại</span>";
                    break;
                }
            }

            if($check){
                update_dm(trim($_POST["ten_dm"]),$_GET["id_dm"]);
                unset($_POST["ten_dm"]);

                $message = "<div class='row message'>
                                <h2>Cập nhật thành công</h2>
                            </div>";
            }
        }
    }
?>