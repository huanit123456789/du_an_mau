<article class="row">
        <div class="row headerdm mb">
            <h1>TỔNG HỢP BÌNH LUẬN THEO HÀNG HÓA</h1>
        </div>

        <script>
            function message(id_bl,id_dm){
                if(confirm("Bạn có muốn xóa không ?")){
                    window.location.href = `index.php?act=bl&a=delete&id_bl=${id_bl}&id_dm=${id_dm}`;
                }
            }
        </script>
        <table class="row" border="1">
            <thead>
                <tr>
                    <th></th>
                    <th>Mã BL</th>
                    <th>NỘI DUNG</th>
                    <th>NGƯỜI BL</th>
                    <th>SẢN PHẨM</th>
                    <th>NGÀY BL</th>
                    <th>HÀNH ĐỘNG</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(!empty($blhh)){
                    foreach($blhh as $temp){
                        echo  "
                            <tr>
                            <td><input type='checkbox' value='{$temp['id_bl']}' class='checkbox'></td>
                                <td>{$temp['id_bl']}</td>
                                <td>{$temp['nd_bl']}</td>
                                <td>{$temp['hoten_kh']}</td>
                                <td>{$temp['ten_hh']}</td>
                                <td>{$temp['ngay_bl']}</td>
                                <td>
                                    <button onclick='message({$temp['id_bl']},{$_GET['id_dm']})' >Xóa</button>
                                </td>
                            </tr>
                        ";
                    }
                }
            ?>
            </tbody>
        </table>

        <div class="row">
            <input type="button" onclick="selectAll()" value="Chọn tất cả">
            <input type="button" onclick="unselectAll()" value="Bỏ chọn tất cả">
            <input type="button" onclick="deleteSelect('act=bl',<?= $_GET['id_dm'] ?>)" value="Xóa các mục đã chọn">
        </div>

    </article>
</body>

</html>