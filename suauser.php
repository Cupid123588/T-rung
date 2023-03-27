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
                    $id = $_GET['id'];
                }

                $sqls = "SELECT*FROM user WHERE id = $id";
                $qr = $conn->query($sqls);
                $rows = $qr->fetch_array();

                if (isset($_POST['sua'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];

                    if ($user != "" && $pass != "" && $name != "" && $email != "") {
                        $sql = "UPDATE  user SET username='$user', password='$pass', name='$name', email='$email' WHERE id=$id";
                        $query = $conn->query($sql);
                        header("location: ../viewAdmin/admin.php");
                    }
                }
                $conn->close();
                ?>

                <form action="" method="POST" class="sua" style=" height: 490px;">
                    <h2>Sửa User</h2><br>
                    <label for="">User name</label><br>
                    <input type="text" placeholder="User name" name="user" required value="<?php echo $rows['username'] ?>"> <br><br>
                    <label for="">Password</label> <br>
                    <input type="text" placeholder="Password" name="pass" required value="<?php echo $rows['password'] ?>"><br> <br>
                    <label for="">Họ và tên</label><br>
                    <input type="text" placeholder="Họ và tên" name="name" required value="<?php echo $rows['name'] ?>"> <br><br>
                    <label for="">Email</label><br>
                    <input type="email" placeholder="Email" name="email" required value="<?php echo $rows['email'] ?>"> <br><br>
                    <input type="submit" value="Cập Nhập" name="sua">
                </form>

            </main>
        </div>
    </div>
</body>

</html>