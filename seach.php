<link rel="stylesheet" href="../css/ad_seach.css">
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "asm";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if(isset($_POST['timkiem'])){
      $tukhoa=$_POST['tukhoa'];
  }

  $sql = "SELECT*FROM sanpham WHERE sanpham.tensp LIKE '%".$tukhoa."%'";
  $qr = $conn->query($sql);
 
?>
<h2>Từ khóa tìm kiếm: 
    <?php $_POST['tukhoa']?></h2>
    <form action="layout_tim.php" id="tim" method="POST">
                            <div class="tim">
                                <input type="text" name="tukhoa" placeholder="Tìm Kiếm sản phẩm">
                                <input id="timkiem" type="submit" name="timkiem" value="Tìm kiếm"></i>
                            </div>
                         
                        </form>
    <ul>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["tukhoa"];
            if ($name == "") {
            } else {

                $query = "SELECT*FROM sanpham WHERE tensp LIKE '%$name%'";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    echo "<h3 style= margin-left:30px;>Kết quả tìm kiếm: " . $name . "</h3>";

                    while ($row = $qr->fetch_assoc()) {
                        echo "<table >";
                           
                                echo '
                                    <tr>
                                        <td>'. $row['id'] .'</td>
                                        <td><img src="../images/' . $row['hinh'] . '" alt=""></td>
                                        <td colspan="3">' . $row['tensp'] . '</td>
                                        <td>' . $row['gia'] . 'đ</td>
                                        <td>' . $row['xuatxu'] . '</td>
                                        <td colspan="2">' . $row['quycach'] . '</td>
                
                                        <td class="ad"><a href="../ad/suasp.php?page_layout=sua&id=' . $row['id'] . '"> <i class="fa-solid fa-pen"></i> </a></td>
                                        <td class="ad"><a href="../ad/xoasp.php?page_layout=xoa&id=' . $row['id'] . '"> <i class="fa-solid fa-trash"></i> </a></td>
                                    </tr>
                                    ';
                                    echo "</table>";
                        }
                    }else {
                        echo "<h3 style= margin-left:30px;>Không tìm Thấy Kết quả: " . $name . " </h3>";
                    }
                }
                
            }
           

                
         
        ?>
    </ul>
    
</div>