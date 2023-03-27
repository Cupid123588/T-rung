<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nam An Market</title>
    <link rel="stylesheet" href="../css/dangnhapad.css">
    <link rel="stylesheet" href="../fontawesome-free-6.0.0-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../js/index.js"></script>
    <script src="../js/kiemtra.js"></script>

</head>

<body style="background: url('images/bg_login.jpg');">

        <div class="main" style="background: white">
            <main>


                <?php
                session_start();
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "asm";


                $conn = new mysqli($servername, $username, $password, $dbname);
                if (isset($_POST['username']) && isset($_POST['password'])) {

                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    if(empty($username)){
                        header("Location: dangnhapadmin.php?error=Username and Password is required");
                        exit();
                    }else if(empty($password)){
                        header("Location: dangnhapadmin.php?error=Password is required");
                        exit();
                    }else{
                    $sql = "SELECT*FROM admin WHERE username='$username' AND password='$password'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        if ($_POST['username'] === $username && $_POST['password'] === $password) {
                            $_SESSION['username'] =  $username;
                            header('location: ../viewAdmin/admin.php?page_layout=admin&id=' . $row['id'] . '');
                            exit();
                        }
                    } else {
                        header("Location: dangnhapadmin.php?error=Incorect User name of Password");
                        exit();
                    }
                }
                }

                ?>

                <form action="dangnhapadmin.php" method="POST" class="sua">
                    <h2>Đăng nhập trang admin</h2><br>
                    <?php
                    if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <label for="">User name</label><br>
                    <input type="text" placeholder="User name" name="username"> <br><br>
                    <label for="">Password</label> <br>
                    <input type="password" placeholder="Password" name="password"><br> <br>
                    <input type="submit" value="Đăng Nhập" name="login">
                </form>


            </main>
        </div>

    </div>
</body>
</html>