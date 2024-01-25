<div class="row mb">
        <div class="boxtitle">DANH MỤC</div>
        <div class="boxcontent2 menudm">
            <ul>
                <?php
                    if(!empty($dm)){
                        foreach($dm as $temp){
                            echo "
                                <li><a href='index.php?a=hhdm&id_dm={$temp['id_dm']}'>{$temp['ten_dm']}</a></li>
                            ";
                        }
                    }
                ?>
            </ul>
        </div>
        <div class="boxfooter">
            <form action= "index.php?a=hhs" method= "POST">
                <input type="search" name="key" placeholder="Từ khóa tìm kiếm" name="search">
                <input type="submit" value="Tìm kiếm" name="search">
            </form>
        </div>
    </div>