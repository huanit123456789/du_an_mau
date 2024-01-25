<div class="row mb">
        <div class="boxtitle">TOP 10 SẢN PHẨM YÊU THÍCH</div>
        <div class="row boxcontent top10">
            <?php
                if(!empty($top)){
                    foreach($top as $temp){
                        $img_path = "http://localhost/dashboard/dam/upload/" . $temp["anh_hh"];
                        echo "
                            <div class='row mb top'>
                                <img src='{$img_path}' alt=''>
                                <a href='index.php?a=hhct&id_hh={$temp['id_hh']}'>{$temp['ten_hh']}</a>
                            </div>
                        ";
                    }
                }
            ?>

        </div>
    </div>


</div>