<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Xử lý tải ảnh lên
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

    // Kiểm tra kích thước file
    if ($_FILES["image"]["size"] > 500000) { // Giới hạn 500KB
        echo "Xin lỗi, file của bạn quá lớn.";
        $uploadOk = 0;
    }

    // Chỉ cho phép các định dạng JPG, PNG, JPEG, GIF
    if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
        echo "Chỉ chấp nhận các định dạng JPG, JPEG, PNG & GIF.";
        $uploadOk = 0;
    }

    // Kiểm tra nếu có lỗi xảy ra khi upload
    if ($uploadOk == 0) {
        echo "Xin lỗi, file của bạn không được tải lên.";
    } else {
        // Lưu file vào thư mục "uploads"
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // File đã được upload thành công, lưu thông tin vào database
            $name = $_POST['name'];
            $weight = $_POST['weight'];
            $price = $_POST['price'];

            // Thêm đường dẫn file ảnh vào database
            $sql = "INSERT INTO products (image_url, name, weight, price) VALUES ('$target_file', '$name', $weight, $price)";
            if ($conn->query($sql) === TRUE) {
                header("Location: index.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Xin lỗi, đã xảy ra lỗi khi tải file của bạn.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">
        <h2>Thêm Sản Phẩm</h2>
        <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
    <label>Hình ảnh:</label>
    <input type="file" name="image" class="form-control" accept="image/*" required>
</div>

            <div class="form-group">
                <label>Tên sữa:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Trọng lượng (gr):</label>
                <input type="number" name="weight" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Đơn giá (VND):</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </form>
    </div>
</body>
</html>
