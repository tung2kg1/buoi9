<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <?php
    require('ketNoiDatabase1.php');
    $sql = "SELECT * FROM sanpham";
    $query = mysqli_query($conn, $sql);
    ?>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center">DANH MỤC SẢN PHẨM LAPTOP</h1>

        <a class="btn primary" href="themSanPham.php">Thêm sản phẩm</a>
        <div class="product-grid">
            <?php
                while ($row = mysqli_fetch_array($query)) {
            ?>
            <div class="product-card">
                <div class="product">
                        <?php if (isset($row["imgURL"]) && $row["imgURL"] != null && file_exists("./images/" . $row["imgURL"])) { ?>
                            <img style="width: 400px; height: 300px" src="./images/<?= $row["imgURL"] ?>" alt="">
                        <?php }?>
                        <p><?= $row["tensp"] ?></p>
                        <div class="discount"> 
                            <span class="og-price"><?= $row["giagoc"] ?>&nbsp;VNĐ</span>
                            <span class="discount-percent"> <?= $row["phantramgiamgia"] ?>&nbsp;%</span>
                        </div>
                        <p class="giagiam"><?= $row["giagiam"] ?>&nbsp;VNĐ</p>
                        <button class ="btn primary"><a style="color: white; text-decoration: none" href="suasanpham.php?id=<?= $row['masp'] ?>">Sửa</a></button>
                        <button class="btn danger"><a style="color: white; text-decoration: none" onclick="return xoasanpham()" href="xoasanpham.php?id=<?= $row['masp'] ?>">xóa</a></button>
                        </div></a>
            </div>
            <?php } ?> 
        </div>
    </div>
               
    </div>
</body>
</html>