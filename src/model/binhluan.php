<?php
    // lien quan den tat ca binh luan

    function add_bl($nd_bl,$id_kh,$id_hh){
        $date = getdate();
        $ngay_bl = $date["year"] . "-". $date["mon"] ."-". $date["mday"];
        $sql = "INSERT INTO binhluan(nd_bl,id_kh,id_hh,ngay_bl) VALUES (?,?,?,?)";
        pdo_exe($sql,$nd_bl,$id_kh,$id_hh,$ngay_bl);
    }

    function list_bl_hhct($id_hh){
        $sql = "SELECT binhluan.*, khachhang.hoten_kh FROM binhluan LEFT JOIN khachhang ON binhluan.id_kh = khachhang.id_kh WHERE binhluan.id_hh = (?)";
        return pdo_qr($sql,$id_hh);
    }

    function list_bl_dm(){
        $sql = "SELECT dm.ten_dm,dm.id_dm, count(bl.id_bl) as countbl, Max(ngay_bl) as moinhat, Min(ngay_bl) as cunhat FROM danhmuc as dm 
                INNER JOIN hanghoa as hh ON dm.id_dm = hh.id_dm
                INNER JOIN binhluan as bl ON hh.id_hh = bl.id_hh
                group by dm.id_dm";
        return pdo_qr($sql);
    }

    function list_bl_hh($id_dm){
        $sql = "select bl.id_bl, bl.nd_bl, kh.hoten_kh, hh.ten_hh, bl.ngay_bl
            from binhluan as bl
            inner join hanghoa as hh on bl.id_hh = hh.id_hh
            inner join khachhang as kh on bl.id_kh = kh.id_kh
            where hh.id_dm = (?)";
        return pdo_qr($sql,$id_dm);
    }

    function delete_bl($id_bl){
        $sql = "DELETE FROM binhluan WHERE id_bl = (?)";
        pdo_exe($sql,$id_bl);
    }

    function delete_bl_select($array){
        foreach($array as $temp){
            delete_bl($temp);
        }
    }
?>