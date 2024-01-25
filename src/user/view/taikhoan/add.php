<article class="row">

        <div class="row headerdm mb">
            <h1>ĐĂNG KÝ THÀNH VIÊN</h1>
        </div>

        <form action="index.php?act=tk" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div><label for="hoten_kh">Họ và tên</label><?= $hoten_khErr??"" ?></div>
                <div><input type="text" name="hoten_kh" id="hoten_kh" value="<?= $_POST["hoten_kh"]??"" ?>"></div>
            </div>

            <div class="row">
                <div><label for="email_kh">Địa chỉ Email</label><?= $email_khErr??"" ?></div>
                <div><input type="email" name="email_kh" id="email_kh" value="<?= $_POST["email_kh"]??"" ?>"></div>
            </div>

            <div class="row">
                <div><label for="mk_kh">Mật khẩu</label><?= $mk_khErr??"" ?></div>
                <div><input type="password" name="mk_kh" id="mk_kh" value="<?= $_POST["mk_kh"]??"" ?>"></div>
            </div>

            <div class="row">
                <div><label for="mk_kh2">Xác nhận mật khẩu</label><?= $mk_khErr2??"" ?></div>
                <div><input type="password" name="mk_kh2" id="mk_kh2" value="<?= $_POST["mk_kh2"]??"" ?>"></div>
            </div>

            <div class="row">
                <div><label for="anh_kh">Hình ảnh</label><?= $anh_khErr??"" ?></div>
                <div><input type="file" name="anh_kh" id="anh_kh"></div>
            </div>

            <input type="submit" name="add" value="Đăng ký">
        </form>

        <?= $message??"" ?>
        
    </article>
</body>
</html>