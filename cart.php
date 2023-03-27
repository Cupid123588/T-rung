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
        <a href="../index.php"  style="margin-right: 10px;"><button>Tiếp Tục đặt hàng</button></a>
        <a href="guimail.php"><button>Đặt Hàng</button></a>
    </div>
</div>


</div>
<div class="indexShip"></div>
<?php
include "../Inc/footer.php";
?>