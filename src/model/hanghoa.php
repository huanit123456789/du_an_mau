<?php
    // lien quan den tat ca hang hoa

    function add_hh($ten_hh,$gia_hh,$giamgia_hh,$anhh_hh,$mota_hh,$dacbiet_hh,$id_dm){
        $date = getdate();
        $ngaynhap_hh = $date["year"] . "-". $date["mon"] ."-". $date["mday"];
        $sql = "INSERT INTO hanghoa(ten_hh,gia_hh,giamgia_hh,anh_hh,ngaynhap_hh,mota_hh,dacbiet_hh,id_dm) VALUES (?,?,?,?,?,?,?,?)";
        pdo_exe($sql,$ten_hh,$gia_hh,$giamgia_hh,$anhh_hh,$ngaynhap_hh,$mota_hh,$dacbiet_hh,$id_dm);
    }

    function add_view_hh($id_hh){
        $sql = "UPDATE hanghoa SET view_hh = view_hh + 1 WHERE id_hh = (?)";
        pdo_exe($sql,$id_hh);
    }

    function list_hh_filter($key,$id_dm){
        $sql = "SELECT * FROM hanghoa WHERE 1";

        if($key !=""){
            $sql .= " AND ten_hh LIKE '%" .$key. "%'";
        }

        if($id_dm!=""){
            $sql .= " AND id_dm LIKE '%" .$id_dm . "%'";
        }

        return pdo_qr($sql);
    }

    function list_hh($id_hh){
        $sql = "SELECT * FROM hanghoa";

        if(!empty($id_hh)){
            $sql .= " WHERE id_hh = ?";
            return pdo_qr_one($sql,$id_hh);
        }

        return pdo_qr($sql);
    }

    function list_hh_dm($id_hh,$id_dm){
        $sql = "SELECT * FROM hanghoa WHERE id_dm = ?";
        if(!empty($id_hh)){
            $sql .= " AND id_hh <> " . $id_hh;
        }
        return pdo_qr($sql,$id_dm);
    }

    // bug
    function delete_hh($id_hh){
        $temp = list_hh($id_hh);
        $sql = "DELETE FROM hanghoa WHERE id_hh = (?)";
        pdo_exe($sql,$id_hh);

        // chua biet co xoa duoc khong ==> bug
        delete_img($temp["anh_hh"]);
        // $sql = "DELETE FROM binhluan WHERE id_hh = (?)";
        // pdo_exe($sql,$id_hh);
    }

    function delete_hh_select($array){
        foreach($array as $temp){ 
            delete_hh($temp);
        }
    }

    function update_hh($ten_hh,$gia_hh,$giamgia_hh,$anh_hh,$mota_hh,$dacbiet_hh,$id_dm,$id_hh){
        $sql = "UPDATE hanghoa SET ten_hh = ?, gia_hh = ?, giamgia_hh = ?, anh_hh = ?, mota_hh = ?, dacbiet_hh = ?, id_dm = ? WHERE id_hh = ?";
        pdo_exe($sql,$ten_hh,$gia_hh,$giamgia_hh,$anh_hh,$mota_hh,$dacbiet_hh,$id_dm,$id_hh);
    }
        
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(isset($_POST["add"]) && !empty($_POST["add"])){
            $dm = list_dm("");
            if(empty($dm)){
                $message = '<div class="row message">
                                <h2>Chưa có loại hàng</h2>
                            </div>';
                echo"<style>
                        select {
                            border: 2px solid red;
                        }
                    </style>";  
            }else{
                $check = true;
                $giamgia_hhErr = validation_number($_POST["giamgia_hh"],"Giảm giá");
                if(!empty($giamgia_hhErr)) $check = false;

                $dacbietErr = validation_dacbiet($_POST["dacbiet_hh"]??"");
                if(!empty($dacbietErr)) $check = false;

                $ten_hhErr = validation_name(trim($_POST["ten_hh"]));
                if(!empty($ten_hhErr)) $check = false;

                if($_FILES["anh_hh"]["size"] == 0){
                    $check = false;
                    $anhErr = "<span style='color:red;'> * Ảnh không được bỏ trống</span>";
                    // var_dump($_FILES["anh_hh"]);
                }else{
                    $anhErr = validation_img($_FILES["anh_hh"]);
                    if(!empty($anhErr)) $check = false;
                }

                $gia_hhErr = validation_number($_POST["gia_hh"],"Giá");
                if(!empty($gia_hhErr)) $check = false;

                $huan = false;
                foreach($dm as $id){
                    if($_POST["id_dm"] == $id["id_dm"]){
                        $huan = true;
                        break;
                    }
                }

                if($check && $huan){
                    $img_path = time(). $_FILES["anh_hh"]["name"];
                    
                    if(move_uploaded_file($_FILES["anh_hh"]["tmp_name"], __DIR__ . "./../upload/" . $img_path)){
                        add_hh(trim($_POST["ten_hh"]),$_POST["gia_hh"],$_POST["giamgia_hh"],$img_path,trim($_POST["mota_hh"]),$_POST["dacbiet_hh"],$_POST["id_dm"]);

                        unset($_POST["giamgia_hh"],$_POST["gia_hh"],$_POST["ten_hh"],$_POST["mota_hh"],$_POST["dacbiet_hh"],$_POST["id_dm"]);

                        $message = '<div class="row message">
                                        <h2>Thêm thành công</h2>
                                    </div>';
                    }else{
                        $message = '<div class="row message">
                                        <h2>Không thành công</h2>
                                    </div>';
                    }
                }
            }
        }

        if(isset($_POST["update"]) && !empty($_POST["update"])){
            $dm = list_dm("");
            $hh = list_hh($_GET["id_hh"]);
            
            $check = true;
            $giamgia_hhErr = validation_number($_POST["giamgia_hh"],"Giảm giá");
            if(!empty($giamgia_hhErr)) $check = false;

            $dacbietErr = validation_dacbiet($_POST["dacbiet_hh"]??"");
            if(!empty($dacbietErr)) $check = false;

            $ten_hhErr = validation_name(trim($_POST["ten_hh"]));
            if(!empty($ten_hhErr)) $check = false;

            $gia_hhErr = validation_number($_POST["gia_hh"],"Giá");
            if(!empty($gia_hhErr)) $check = false;
            
            $huan = false;
            foreach($dm as $id){
                if($_POST["id_dm"] == $id["id_dm"]){
                    $huan = true;
                    break;
                }
            }

            // xu ly anh
            if($_FILES["anh_hh"]["size"]!=0){
                $anhErr = validation_img($_FILES["anh_hh"]);
                if(!empty($anhErr)) {
                    $check = false;
                }else{
                    $img_path = time() . $_FILES["anh_hh"]["name"];
                };
            }else{
                $img_path = $hh["anh_hh"];
                // var_dump($_FILES["anh_hh"]);
            }

            if($check && $huan){
                if($_FILES["anh_hh"]["size"]!=0){
                    if(move_uploaded_file($_FILES["anh_hh"]["tmp_name"], __DIR__ . "./../upload/" . $img_path)){
                        // chua biet bug luc xoa anh
                        delete_img($hh["anh_hh"]);
                        update_hh(trim($_POST["ten_hh"]),$_POST["gia_hh"],$_POST["giamgia_hh"],$img_path,trim($_POST["mota_hh"]),$_POST["dacbiet_hh"],$hh["id_hh"]);
                        unset($_POST["ten_hh"],$_POST["gia_hh"],$_POST["giamgia_hh"],$_POST["mota_hh"],$_POST["dacbiet_hh"]);
                        $message = '<div class="row message">
                                        <h2>Cập nhật thành công</h2>
                                    </div>';
                    }else{
                        $message = '<div class="row message">
                                        <h2>Cập nhật không thành công</h2>
                                    </div>';
                    }
                }else{
                    update_hh(trim($_POST["ten_hh"]),$_POST["gia_hh"],$_POST["giamgia_hh"],$img_path,trim($_POST["mota_hh"]),$_POST["dacbiet_hh"],$_POST["id_dm"],$hh["id_hh"]);
                    unset($_POST["ten_hh"],$_POST["gia_hh"],$_POST["giamgia_hh"],$_POST["mota_hh"],$_POST["dacbiet_hh"],$_POST["id_dm"]);
                    $message = '<div class="row message">
                                    <h2>Cập nhật thành công</h2>
                                </div>';
                }
            }
        }

        // isset: da duoc khoi tao va co ton tai hay khong
        // empty: kiem tra xem co rong khong <==> khong ton tai
        if(isset($_POST["search"]) && !empty($_POST["search"])){
            if(!empty(trim($_POST["key"]))){
                $key = trim($_POST["key"]);
            }

            // 0 emtpy cung tra ve true
            if(!empty($_POST["id_dm"])){
                $id_dm = $_POST["id_dm"];
            }            
        }
    }

// ===================================phan trang chu================================================
    function list_hh_nine(){
        // SELECT * FROM table_name ORDER BY primary_key_column DESC LIMIT 9;
        $sql = "SELECT * FROM hanghoa  ORDER BY id_hh DESC LIMIT 9";
        return pdo_qr($sql);
    }

    function list_hh_ten(){
        $sql = "SELECT * FROM hanghoa ORDER BY view_hh DESC LIMIT 10";
        return pdo_qr($sql);
    }

// THOng KE
function thongke_hh_dm(){
    $sql = "SELECT danhmuc.ten_dm as ten_dm, danhmuc.id_dm as id_dm, COUNT(hanghoa.id_hh) as countsp, MIN(hanghoa.gia_hh) as minprice, MAX(hanghoa.gia_hh) as maxprice, AVG(hanghoa.gia_hh) as tb 
            FROM hanghoa 
            LEFT JOIN danhmuc ON danhmuc.id_dm = hanghoa.id_dm 
            GROUP BY danhmuc.id_dm 
            ORDER BY danhmuc.id_dm DESC";
    return pdo_qr($sql);
}

?>