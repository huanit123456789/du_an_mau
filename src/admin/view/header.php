<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>ADMIN X Shop</title>
</head>


<script>
    function selectAll(){
        var checkbox =  document.getElementsByClassName("checkbox");
        for(var i = 0; i < checkbox.length; i++){
            checkbox[i].checked = true;
        }
    }

    function unselectAll(){
        var checkbox =  document.getElementsByClassName("checkbox");
        for(var i = 0; i < checkbox.length; i++){
            checkbox[i].checked = false;
        }
    }

    function deleteSelect(text,id){
        var checkbox =  document.getElementsByClassName("checkbox");
        var deletebox = [];
        for(var i = 0; i < checkbox.length; i++){
            if(checkbox[i].checked == true ){
                deletebox.push(checkbox[i].defaultValue);
                // console.log(deletebox);
            }
        }
        if(confirm("Bạn có muốn xóa không?")){
            window.location.href= `index.php?${text}&a=deletesl&array=${deletebox}&id_dm=${id}`; 
        }   
    }
</script>

<body>
    <!-- container ~ body -->

    <!-- HEADER -->
    <header class="row mb">
        <h1>SIÊU THỊ TRỰC TUYẾN</h1>
    </header>


    <!-- MENUN -->
    <nav class="row mb">
        <ul>
            <li><a id="m1" href="index.php">Trang chủ</a></li>
            <li><a id="m2" href="index.php?act=dm">Danh mục</a></li>
            <li><a id="m3" href="index.php?act=hh">Hàng hóa</a></li>
            <li><a id="m4" href="index.php?act=kh">Khách hàng</a></li>
            <li><a id="m5" href="index.php?act=bl">Bình luận</a></li>
            <li><a id="m6" href="index.php?act=tk">Thống kê</a></li>
            <li><a id="m7" href="../index.php">Shop</a></li>
        </ul>
    </nav>