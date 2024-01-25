<!-- view cua phan list danh muc -->
<article class="row">

<div class="row headerdm mb">
    <h1>DANH SÁCH DANH MỤC</h1>
</div>

<script>
    function message(id_dm){
        if(confirm("Bạn có muốn xóa không ?")){
            window.location.href = `index.php?act=dm&a=delete&id_dm=${id_dm}`
        }
    }
</script>

<table class="row" border="1">
    <thead>
        <tr>
            <th></th>
            <th>Mã loại</th>
            <th>Tên loại</th>
            <th>Hành động</th>
        </tr>
    </thead>

    <tbody>
        <?php
            if(!empty($dm)){
                foreach($dm as $temp){
                        // default Value
                    echo "
                        <tr>
                            <td><input type='checkbox' value='{$temp['id_dm']}' class='checkbox'></td>
                            <td>{$temp['id_dm']}</td>
                            <td>{$temp['ten_dm']}</td>
                            <td> 
                                <a href='index.php?act=dm&a=update&id_dm={$temp['id_dm']}'><button>Sửa</button></a>
                                <button onclick = 'message({$temp['id_dm']})'>Xóa</button>
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
    <input type="button" onclick="deleteSelect('act=dm','')" value="Xóa các mục đã chọn">
    <a href="index.php?act=dm"><input type="button" value="Nhập thêm"></a>
</div>
</article>
</body>

</html>