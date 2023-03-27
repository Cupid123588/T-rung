<link rel="stylesheet" href="../css/suathongtin.css">
<?php
    include "../Inc/header.php";
?>

<div class="container" style="margin-top: 200px;">
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
            echo '  <script>alert("Cập nhập user thành công")</script>';
        }else{
            echo '  <script>alert("Cập nhập user Thất Bại")</script>';
        }
    }

    ?>

<form action="" method="POST" class="sua" >
        <h2>Sửa User</h2><br>
        <label for="">User name</label><br>
        <input type="text" placeholder="User name" name="user" required value="<?php echo $rows['username'] ?>"> <br><br>
        <label for="">Password</label> <br>
        <input type="password" placeholder="Password" name="pass" required value="<?php echo $rows['password'] ?>"><br> <br>
        <label for="">Họ và tên</label><br>
        <input type="text" placeholder="Họ và tên" name="name" required value="<?php echo $rows['name'] ?>"> <br><br>
        <label for="">Email</label><br>
        <input type="email" placeholder="Email" name="email" required value="<?php echo $rows['email'] ?>"> <br><br>
        <input type="submit" value="Cập Nhập" name="sua">
    </form>


    </main>
</div>

</div>
<div class="indexShip"></div>
<?php
include "../Inc/footer.php";
?>