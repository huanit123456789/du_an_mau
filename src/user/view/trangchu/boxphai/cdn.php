
<div class="boxphai">
    <div class="row mb">
        <div class="boxtitle">TÀI KHOẢN</div>
        <div class="boxcontent formtaikhoan">
            <form action="index.php" method="POST">
                <div class="row">
                    <div><label for="tk">Tên đăng nhập</label></div>
                    <?= $tkErr??"" ?>
                    <div><input type="text" name="tk" id="tk" value="<?= $_POST["tk"]??"" ?>"></div>
                </div>

                <div class="row">
                    <div><label for="mk">Mật khẩu</label></div>
                    <?= $mkErr??"" ?>
                    <div><input type="password" name="mk" id="mk"></div>
                </div>

                <div class="row">
                    <input type="checkbox" name="cookies" id="cookies" value="hihi">
                    <label for="cookies">Ghi nhớ tài khoản ?</label>
                </div>

                <div class="row">
                    <button type="submit" value="dn" name="dn">Đăng nhập</button>
                </div>

            </form>

            <?= $message??"" ?>

            <ul>
                <li><a href="index.php?act=tk&a=qmk">Quên mật khẩu</a></li>
                <li><a href="index.php?act=tk">Đăng ký thành viên</a></li>
            </ul>
        </div>
    </div>

    

    