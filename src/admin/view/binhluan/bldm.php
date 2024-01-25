<article class="row">

        <div class="row headerdm mb">
            <h1>TỔNG HỢP BÌNH LUẬN</h1>
        </div>

        <div class="row">
            <table class="row" border="1">
                <thead>
                    <tr>
                        <th>HÀNG HÓA</th>
                        <th>SỐ BL</th>
                        <th>MỚI NHẤT</th>
                        <th>CŨ NHẤT</th>
                        <th>HÀNH ĐỘNG</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                    if(!empty($bldm)){
                        foreach($bldm as $temp){
                            echo "
                                <tr>
                                    <td>{$temp['ten_dm']}</td>
                                    <td>{$temp['countbl']}</td>
                                    <td>{$temp['moinhat']}</td>
                                    <td>{$temp['cunhat']}</td>
                                    <td><a href='index.php?act=bl&a=blhh&id_dm={$temp['id_dm']}'><button>Chi tiết</button></a></td>
                                </tr>
                            ";
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>


    </article>