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
                if (isset($_POST['them'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];

                    if ($username != "" && $password != "" && $name != "" && $email != "") {
                        $sql = "INSERT INTO user(username, password, name, email) 
                        VALUES('$username','$password','$name','$email')";
                        $query = $conn->query($sql);
                        header("location: ../viewAdmin/admin.php");
                    }
                }
                ?>
                <form action="" method="POST" class="sua" onsubmit="return KiemTraUser()">
                    <h2>Thêm User</h2>
                    <input type="text" placeholder="Username" name="username" id="username" require><br>
                    <div id="loi1" class="loi"></div>
                    <input type="text" placeholder="Password" name="password" id="password" require><br>
                    <div id="loi2" class="loi"></div>
                    <input type="text" placeholder="Name" name="name" id="name" require><br>
                    <div id="loi3" class="loi"></div>
                    <input type="email" placeholder="Email" name="email" id="email" require><br>
                    <input type="submit" value="Thêm" name="them">
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