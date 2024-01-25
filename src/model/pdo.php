<?php
// thu vien chung:
// cac ham thao truy van, thuc hien
// cac ham validate, cac ham chung


// =================HAM SQL========================

    function pdo_get_connection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=dam", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn; 
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }

    function pdo_exe($sql){
        $sql_args=array_slice(func_get_args(),1);
        try{
            $conn=pdo_get_connection();
            $stmt=$conn->prepare($sql);
            $stmt->execute($sql_args);
    
        }
        catch(PDOException $e){
            throw $e;
            die();
        }
        finally{
            unset($conn);
        }
    }


    function pdo_qr($sql){
        $sql_args=array_slice(func_get_args(),1);
    
        try{
            $conn=pdo_get_connection();
            $stmt=$conn->prepare($sql);
            $stmt->execute($sql_args);
            // mang da chieu, cach thuc lay du lieu theo kieu nao
            $rows=$stmt->fetchAll();
            return $rows;
        }
        catch(PDOException $e){
            throw $e;
            die();
        }
        finally{
            unset($conn);
        }
    }


    function pdo_qr_one($sql){
        $sql_args=array_slice(func_get_args(),1);
        try{
            $conn=pdo_get_connection();
            $stmt=$conn->prepare($sql);
            $stmt->execute($sql_args);
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            // đọc và hiển thị giá trị trong danh sách trả về
            return $row;
            // tuong duong stmt[0];
        }
        catch(PDOException $e){
            throw $e;
            die();
        }
        finally{
            unset($conn);
        }
    }

    // check ket noi database
    pdo_get_connection();

//==================VALIDATION==========================
    function validation_name($name){
        if($name ==0){

        }elseif(empty($name)){
            return "<span class='err'> * Tên không được bỏ trống</span>";
        }
        
        if(strlen($name) > 50){
            return "<span class='err'> * Độ dài tên không vượt quá 50 ký tự</span>";
        }

        // if(preg_match("/^[a-zA-Z0-9 ]*$/",$name) == false){
        //     return "<span class='err'> * Tên bao gồm chữ in hoa thường, số, khoảng trắng</span>";
        // }
    }

    function validation_number($num,$obj){
        if($num == 0){
            
        }elseif(empty($num)){
            return "<span class='err'> * " .$obj ." không được bỏ trống</span>";
            
        }elseif(!is_numeric($num)){
            return "<span class='err'> * " .$obj ." phải là số</span>";
        
        }elseif($num < 0){
            return "<span class='err'> * " .$obj ." > 0</span>";
        }
    }

    function validation_img($img){
        // Hàmgetimagesize()trong PHP có nhiệm vụ lấy ra kích thước và các thông số liên quan của ảnh hiện tại.
        // dung: tra ve mag chua ca thong so
        // sai: false
        if(!getimagesize($img["tmp_name"])){
            return "<span class='err'> * Sai định dạng file</span>";
        }
        // elseif($img["error"] !=0){
        //     return "<span class='err'> * Lỗi không tải được file</span>";
        // }
    }

    function validation_dacbiet($dacbiet){
        if($dacbiet == 0){

        }elseif(empty($dacbiet)){
            return "<span class='err'> * Không được bỏ trống</span>";
            // k nen dung is_int, f thi chi tra ve true false
        }elseif(!is_numeric($dacbiet) || $dacbiet >2 || $dacbiet < 1){
            return "<span class='err'>* Không được chỉnh sửa mã nguồn</span>";
        }
    }

    function validation_email($email){
        $sql = "SELECT email_kh from khachhang";
        $kh = pdo_qr($sql);
        // var_dump($kh);
        
        if($email == 0){

        }elseif(empty($email)){
            return "<span class='err'> * Email không được bỏ trống</span>";
        }
        
        if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
            return "<span class='err'> * Email không đúng định dạng</span>";
        }

        foreach($kh as $temp){
            // var_dump($temp);
            if(strcasecmp($temp["email_kh"],trim($_POST["email_kh"])) == 0){
                // var_dump($email == $temp);
                return "<span class='err'> * Email đã tồn tại</span>"; 
            }
        }
    }

    function validation_password($password){
        if(empty($password)){
            return "<span class='err'> * Mật khẩu không được bỏ trống</span>";
        }

        if(strlen($password) < 8 || strlen($password) > 15){
            return "<span class='err'> * Độ dài mật khẩu không phù hợp</span>";
        }

        if(preg_match("/^[a-zA-Z0-9]*$/",$password) == false){
            return "<span class='err'> * Mật khẩu bao gồm chữ in hoa thường, số</span>";
        }
    }

//=========Tai danh sach cac danh muc==============
    function list_dm($id_dm){
        $sql = "SELECT * FROM danhmuc";

        if(!empty($id_dm)){
            $sql .= " WHERE id_dm = ?";
            return pdo_qr_one($sql,$id_dm);
        }

        return pdo_qr($sql);
    }

//==================Xoa anh trong thu muc upload===========
    function delete_img($img_path){
        $check = unlink( __DIR__ . "./../upload/" . $img_path);
        if(!$check){
            echo "Xoa anh loi";
            die();
        }
    }

// ===================kiem tra id_hh, id_dm======================
// tranh vao trang bang GET dien id vo van

?>