<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/viewad.css">
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

                if (isset($_GET['id'])) {
                    $iddanhmuc = $_GET['id'];
                }

                $sqls = "SELECT*FROM danhmuc WHERE iddanhmuc = $iddanhmuc";
                $qr = $conn->query($sqls);
                $rows = $qr->fetch_array();

                if (isset($_POST['sua'])) {
                    $tendm = $_POST['name'];
                    $link = $_POST['link'];

                    if ($tendm != "" && $link != "" ) {
                        $sql = "UPDATE  danhmuc SET tendanhmuc='$tendm', link='$link' WHERE iddanhmuc=$iddanhmuc";
                        $query = $conn->query($sql);
                        header("location: ../viewAdmin/danhmuc.php");
                    }
                }
                $conn->close();
                ?>

                <form action="" method="POST" class="sua">
                    <h2>Sửa Danh Mục</h2><br>
                    <label for="">Tên Danh Mục</label><br>
                    <input type="text" placeholder="User name" name="name" required value="<?php echo $rows['tendanhmuc'] ?>"> <br><br>
                    <label for="">Đường link Danh Mục</label> <br>
                    <input type="text" placeholder="Link" name="link" required value="<?php echo $rows['link'] ?>"><br> <br>
                    <input type="submit" value="Cập Nhập" name="sua">
                </form>

            </main>
        </div>
    </div>
</body>

</html>