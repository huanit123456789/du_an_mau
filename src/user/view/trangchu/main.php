<!-- JS slideshow -->
<script>
    var img = ["./upload/slide1.jpg","./upload/slide2.jpg","./upload/slide3.jpg","./upload/slide4.jpg"];
    var i = 0;
    // console.log(img.length);

    function next(){
        if(i== img.length-1){
            i=0;
        }else{
            i ++;
        }
        document.getElementById("slide").setAttribute("src", img[i]);
    }

    setInterval(function(){
        next();
    }, 1500); // Khoảng thời gian là 1000ms (1 giây)
</script>

<article class="row mb">

        <!-- trai: san pham -->
        <div class="boxtrai mr">
            <div class="row mb">
                <div class="banner">
                    <img src="./upload/slide1.jpg" alt="" id="slide">
                </div>
            </div>

            <div class="row mb">

                <?php
                    if(!empty($hh)){
                        $i = 0;
                        foreach($hh as $temp){
                            $img_path ="http://localhost/dashboard/dam/upload/" . $temp["anh_hh"];

                            if($i == 2){
                                $mr = "";
                                $i = 0;
                            }else{
                                $mr = "mr";
                                $i++;
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
                    }
                ?>
            
            </div>
        </div>

        <?php

        // session: trước nếu được khởi tạo thì tạo ra 1 chuỗi chứa require_one chưa đăng nhập, đã đăng nhập
            require_once __DIR__ . "./boxphai/boxdn.php";
            require_once __DIR__ . "./boxphai/dm.php";
            require_once __DIR__ . "./boxphai/top.php";
        ?>

    </article>