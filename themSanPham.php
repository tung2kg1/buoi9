<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="add.css">
<?php
    require("ketNoiDatabase1.php");

    if (isset($_POST["submit"])) {
        
            $tensp = $_POST["ten"];
            $giagoc = $_POST["giagoc"];
            $giagiam = $_POST["giagiam"];
            $phantramgiamgia = $_POST["phantramgiamgia"];
            $hinhanh = $_FILES["hinhanh"]["name"];
            
            // Tạo thư mục lưu ảnh, lưu ý tạo thư mục "images" bên ngoài trước
            $target_dir = "./images/";
            // Tạo đường dẫn đến file
            $target_file = $target_dir . $hinhanh;     
        //&& isset($hinhanh)
            // Kiểm tra các trường thông tin
        if (isset($tensp) && isset($giagoc) && isset($giagiam) && isset($phantramgiamgia) && isset($hinhanh) ) {
                move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
            
                $sql = "INSERT INTO sanpham (masp, tensp, giagoc, giagiam, phantramgiamgia, imgURL) 
                                VALUES (NULL, '$tensp', '$giagoc', '$giagiam', '$phantramgiamgia', '$hinhanh')";
                
                mysqli_query($conn, $sql);

                echo "<script>alert('Bạn đã thêm thành công')</script>";
                header("Location: index.php");
            }
        
    }
?>
</head>

<body>
    <div class="container">
    <h3 class="title">THÊM MỚI SẢN PHẨM</h3>
        <form action="" method="POST"  enctype="multipart/form-data">
            <div>
                <label for="ten"> Tên sản phẩm</label>
                <input type="text" id="ten" name="ten" required>
            </div>
            <div>
                <label for="hinhanh">Hình sản phẩm</label> <br>
                <input id="hinhanh" type="file" name="hinhanh" value="Choose File" required>
            </div>
            <div>
                <label for="giagoc">Giá cũ</label>
                <input type="text" id="giagoc" name="giagoc" required>
            </div>
            <div>
                <label for="giagiam">Giá giảm</label>
                <input type="text" id="giagiam" name="giagiam" required>
            </div>
            <div>
                <label for="phantramgiamgia">Phần trăm giảm giá</label>
                <input type="text" id="phantramgiamgia" name="phantramgiamgia">
            </div>
                <button class="submit" type="submit" name="submit">Thêm mới</button>
                <a href="index.php"><input type="button" value="Hủy" class="cancel"></a>
        </form>
    </div>
</body>
</html>