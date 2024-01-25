<article class="row">

        <div class="row headerdm mb">
            <h1>THÊM MỚI DANH MỤC</h1>
        </div>

        <div class="row">
            <form action="index.php?act=dm" method="POST">
                <div>
                    <div>
                        <label for="id_dm">Mã loại</label>
                    </div>
                    <div>
                        <input type="text" name="id_dm" id="id_dm" placeholder="auto number" disabled>
                    </div>
                </div>

                <div>
                    <div>
                        <label for="ten_dm">Tên loại</label>
                        <?= $ten_dmErr??""; ?>
                    </div>
                    <div>
                        <input type="text" name="ten_dm" id="ten_dm" value="<?= $_POST['ten_dm']??"" ?>">
                    </div>
                </div>

                <?= $message??""; ?>

                <div class="row">
                    <input type="submit" name="add" value="Gửi">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=dm&a=list"><input type="button" value="Danh sách"></a>
                </div>
            </form>
        </div>
    </article>
</body>
</html>