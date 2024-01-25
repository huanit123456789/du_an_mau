<article class="row">
        <div class="row headerdm mb">
            <h1>BẢNG THỐNG KÊ</h1>
        </div>

        <table class="row" border="1">
            <thead>
                <tr>
                    <th>MÃ DANH MỤC</th>
                    <th>TÊN DANH MỤC</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ CAO NHẤT</th>
                    <th>GIÁ THẤP NHẤT</th>
                    <th>GIÁ TRUNG BÌNH</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(!empty($tk)){
                    foreach($tk as $temp){
                        echo  "
                            <tr>
                                <td>{$temp['id_dm']}</td>
                                <td>{$temp['ten_dm']}</td>
                                <td>{$temp['countsp']}</td>
                                <td>{$temp['minprice']}</td>
                                <td>{$temp['maxprice']}</td>
                                <td>{$temp['tb']}</td>
                            </tr>
                        ";
                    }
                }
            ?>
            </tbody>
        </table>

        <div class="row">
            <a href="index.php?act=tk&a=bd"><input type="button" value="Xem biểu đồ"></a>
        </div>

    </article>
</body>

</html>