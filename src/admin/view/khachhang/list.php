<article class="row">

        <div class="row headerdm mb">
            <h1>DANH SÁCH KHÁCH HÀNG</h1>
        </div>

        <script>
            function message(id_kh){
                if(confirm("Bạn có muốn xóa không ?")){
                    window.location.href = `index.php?act=kh&a=delete&id_kh=${id_kh}`
                }
            }
        </script>


        <table class="row" border="1">
            <thead>
                <tr>
                    <th></th>
                    <th>Mã KH</th>
                    <th>HỌ VÀ TÊN</th>
                    <th>ĐỊA CHỈ EMAIL</th>
                    <th>Mật KHẨU</th>
                    <th>HÌNH ẢNH</th>
                    <th>VAI TRÒ</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody>
                
                <?php
                    if(!empty($kh)){
                        foreach($kh as $temp){
                            $img_path = "http://localhost/dashboard/dam/upload/" . $temp["anh_kh"];

                            if($temp["vaitro_kh"] == 1){
                                $vaitro = "Khách hàng";
                            }else{
                                $vaitro = "Nhân viên";
                            }

                            echo "
                                <tr>
                                    <td><input type='checkbox' value='{$temp['id_kh']}' class='checkbox'></td>
                                    <td>{$temp['id_kh']}</td>
                                    <td>{$temp['hoten_kh']}</td>
                                    <td>{$temp['email_kh']}</td>
                                    <td>{$temp['mk_kh']}</td>
                                    <td><img src='{$img_path}'></td>
                                    <td>{$vaitro}</td>
                                    <td>
                                        <a href='index.php?act=kh&a=update&id_kh={$temp['id_kh']}'><button>Sửa</button></a>
                                        <button onclick='message({$temp['id_kh']})'>Xóa</button>
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
            <input type="button" onclick="deleteSelect('act=kh','')" value="Xóa các mục đã chọn">
            <a href="index.php?act=kh"><input type="button" value="Nhập thêm"></a>
        </div>

    </article>

</body>

</html>