<!--phai: hanh dong  -->
<div class="boxphai">
    <div class="row mb">
        <div class="boxtitle">TÀI KHOẢN</div>
        <div class="boxcontent formtaikhoan">
            <div class="row mb">
                <h3>Xin chào: <?= $_SESSION["user"][0]["hoten_kh"] ?></h3>
            </div>

            <div class="row">
                <ul>
                    <!-- <li><a href="index.php?act=tk&a=qmk">Quên mật khẩu</a></li> -->

                    <?php
                        if($_SESSION["user"][0]["vaitro_kh"] == 2){
                            echo "
                                <li><a href='./admin/index.php'>Admin</a></li>
                            ";
                        }
                    ?>

                    <li><a href="index.php?act=tk&a=update&id_kh=<?= $_SESSION['user'][0]['id_kh'] ?>">Cập nhật tài khoản</a></li>
                    <li><a href="index.php?act=tk&a=logout">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </div>

    

    