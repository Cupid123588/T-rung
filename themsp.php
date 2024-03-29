<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/viewad.css">
    <link rel="stylesheet" href="../css/batloi.css">
    <link rel="stylesheet" href="../fontawesome-free-6.0.0-web/css/all.min.css">
</head>

<body>
    <div class="admin">
        <header>
            <div class="tren">

                <h2>We come Admin</h2>
                <nav>
                    <ul>
                        <li><a href="../viewAdmin/admin.php"><i class="fa-solid fa-house-user"></i> Trang Chủ</a></li>
                        <li><a href="../viewAdmin/logout.php"><i class="fa-solid fa-power-off"></i> Đăng Xuất</a></li>
                    </ul>
                </nav>
            </div>
            <nav class="duoi">
                <ul>
                    <li class="title">
                        <h3>Admin Menu</h3>
                    </li>
                    <li class="chon"><a href="../viewAdmin/danhmuc.php">Danh Mục</a></li>
                    <li class="chon"><a href="../viewAdmin/sanpham.php">Sản Phẩm</a>
                    </li>
                    <li class="chon"><a href="">Tin Tức</a></li>
                    <li class="chon"><a href="">Đơn Hàng</a></li>
                </ul>
            </nav>
        </header>
        <div class="main">
            <main>
             
<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "asm";

     $conn = new mysqli($servername, $username, $password, $dbname);

    if(isset($_POST['them'])){
        $tensp = $_POST['tensp'];
        $hinh = $_FILES['hinh']['name'];
        $hinh_tmp = $_FILES['hinh']['name_tpm'];
        $gia = $_POST['gia'];
        $xuatxu = $_POST['xuatxu'];
        $quycach = $_POST['quycach'];
        $danhmuc = $_POST['danhmuc'];

        if( $tensp !="" && $hinh !="" && $gia !="" && $xuatxu !="" && $quycach !=""){
            $sql = "INSERT INTO sanpham(tensp, hinh, gia, xuatxu, quycach,iddanhmuc) 
            VALUES('$tensp','$hinh','$gia','$xuatxu','$quycach','$danhmuc')";
            $query = $conn->query($sql);
            move_uploaded_file($hinh_tmp,'images/'.$hinh);
            header("location: ../viewAdmin/sanpham.php");
        }
    }
?>
 <form action="" method="POST" class="sua" enctype="multipart/form-data" onsubmit="return KiemTra()" style=" height: 450px">
                    <h2>Thêm sản phẩm</h2>

                    <input type="text" id="tensp" placeholder="Tên Sản Phẩm" name="tensp" require><br>
                    <div id="loi1" class="loi"></div>
                    <input type="text" id="gia" placeholder="Giá Sản Phẩm" name="gia" require><br>
                    <div id="loi2" class="loi"></div>
                    <input type="text" id="xuatxu" placeholder="Nơi Xuất Xứ" name="xuatxu" require><br>
                    <div id="loi3" class="loi"></div>
                    <input type="text" id="donggoi" placeholder="Quy Cách Đóng Gói" name="quycach" require><br>
                    <div id="loi4" class="loi"></div>
                    <input type="text" id="danhmuc" placeholder="Id danh mục" name="danhmuc" require><br>
                    <div id="loi5" class="loi"></div>
                    <input type="file" id="hinh" name="hinh">
                    <div id="loi6" class="loi"></div>
                    <input type="submit" value="Thêm Sản Phẩm" name="them">
                </form>
<?php
    $conn->close();
?>

            </main>
        </div>
    </div>
</body>

</html>
<script src="../js/batloiadd.js"></script>