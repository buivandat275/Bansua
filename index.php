<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Milk - Danh mục sản phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
   body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .header {
            background-color: #ffcc00;
            padding: 10px;
            text-align: center;
            color: white;
            font-size: 24px;
        }
        .sidebar {
            background-color: #ff6600;
            padding: 10px;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .content {
            background-color: white;
            padding: 10px;
        }
        .footer {
            background-color: #003366;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 12px;
        }
        .product-table {
            width: 100%;
            border-collapse: collapse;
        }
        .product-table th, .product-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .product-table th {
            background-color: #ff6600;
            color: white;
        }
        .product-table img {
            width: 50px;
            height: auto;
        }
  </style>
</head>
<body>
<div class="header">
   <img alt="Happy Milk Logo" height="120" src="https://storage.googleapis.com/a1aa/image/wfQj41MTJJzHUCnRlevoOUhdewyup9mcN9TpYOGMa97Ei9dnA.jpg" width="100"/>
   <span>
    HÃY KHÁM PHÁ THẾ GIỚI SỮA
   </span>
  </div>
  <div class="container-fluid">
   <div class="row">
    <div class="col-md-2 sidebar">
     <h5 style="background-color: red;">
      Sản phẩm theo hãng sữa
     </h5>
     <ul>
      <li>
       <a href="#">
        Vinamilk
       </a>
      </li>
      <li>
       <a href="#">
        Nutifood
       </a>
      </li>
      <li>
       <a href="#">
        Abbott
       </a>
      </li>
      <li>
       <a href="#">
        Daisy
       </a>
      </li>
      <li>
       <a href="#">
        Dutch Lady
       </a>
      </li>
      <li>
       <a href="#">
        Dumex
       </a>
      </li>
      <li>
       <a href="#">
        Mead Johnson
       </a>
      </li>
     </ul>
     <h5 style="background-color: red;">
      Sản phẩm theo loại
     </h5>
     <ul>
      <li>
       <a href="#">
        Sữa đặc
       </a>
      </li>
      <li>
       <a href="#">
        Sữa tươi
       </a>
      </li>
      <li>
       <a href="#">
        Sữa chua
       </a>
      </li>
      <li>
       <a href="#">
        Sữa bột
       </a>
      </li>
     </ul>
     <img alt="Glass of milk and milk products" height="100" src="https://storage.googleapis.com/a1aa/image/Pv7tY77qZqrkM9BuzrCIfzuqfopeOnBeemlk3v4vtBtgI23dC.jpg" width="150"/>
    </div>
    <div class="col-md-10 content">
        
        <h2 class="my-4" style="text-align: center;">Danh Mục Sản Phẩm</h2>
        <a href="add_product.php" class="btn btn-primary mb-3">Thêm sản phẩm</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hình</th>
                    <th>Tên sữa</th>
                    <th>Trọng lượng (gr)</th>
                    <th>Đơn giá (VND)</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'db_connection.php';
                $result = $conn->query("SELECT * FROM products");
                while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><img src="<?= $row['image_url'] ?>" width="50"></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['weight'] ?></td>
                    <td><?= number_format($row['price'], 0, ',', '.') ?></td>
                    <td>
                        <a href="edit_product.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="delete_product.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        </div>
        </div>
    </div>
    <div class="footer">
   <p>
    © 2007 - 2008 Siêu thị sữa Happy Milk
   </p>
   <p>
    Địa chỉ: Số 16 Lbis Đường Nguyễn Du Quận 1 TP.HCM - Điện thoại: (08) 8741258
   </p>
   <p>
    <a href="mailto:happy_milk@milk.com.vn" style="color: white;">
     happy_milk@milk.com.vn
    </a>
   </p>
  </div>
</body>
</html>
