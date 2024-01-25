<article class="row mb">

        <!-- trai: san pham -->
        <div class="boxtrai mr">

                <?php
                    if(!empty($hh)){
                        $img_path = "http://localhost/dashboard/dam/upload/" . $hh["anh_hh"];
                        echo "
                            <div class='row mb headerspct'>
                                <div class='row mb'>
                                    <img src='{$img_path}' alt=''>
                                </div>
        
                                <div class='row mb'>
                                    <ul>
                                        <li>MÃ HH: {$hh['id_hh']}</li>
                                        <li>TÊN HH: {$hh['ten_hh']}</li>
                                        <li>ĐƠN GIÁ: {$hh['gia_hh']}</li>
                                        <li>GIẢM GIÁ: {$hh['giamgia_hh']}%</li>
                                    </ul>
                                </div>
        
                                <div class='row'>
                                    <p>{$hh['mota_hh']}</p>
                                </div>
                            </div>
                        ";

                        // <!-- binh luan -->
                        echo"
                            <div class='row mb'>
                                <iframe src='./user/view/binhluanform.php?id_hh={$hh['id_hh']}' width='100%' frameborder='0' allowfullscreen='true' scrolling='auto'></iframe>
                            </div>
                        ";
                    }
                ?>
                 



                    <!-- hang cung loai      -->
                <?php              
                    if(!empty($hhcl)){
                        echo "
                            <div class='row mb'>
                                <div class='boxtitle'>
                                    <h3>HÀNG CÙNG LOẠI</h3>
                                </div>

                                <div class='boxcontent2 contentbl'>
                                    <ul>
                        ";
                        foreach($hhcl as $temp){
                            echo "
                                    <li><a href='index.php?a=hhct&id_hh={$temp['id_hh']}'>{$temp['ten_hh']}</a></li>
                                ";
                        }

                        echo "
                                        </ul>
                                    </div>
                                </div>        
                            ";
                    }
                ?>
        </div>

        <?php
            require_once __DIR__ . "./../trangchu/boxphai/boxdn.php";
            require_once __DIR__ . "./../trangchu/boxphai/dm.php";
            require_once __DIR__ . "./../trangchu/boxphai/top.php";
        ?>
