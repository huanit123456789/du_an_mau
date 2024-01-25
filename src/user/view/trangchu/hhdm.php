<article class="row mb">

        <!-- trai: san pham -->
        <div class="boxtrai mr">
            
            <div class="row mb">
            
                <?php
                    if(!empty($tendm)){

                        echo "
                                <h1 class='mb'>DANH MỤC: {$tendm["ten_dm"]}</h1>
                            ";

                        if(!empty($hh)){
                            $i = 0;
                            // $mr = "mr";
    
                            foreach($hh as $temp){
                                $img_path = "http://localhost/dashboard/dam/upload/" . $temp["anh_hh"];
    
                                if($i==2){
                                    $i=0;
                                    $mr = "";
                                }else{
                                    $i++;
                                    $mr = "mr";
                                }
    
                                echo "
                                    <a class='boxsp {$mr}' href='index.php?a=hhct&id_hh={$temp['id_hh']}'>
                                        <div class='img'>
                                            <img src='{$img_path}' alt=''>
                                        </div>
                                        <p>$ {$temp['gia_hh']}</p>
                                        <span>{$temp['ten_hh']}</span>
                                    </a>
                                ";
                            }
                        }else{
                            echo "
                                <h1>Không có sản phẩm</h1>
                            ";
                        }
                    }
                ?>

            </div>
        </div>

        <?php
            require_once __DIR__ . "./../trangchu/boxphai/boxdn.php";
            require_once __DIR__ . "./../trangchu/boxphai/dm.php";
            require_once __DIR__ . "./../trangchu/boxphai/top.php";
        ?>