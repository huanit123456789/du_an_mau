<article class="row">

        <div class="row headerdm mb">
            <h1>QUÊN MẬT KHẨU</h1>
        </div>

        <form action="index.php?act=tk&a=qmk" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div><label for="email_kh">Địa chỉ Email</label><?= $email_khErr??"" ?></div>
                <div><input type="email" name="email_kh" id="email_kh" value="<?= $_POST["email_kh"]??"" ?>"></div>
            </div>
            <input type="submit" name="qmk" value="Gửi">
            <input type="reset" value="Nhập lại">
        </form>

        <?= $message??"" ?>
        
    </article>
</body>
</html>