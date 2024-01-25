<article class="row">

        <div class="row headerdm mb">
            <h1>CẬP NHẬT DANH MỤC</h1>
        </div>

        <div class="row">
            <form action="index.php?act=dm&a=update&id_dm=<?=$dm['id_dm']?>" method="POST">
                <div>
                    <div>
                        <label for="">Mã loại</label>
                    </div>

                    <div>
                        <input type="text" value=" <?= $dm['id_dm']?>" disabled>
                    </div>  
                </div>

                <div>
                    <div>
                        <label for="ten_dm">Tên loại</label>
                        <?= $ten_dmErr??""; ?>
                    </div>
                    <div>
                        <input type="text" name="ten_dm" id="ten_dm" value="<?php if(isset($_POST["ten_dm"])){ echo $_POST["ten_dm"]; }else{ echo $dm["ten_dm"]; } ?>">
                    </div>
                </div>

                <?= $message??""; ?>

                <div class="row">
                    <input type="submit" name="update" value="Cập nhật">
                    <input type="reset" value="Nhập lại">
                    <a href="index.php?act=dm&a=list"><input type="button" value="Danh sách"></a>
                </div>
            </form>
        </div>
    </article>
</body>
</html>