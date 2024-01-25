<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    *{
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
        font-size: 2vw;
    }

    .boxtitle{
        background-color: #EEE;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        color: #333;
        padding: 10px;
        border: 1px solid gray;
    }

    .boxcontent{
        /* border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px; */
        border: 1px solid gray;
        border-top: none;
        background-color: white;
        /* min-height: 100px; */
    }

    .contentbl ul{
    padding: 10px 30px;
    }

    .contentbl li{
        /* border-bottom: 1px solid red; */
        margin-top: 20px;
    }

    .contentbl li p {
        width: 60%;
        float: left;
        word-wrap: break-word;
    }

    .contentbl li h3 {
        width: 40%;
        float: right;
        text-align: right;
    }

    .footerbl{
        padding: 5px 10px;
        display: flex;
    }

    .footerbl>input{
        margin: 0px 5px;
    }

    .boxfooter{
        background-color: #EEE;
        color: #333;
        text-align: center;
        padding: 10px;
        border: 1px solid gray;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }
</style>

<body>

    <?php
        require_once __DIR__ . "./../../model/pdo.php";
        require_once __DIR__ . "./../../model/binhluan.php"; 
        session_start();
        $id_hh = $_GET["id_hh"];
        $bl = list_bl_hhct($id_hh);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["bl"]) && !empty($_POST["bl"])){
                if(!empty(trim($_POST["nd_bl"]))){
                    add_bl(trim($_POST["nd_bl"]),$_SESSION["user"][0]["id_kh"],$id_hh);
                    header("Location: binhluanform.php?id_hh={$id_hh}");
                }
            }
        }
    ?>

    <div>
        <div class="boxtitle">
            <h3>Bình luận</h3>
        </div>

        <div class="boxcontent contentbl">
            <ul>
                <?php
                    if(!empty($bl)){
                        foreach($bl as $temp){
                            echo"   <li>
                                    <p>{$temp['nd_bl']}</p>
                                    <h3>{$temp['hoten_kh']} &emsp;&emsp; {$temp['ngay_bl']}</h3>
                                    </li>
                            ";
                    }
                }
            ?>    
            </ul>        
        </div>

        <div class="footerbl boxfooter">
            <?php
                if(isset($_SESSION["dangnhap"]) && $_SESSION["dangnhap"] == true){
                    echo"
                        <form action='binhluanform.php?id_hh={$id_hh}' method='POST' class='footerbl'>
                            <input type='text' name='nd_bl'>
                            <input type='submit' name='bl' value='Gửi'>
                        </form>
                    ";
                }else{
                    echo "<p class='footerbl' style='color:red'>ĐĂNG NHẬP ĐỂ BÌNH LUẬN</p>";
                }
        ?>
        </div>
    </div>
</body>

</html>