<?php
session_start();

include_once '../../config/mail.php';
include_once '../../admin/function/functions.php';

if (isset($_POST['Pay'])) {
    $name = $_POST['kh_ten'] ;
    $address = $_POST['kh_diachi'] ;
    $phone = $_POST['kh_dienthoai'] ;
    $email = $_POST['kh_email'] ;
    $total = $_POST['total'];
    AddOder($name,$phone,$email,$address,$total);
    $last = GetIdOrder();
    $title = "Đơn hàng #".$last." từ cửa hàng Chin Millk Tea";
    $content = "
            <h3>Thông tin khách hàng</h3>
            <p><b>Tên:</b> ".$name." </p>
            <p><b>Sđt:</b> ".$phone." </p>
            <p><b>Email:</b> ".$email." </p>
            <p><b>Địa chỉ:</b> ".$address." </p>
            </hr>
            <h3> Giỏ hàng của bạn </h3>
            ";
    foreach($_SESSION['cart'] as $cart){
        $content .= "
        <p>".$cart['name']."<b> x ".$cart['qty']."</b> ".number_format( ($cart['price'] * $cart['qty']),0,'.',',')." VNĐ</p> 
        ";
        $tongprice = ($cart['sale_price'] * $cart['qty']);
        AddOderDetail($last,$cart['id'],$cart['name'],$cart['thumbnail'],$cart['qty'],$tongprice);
    }
    $content .= "
    <h4>Tổng thành tiền ".number_format($total)." VNĐ</h4>
    ";
    thanhToanVaGuiEmail($email , $title , $content);
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


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<div class="container mt-4 my-5">
    <form class="needs-validation" name="formthanhtoan" method="post" action="pay.php">
            <input type="hidden" name="kh_tendangnhap" value="dnpcuong">
        <div class="py-5 text-center">
            <i class="fa fa-credit-card fa-4x" aria-hidden="true"></i>
            <h2>Thanh toán</h2>
            <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span>Giỏ hàng</span>
                </h4>
                <?php if (isset($_SESSION['cart'])) : ?>
                <?php
                    $total_product = 0;
                    $total_bill = 0;
                    $i = 0 ;
                    ?>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Tổng số lượng</h6>
                            <small>
                                <?php foreach ($_SESSION['cart'] as $item) : ?>
                                <?php $i += $item['qty']; ?>
                                <?php endforeach ?>
                                <?= $i; ?>
                            </small>
                        </div>
                    </li>
                    <?php foreach ($_SESSION['cart'] as $item) : ?>
                    <?php
                        $total_product = ($item['sale_price'] * $item['qty']);
                        $total_bill += $total_product;
                    ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div class=""><?= $item['name']?> x <?=  $item['qty']?></div>
                        <div class=""><?= isset($item['sale_price']) ? (number_format($total_bill, 0, ",", ".")) : "" ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng thành tiền</span>
                       
                        <strong><?= isset($total_bill) ? (number_format($total_bill, 0, ",", ".")) : "" ?></strong>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Thông tin khách hàng</h4>

                <div class="row">
                    <div class="col-md-12">
                        <label for="kh_ten">Họ tên</label>
                        <input type="text" class="form-control my-2" name="kh_ten" id="kh_ten" value=''>
                    </div>
                    <div class="col-md-12">
                        <label for="kh_diachi">Địa chỉ</label>
                        <input type="text" class="form-control my-2" name="kh_diachi" id="kh_diachi" value="">
                    </div>
                    <div class="col-md-12">
                        <label for="kh_dienthoai">Điện thoại</label>
                        <input type="text" class="form-control my-2" name="kh_dienthoai" id="kh_dienthoai" value="">
                    </div>
                    <div class="col-md-12">
                        <label for="kh_email">Email</label>
                        <input type="text" class="form-control my-2" name="kh_email" id="kh_email" value="">
                    </div>
                </div>
                <input type="hidden" name="total" value="<?= $total_bill ?>">
                <h4 class="mb-3">Hình thức thanh toán</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="httt-2" name="httt_ma" type="radio" class="custom-control-input" required=""
                            value="2">
                        <label class="custom-control-label" for="httt-2">Chuyển khoản</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="httt-3" name="httt_ma" type="radio" class="custom-control-input" required=""
                            value="3">
                        <label class="custom-control-label" for="httt-3">Ship COD</label>
                    </div>
                </div>
                <hr class="mb-4">
               
                <button class="btn btn-success" type="submit" name="Pay">Đặt hàng</button>
            </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>