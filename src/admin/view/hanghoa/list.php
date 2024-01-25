    <article class="row">
        <div class="row headerdm mb">
            <h1>DANH SÁCH HÀNG HÓA</h1>
        </div>

        <script>
            function message(id_hh){
                if(confirm("Bạn có muốn xóa không ?")){
                    window.location.href = `index.php?act=hh&a=delete&id_hh=${id_hh}`
                }
            }
        </script>


        <form action="index.php?act=hh&a=list" method="POST">
            <input type="text" name="key" style="width:30%;" value="<?= $key??"" ?>">
            <select name="id_dm" style="width:20%;"> 
                <option value="0">Tất cả</option>
                <?php 
                    if(!empty($dm)){
                        foreach($dm as $temp){
                            $selected = "";
                            // issset co 0 la true nhung id_dm k co 0
                            if(isset($id_dm)){
                                if($id_dm == $temp["id_dm"]){
                                    $selected = "selected";
                                }
                            }
                            echo "<option value='{$temp['id_dm']}' {$selected}>{$temp['ten_dm']}</option>"; 
                        }
                    }
                ?>
            </select>
            <input type="submit" name="search" value="Tìm">
        </form>

        <table class="row" border="1">
            <thead>
                <tr>
                    <th></th>
                    <th>Mã HH</th>
                    <th>TÊN HH</th>
                    <th>HÌNH ẢNH</th>
                    <th>ĐƠN GIÁ</th>
                    <th>GIẢM GIÁ</th>
                    <th>LƯỢT XEM</th>
                    <th>HÀNH ĐỘNG</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(!empty($hh)){
                    foreach($hh as $temp){
                        $img_path = "http://localhost/dashboard/dam/upload/" . $temp["anh_hh"];
                        echo  "
                            <tr>
                            <td><input type='checkbox' value='{$temp['id_hh']}' class='checkbox'></td>
                                <td>{$temp['id_hh']}</td>
                                <td>{$temp['ten_hh']}</td>
                                <td><img src='{$img_path}'></td>
                                <td>{$temp['gia_hh']}</td>
                                <td>{$temp['giamgia_hh']}%</td>
                                <td>{$temp['view_hh']}</td>
                                <td>
                                    <a href='index.php?act=hh&a=update&id_hh={$temp['id_hh']}'><button>Sửa</button></a>
                                    <button onclick='message({$temp['id_hh']})' >Xóa</button>
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
            <input type="button" onclick="deleteSelect('act=hh','')" value="Xóa các mục đã chọn">
            <a href="index.php?act=hh"><input type="button" value="Nhập thêm"></a>
        </div>

    </article>
</body>

</html>