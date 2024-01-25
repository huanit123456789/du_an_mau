<article class="row">

        <div class="row headerdm mb">
            <h1>CẬP NHẬT HÀNG HÓA</h1>
        </div>

        <div class="row">
            <form action="index.php?act=hh&a=update&id_hh=<?=$hh['id_hh']?>" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="boxtraihh mr">
                        <div>
                            <div><label for="id_hh">MÃ HÀNG HÓA</label></div>
                            <div><input type="text" name="id_hh" id="id_hh" placeholder="<?=$hh['id_dm'] ?>" disabled></div>
                        </div>

                        <div>   
                            <div><label for="giamgia_hh">GIẢM GIÁ</label><?= $giamgia_hhErr??"" ?></div>
                            <div><input type="number" min="0" name="giamgia_hh" id="giamgia_hh" value="<?php if(isset($_POST["giamgia_hh"])){echo $_POST["giamgia_hh"];}else{ echo $hh["giamgia_hh"];} ?>"></div>
                        </div>

                        <div>
                            <div><label for="">HÀNG ĐẶC BIỆT</label><?= $dacbietErr??"" ?></div>
                            <div>
                                <input type="radio" name="dacbiet_hh" value="1" <?php if(isset($_POST["dacbiet_hh"])){if($_POST["dacbiet_hh"]==1){ echo "checked"; }}elseif($hh["dacbiet_hh"] == 1){ echo "checked";} ?>>Bình thường
                                <input type="radio" name="dacbiet_hh" value="2" <?php if(isset($_POST["dacbiet_hh"])){if($_POST["dacbiet_hh"]==2){ echo "checked"; }}elseif($hh["dacbiet_hh"] == 2){ echo "checked";} ?>>Đặc biệt
                            </div>
                        </div>
                    </div>

                    <div class="boxgiuahh mr">
                        <div>
                            <div><label for="ten_hh">TÊN HÀNG HÓA</label><?= $ten_hhErr??"" ?></div>
                            <div><input type="text" name="ten_hh" id="ten_hh" value="<?php if(isset($_POST["ten_hh"])){echo $_POST["ten_hh"];}else{ echo $hh["ten_hh"];} ?>"></div>
                        </div>

                        <div style="margin-bottom:5px">
                            <div><label for="anh_hh">HÌNH ẢNH</label><?= $anhErr??"" ?></div>
                            <div><input type="file" name="anh_hh" id="anh_hh"></div>
                        </div>

                        <div class="row">
                            <img src="http://localhost/dashboard/dam/upload/<?= $hh['anh_hh'] ?>" style="width:30%; height:3.5vw;" alt="">
                        </div>

                    </div>

                    <div class="boxphaihh">
                        <div>
                            <div><label for="gia_hh">ĐƠN GIÁ</label><?= $gia_hhErr??"" ?></div>
                            <div><input type="number" min="0" name="gia_hh" id="gia_hh" value="<?php if(isset($_POST["gia_hh"])){echo $_POST["gia_hh"];}else{ echo $hh["gia_hh"];} ?>"></div>
                        </div>

                        <div>
                            <div><label for="id_dm">LOẠI HÀNG</label><?= $id_hhErr??"" ?></div>
                            <select name="id_dm" id="id_dm">

                                <?php
                                    foreach($dm as $temp){
                                        $selected = "";
                                        if(isset($_POST["id_dm"])){
                                            if($_POST["id_dm"] == $temp["id_dm"]){
                                                $selected = "selected";
                                            }
                                        }elseif($temp["id_dm"] == $hh["id_dm"]){
                                            $selected = "selected";
                                        }
                                        echo "<option value='{$temp['id_dm']}' $selected>{$temp['ten_dm']}</option>";
                                    }                   
                                ?>
                                
                            </select>
                        </div>

                        <div>
                            <div><label for="view_hh">SỐ LƯỢT XEM</label></div>
                            <div><input type="text" value="0" id="view_hh" disabled value="<?= $hh["view_hh"] ?>"></div>
                        </div>
                    </div>
                </div>

                <div class="row" style="clear:both;">
                    <div>
                        <label for="mota_hh">MÔ TẢ</label>
                    </div>
                    <div>
                        <textarea name="mota_hh" id="mota_hh" cols="" rows="10"><?php if(isset($_POST["mota_hh"])){ echo $_POST["mota_hh"]; }else{ echo $hh["mota_hh"]; } ?></textarea>
                    </div>
                </div>

                <?= $message??"" ?>

                <div class="row">
                    <input type="submit" name="update" value="Cập nhật">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=hh&a=list"><input type="button" value="Danh sách"></a>
                </div>
            </form>
        </div>
    </article>
</body>
</html>