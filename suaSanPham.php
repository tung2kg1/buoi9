<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>

    <?php
    require('ketNoiDatabase1.php');
    $masp = $_GET['id'];
    $sql = "SELECT * FROM sanpham WHERE masp = '$masp'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    $img = $row['imgURL'];  

    require('ketNoiDatabase1.php'); 


    if (isset($_POST['submit'])) {
        $tensp = $_POST["tensp"];
        $giagoc = $_POST["giagoc"];
        $giagiam = $_POST["giagiam"];
        $phantramgiamgia = $_POST["phantramgiamgia"];
        $hinhanh = $_FILES["hinhanh"]["name"];
        $target_dir = "./images/";

        if ($hinhanh) {

            if (file_exists("./images/" . $img)) {
                unlink("./images/" . $img);
            }

            $target_file = $target_dir . $hinhanh;

            move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
        } else {

            $target_file = $target_dir . $img;
            $hinhanh = $img;
        }

        if (isset($tensp) && isset($giagoc) && isset($giagiam) && isset($phantramgiamgia) && isset($hinhanh)) {
            $sql = "UPDATE sanpham SET `tensp` = '$tensp', `giagoc` = '$giagoc', `giagiam` = '$giagiam', `phantramgiamgia` = '$phantramgiamgia', `imgURL` = '$hinhanh' WHERE sanpham.masp = '$masp'";
            mysqli_query($conn, $sql);

            header("Location: index.php");
        }
    }
    ?>
<div class="container">
    <h3 class="title">Cập nhật sản phẩm</h3>

    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label for="tensp">Tên sản phẩm</label>  
            <input type="text" id="tensp" name="tensp" value="<?= $row["tensp"] ?>">
        </div>
        <div>
            <img src="./images/<?= $row["imgURL"] ?>" alt="">
        </div>
        <div>
            <label for="file">Hình ảnh</label>
            <input type="file" id="file" name="hinhanh" value="Choose File">
        </div>
        <div>
            <label for="giagoc">Giá cũ</label>
            <input type="text" id="giagoc" name="giagoc" value="<?= $row["giagoc"] ?>">
        </div>
        <div>
            <label for="giagiam">Giá mới</label>
            <input type="text" id="giagiam" name="giagiam" value="<?= $row["giagiam"] ?>">
        </div>
        <div>
            <label for="phantramgiamgia">Giá mới</label>
            <input type="text" id="phantramgiamgia" name="phantramgiamgia" value="<?= $row["phantramgiamgia"] ?>">
        </div>
        <input class="btn primary" type="submit" name="submit" value="Cập nhật">
        <a href="index.php"><input type="button" value="Hủy" class="cancel"></a>
        </div>
</form>   
</body>
</html>