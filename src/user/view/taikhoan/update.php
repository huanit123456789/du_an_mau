<article class="row">

        <div class="row headerdm mb"    >
            <h1>CẬP NHẬT TÀI KHOẢN</h1>
        </div>

        <div class="row">
            <form action="index.php?act=tk&a=update&id_kh=<?= $kh['id_kh'] ?>" method="POST" enctype="multipart/form-data">
                
                <div class="row">
                    <div class="boxtraikh mr">
                        <div>
                            <div><label for="id_kh">Mã KHÁCH HÀNG</label></div>
                            <div><input type="text" name="id_kh" id="id_kh" value="<?= $kh['id_kh'] ?>" disabled></div>
                        </div>
                        <div>
                            <div><label for="hoten_kh">HỌ VÀ TÊN</label><?= $hoten_khErr??"" ?></div>
                            <div><input type="text" name="hoten_kh" id="hoten_kh" value="<?php if(isset($_POST["hoten_kh"])){ echo $_POST["hoten_kh"];}else{echo $kh["hoten_kh"];} ?>"></div>
                        </div>
                        <div>
                            <div><label for="email_kh">ĐỊA CHỈ EMAIL</label><?= $email_khErr??"" ?></div>
                            <div><input type="email" name="email_kh" id="email_kh" value="<?= $kh['email_kh'] ?>" disabled></div>
                        </div>
                        <div>
                            <div><label for="mk_cu">MẬT KHẨU CŨ</label><?= $mk_cuErr??"" ?></div>
                            <div><input type="password" name="mk_cu" id="mk_cu" value="<?= $_POST["mk_cu"]??"" ?>"></div>
                        </div>
                    </div>

                    <div class="boxphaikh">
                        <div>
                            <div><label for="mk_kh">MẬT KHẨU MỚI</label><?= $mk_khErr??"" ?></div>
                            <div><input type="password" name="mk_kh" id="mk_kh" value="<?= $_POST["mk_kh"]??"" ?>"></div>
                        </div>
                        <div>
                            <div><label for="mk_kh2">XÁC NHẬN MẬT KHẨU</label><?= $mk_khErr2??"" ?></div>
                            <div><input type="password" name="mk_kh2" id="mk_kh2" value="<?= $_POST["mk_kh2"]??"" ?>"></div>
                        </div>
                        <div style="margin-bottom:5px">
                            <div><label for="anh_kh">HÌNH ẢNH</label><?= $anh_khErr??"" ?></div>
                            <div><input type="file" name="anh_kh" id="anh_kh"></div>
                        </div>

                        <div class="row">
                            <img src="http://localhost/dashboard/dam/upload/<?= $kh['anh_kh'] ?>" style="width:30%; height:3.5vw;" alt="">
                        </div>

                    </div>
                </div>

                <div class="row" style="clear: both;">
                    <input type="submit" name="updatemk" value="Cập nhật">
                    <input type="reset" value="Nhập lại">
                </div>
            </form>

            <?= $message??"" ?>
            
        </div>
    </article>

</body>
</html>