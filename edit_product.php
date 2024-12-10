<?php
require 'db_connection.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id = $id");
$product = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];
    
    // Kiểm tra xem người dùng có chọn ảnh mới không
    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra file có phải là ảnh không
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File không phải là hình ảnh.";
            $uploadOk = 0;
        }

        // Kiểm tra kích thước file (giới hạn 500KB)
        if ($_FILES["image"]["size"] > 500000) {
            echo "Xin lỗi, file của bạn quá lớn.";
            $uploadOk = 0;
        }

        // Chỉ cho phép các định dạng JPG, PNG, JPEG, GIF
        if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            echo "Chỉ chấp nhận các định dạng JPG, JPEG, PNG & GIF.";
            $uploadOk = 0;
        }

        // Nếu không có lỗi khi upload ảnh
        if ($uploadOk == 1 && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Xóa ảnh cũ (nếu có)
            if (!empty($product['image_url']) && file_exists($product['image_url'])) {
                unlink($product['image_url']);
            }
            
            // Cập nhật đường dẫn ảnh mới vào database
            $image_url = $target_file;
        } else {
            echo "Xin lỗi, đã xảy ra lỗi khi tải file của bạn.";
        }
    } else {
        // Nếu không chọn ảnh mới, giữ nguyên ảnh cũ
        $image_url = $product['image_url'];
    }

    // Cập nhật cơ sở dữ liệu với thông tin mới
    $sql = "UPDATE products SET image_url='$image_url', name='$name', weight=$weight, price=$price WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Sửa Sản Phẩm</h2>
        <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
    <label>Hình ảnh:</label>
    <input type="file" name="image" class="form-control" accept="image/*">
    <!-- Hiển thị ảnh hiện tại -->
    <div style="margin-top: 10px;">
        <p>Ảnh hiện tại:</p>
        <img src="<?= $product['image_url'] ?>" alt="Current Image" width="100">
    </div>
</div>
            
            <div class="form-group">
                <label>Tên sữa:</label>
                <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" required>
            </div>
            <div class="form-group">
                <label>Trọng lượng (gr):</label>
                <input type="number" name="weight" class="form-control" value="<?= $product['weight'] ?>" required>
            </div>
            <div class="form-group">
                <label>Đơn giá (VND):</label>
                <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</body>
</html>
