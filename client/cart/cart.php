<?php
session_start();

if (!isset ($_SESSION ['cart'])) {
    $_SESSION ['cart'] = [] ;
}
// Them vao gio hang
if (isset ($_POST ['addcart'])) {
    $id = $_POST ['id'] ;
    $name = $_POST ['name'] ;
    $thumbnail = $_POST ['thumbnail'] ;
    $price = $_POST ['price'] ;
    $sale_price = $_POST ['sale_price'] ; 
    $qty = 1 ;
    $product = [
        'id' => $id ,
        'name' => $name ,
        'thumbnail' => $thumbnail ,
        'price' => $price ,
        'sale_price' => $sale_price ,
        'qty' => $qty 
    ] ;
    $found = false ;
    if (isset ($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $productId) {
            if ($id == $productId['id']) {
                $_SESSION['cart']["$id"]['qty']++ ;
                $found = true ; 
                break ;
            }
        }
}
if (!$found) {
    $_SESSION['cart']["$id"] = $product ;
}
header ('location: cart.php') ;
}


if (isset($_SESSION['cart'])) {
    if (isset($_POST['removecart'])) {
        $id = $_POST['removecart'] ;
        foreach ($_SESSION['cart'] as $productId) {
            if ($id == $productId['id']) {
                unset($_SESSION['cart']["$id"]) ;
                header('Location: cart.php') ;
                break ;
            }
        }
    }
}



if (isset($_SESSION['cart'])) {
    if (isset($_POST['editcart'])) {
        $id = $_POST['id'];
        
        $qtyedit = $_POST['editqty'];
        echo $qtyedit;
        foreach ($_SESSION['cart'] as $productId) {
            if ($id == $productId['id']) {
                $_SESSION['cart']["$id"]['qty'] = $qtyedit ;
                break ;
            }
        }
       
    }
    // header('Location: cart.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">   
    <title>CHI TIẾT</title>
    <script src="https://kit.fontawesome.com/91f424987f.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/header.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <link rel="stylesheet" href="../../../css/chitiet.css">
    <link rel="stylesheet" href="../../../css/animation.css">
</head>
<body>
    <div class="menu-bars">
        <div class="close">
            <i class="fa-solid fa-circle-xmark"></i>
        </div>
        <div class="menu-left">
            <ul>
                <li><a href="index.html">CHIN MILKTEA & MACCHIATO</a></li>
                <li class="chevron"><a href="vechungtoi.html">VỀ CHÚNG TÔI </a><span class="menu-con-1"><i class="fa-solid fa-chevron-down"></i></span>
                <ul class="ul-before">
                    <li><a href="vechungtoi.html">KHỞI NGUỒN THƯƠNG HIỆU</a></li>
                    <li><a href="">TRÁCH NHIỆM CỘNG ĐỒNG</a></li>
                    <li><a href="">LẮNG NGHE VÀ THẤU HIỂU</a></li>
                </ul>
                </li>
                <li><a href="sanpham.html">SẢN PHẨM</a></li>
                <li class="chevron"><a href="tintuc.html">TIN TỨC</a><span ><i class="fa-solid fa-chevron-down"></i></span></li>
                <li><a href="cuahang.html">Giỏ Hàng</a></li>
            </ul>
        </div>
    </div>
    <header class="haeder-2">
        <nav>
          <img src="../../img/logo.png" alt="">
            <ul>
                <li><a href="#" class="active">CHIN - MIKLTEA & MACCHIATO</a></li>
                <li><a href="../sanphamtest.php?categori=0">SẢN PHẨM</a></li>
                <li><a href="cart.php">Giỏ Hàng</a></li>
                <li><a href="tintuc.html">TIN TỨC</a></li>
                <li><a href="../users/dangnhap.php">ĐĂNG NHẬP</a></li>
            </ul>
            <div class="icon-menu">
            <i class="fa-solid fa-bars"></i>
            </div>
        </nav>
    </header>
    <div class="banner-2" style="background-image: url(../../img/banner-2.jpg);">
        <div class="title-banner">
            <h1 class="ckeck-height botoom-top-100 delay-1">CHI TIẾT SẢN PHẨM</h1>
        </div>
    </div>

<div class="container px-3 my-5 clearfix">
  <div class="card">
    <div class="card-header bg-primary text-light">
      <h2>Giỏ hàng</h2>
    </div>
    <div class="card-body">
      <form action="cart.php" method="post">
        <div class="table-responsive">
          <table class="table table-bordered m-0">
            <thead>
              <tr>
                <th class="text-left py-3 px-4" style="min-width: 400px;">Thông tin chi tiết sản phẩm</th>
                <th class="text-right py-3 px-4" style="width: 100px;">Giá</th>
                <th class="text-center py-3 px-4" style="width: 120px;">Số lượng</th>
                <th class="text-right py-3 px-4" style="width: 100px;">Tổng</th>
                <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset ($_SESSION['cart'])) : ?>
                <?php
                  $total_product = 0 ;
                  $total_bill = 0 ;
                ?>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                  <?php
                    $total_product = ($item['sale_price'] * $item['qty']) ;
                    $total_bill += $total_product ;
                  ?>
                  <tr>
                    <td class="p-4">
                      <div class="media align-items-center">
                        <img src="../<?= $item['thumbnail'] ?>"  class="d-block ui-w-40 ui-bordered mr-4" width="50" alt="">
                        <div class="media-body">
                          <a href="#" class="d-block text-dark text-decoration-none"><?= $item['name'] ?></a>
                        </div>
                      </div>
                    </td>
                    <td class="text-right font-weight-semibold align-middle p-4"><?= $item['sale_price'] ?></td>
                    <td class="text-right font-weight-semibold align-middle p-4"><input name="editqty" type="text" class="form-control text-center" value="<?= $item['qty'] ?>"></td>
                    <td class="text-right font-weight-semibold align-middle p-4"><?= number_format ($total_product , 0 , "," , ".") ?? '' ?></td>
                    <td class="text-center align-middle px-0"><button type="submit" name="removecart" value="<?= $item['id'] ?>" class="shop-tooltip close float-none text-light btn btn-danger">x</button></td>
                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                  </tr>
                  <?php endforeach ; ?>
                  <?php endif ; ?>
            </tbody>
          </table>
        </div>

        <div class="d-flex flex-wrap justify-content-end align-items-center pb-4">
          <div class="d-flex gap-4">
            <div class="text-right mt-4 mr-5">
              <label class="text-muted font-weight-normal">Giảm giá</label>
              <div class="text-large"><strong>Không</strong></div>
            </div>
            <div class="text-right mt-4">
              <label class="text-muted font-weight-normal">Tổng</label>
              <div class="text-large"><strong><?= isset ($total_bill) ? (number_format ($total_bill , 0 , "," , ".")) : "" ?></strong></div>
            </div>
          </div>
        </div>

        <div class="float-right">
          <a href="../sanphamtest.php?categori=0" class="text-decoration-none text-dark">Quay lại</a>
          <a href="pay.php" class="btn btn-lg btn-success mt-2 float-end">Thanh toán</a>
          <button type="submit" name="editcart" class="btn btn-lg btn-primary mt-2 mx-2 float-end">Cập nhật</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>