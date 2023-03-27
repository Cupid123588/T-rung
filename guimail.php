<link rel="stylesheet" href="../css/cartt.css">
<?php
include "../Inc/config.php";
include "../Inc/header.php";
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = [];

if (isset($_GET['delid']) && ($_GET['delid'] >= 0)) {
    array_splice($_SESSION['giohang'], $_GET['delid'], 1);
}
if (isset($_POST['addcart'])) {
    $hinh = $_POST['hinh'];
    $ten = $_POST['tensp'];
    $gia = $_POST['gia'];
    $sp = [$hinh, $ten, $gia];
    $_SESSION['giohang'][] = $sp;
}

function showcart()
{
    if (isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))) {
        $tong = 0;
        for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
            $tong += $_SESSION['giohang'][$i][2];
            echo '
                        <tr>
                            <td>' . ($i + 1) . '</td>
                            <td><img src="../images/' . $_SESSION['giohang'][$i][0] . '" alt=""></td>
                            <td>' . $_SESSION['giohang'][$i][1] . '</td>
                            <td>' . $_SESSION['giohang'][$i][2] . '</td>
                            <td><a href="cart.php?delid=' . $i . '"><i class="fa-solid fa-trash"></i> </a></td>
                        </tr>
                ';
        }
        echo '
                    <tr>
                        <th colspan="4">Tổng Tiển </th>
                        <th class="tong">' . $tong . ' VNĐ</th>
                    </tr>
        ';
    }
}
// if( (time() - $_SESSION['last_login_timecart']) > 60){  
//     unset($_SESSION['giohang']);
//     header('location: ../index.php');
// }else{
// }
?>
<div class="guimail" style="display: none;">
    <?php

    include '../PHPMailer-master/src/Exception.php';
    include '../PHPMailer-master/src/PHPMailer.php';
    include  '../PHPMailer-master/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'nguyenquanghuy19062002@gmail.com';
        $mail->Password = 'huydeptrai19062002';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet  = "utf-8";

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "asm";
        $conn = new mysqli($servername, $username, $password, $dbname);




        $mail->setFrom('huydeptrai19062002@gmail.com', 'An Nam Market');
        $mail->addAddress($_SESSION['email'], $_SESSION['name']);
        $mail->isHTML(true);
        $mail->Subject = 'An Nam Market Xác nhận đơn hàng';
        $mail->Body = 'Xin chào, <b>' . $_SESSION['name'] . '</b>. 
        Chúng tôi đã nhận được đơn hàng của bạn.<br> Đây là thông tin tài khoản của bạn.<br> 
        <b>Username:</b> ' . $_SESSION['username'] . '<br>
        <b>Email:</b> ' . $_SESSION['email'] . ' <br><br>

        <b>Nguyễn Quang Huy</b><br>
        <b>AN NAM MARKET</b><br>
        ';
        $mail->addAttachment('../images/logoFooter-removebg-preview.png');
        $mail->AltBody='Day la mail cua An Nam Market';
        $mail->send();
        echo '<script>alert("Đơn hàng đã được đặt thành công")</script>';
    } catch (Exception $e) {
        echo '<script>alert("Đặt đơn hàng thất bại")</script>';
    }

    ?>
</div>

<div class="container" style="display: block;">
    <h2 style="padding-top:20px; padding-bottom: 20px">Giỏ hàng của bạn</h2>
    <table>
        <tr>
            <th>STT</th>
            <th>Hình Sản phẩm</th>
            <th>Tên Sản phẩm</th>
            <th>Giá Sản phẩm</th>
            <th></th>
        </tr>
        <?php showcart(); ?>

    </table>
    <div class="set" style="display: flex; justify-content: center;">
        <a href="../index.php" style="margin-right: 10px;"><button>Tiếp Tục đặt hàng</button></a>
        <a href="guimail.php"><button>Đặt Hàng</button></a>
    </div>
</div>


</div>
<div class="indexShip"></div>
<?php
include "../Inc/footer.php";
?>
