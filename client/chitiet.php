<?php
include_once '../admin/function/functions.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
 $data = GetOne('products', 'name,slug,thumbnail,content,price,sale_price,product_categori_id', $id);
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
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/chitiet.css">
    <link rel="stylesheet" href="../../css/animation.css">
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
                <li><a href="sanphamtest.php?categori=0">SẢN PHẨM</a></li>
                <li><a href="cart/cart.php">Giỏ Hàng</a></li>
                <li><a href="tintuc.html">TIN TỨC</a></li>
                <li><a href="users/dangnhap.php">ĐĂNG NHẬP</a></li>
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
    <div class="container-dh">
        <div class="dieu-huong">
            <p>Trang chủ</p>
            <i class="fa-solid fa-angles-right"></i>
            <span>Tất cả sản phẩm</span>
        </div>
        </div>

        <!--  -->
        <div class="container-ct">
            <img src="../<?= $data['thumbnail'] ?>" alt="">
            <div class="chitiet-info">
                <h1><?= $data['name'] ?></h1>
                <h3>Giá: <?= $data['sale_price'] ?> ₫</h3>
                <p><?= $data['content'] ?></p>                     
                <form action="../cart/cart.php" method="post">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <input type="hidden" name="thumbnail" value="<?= $data['thumbnail'] ?>">
                    <input type="hidden" name="name" value="<?= $data['name'] ?>">
                    <input type="hidden" name="price" value="<?= $data['price'] ?>">
                    <input type="hidden" name="sale_price" value="<?= $data['sale_price'] ?>">
                    <button type="submit" class="btn btn-primary" name="addcart">Thêm vào giỏ hàng</button>
                </form>
                                                       
                <h5>Hoặc liên hệ hotline: <span>0901 012 067</span> để được giao hàng tận nơi!</h5>
            </div>
        </div>
        <div class="conten-ct">
            <h2><?= $data['content'] ?></h2>
        </div>
          

        <div class="product-lq">
            <h1 class="ckeck-height left-to-right delay-1">Sản Phẩm <span>Liên Quan</span></h1>
            <div class="slider-product">
                <div class="produce-item-lq ckeck-height botoom-top delay-1" >
                    <div class="image-lq">
                        <img src="../../img/sp2.jpg" alt="">
                        <div class="hot-lq">
                            <img src="../../img/fire.svg" alt="">
                            <p>BÁN CHẠY</p>
                        </div>
                    </div>
                    <div class="produce-info-lq">
                        <h4>Trà sữa Matcha</h4>
                        <p>Vị Trà Xanh nhẫn, đậm len lỏi vào mọi giác quan ngay từ những ngụm đầu tiên, tạo cảm giác tươi mới sảng khoái chỉ muốn thưởng thức mãi không nguôi.</p>
                        <h3>26.000<span>đ</span></h3>
                    </div>
                </div>

                <div class="produce-item-lq ckeck-height botoom-top delay-2" >
                    <div class="image-lq">
                        <img src="../../img/sp3.jpg" alt="">
                    </div>
                    <div class="produce-info-lq">
                        <h4>Trà sữa Khoai Môn</h4>
                        <p>Mãn nhãn với sắc tím ấn tượng, sự kết hợp tinh tế của Khoai Môn và Trà Sữa cho ra đời hương vị mang sức hút mãnh liệt nhưng pha chút dịu dàng, nhẹ nhàng.</p>
                        <h3>28.000<span>đ</span></h3>
                    </div>
                </div>

                <div class="produce-item-lq ckeck-height botoom-top delay-3" >
                    <div class="image-lq">
                        <img src="../../img/sp4.jpg" alt="">
                        <div class="hot-lq">
                            <img src="../../img/fire.svg" alt="">
                            <p>BÁN CHẠY</p>
                        </div>
                    </div>
                    <div class="produce-info-lq">
                        <h4>Trà sữa Matcha Machiato</h4>
                        <p>Trà Sữa Matcha thơm lừng phối hợp hoàn hảo với lớp Milkfoarm mằn mặn, thơm béo tạo cảm giác ngất ngây, mê say ngay từ ngụm đầu tiên.</p>
                        <h3>26.000<span>đ</span></h3>
                    </div>
                </div>

                <div class="produce-item-lq" >
                    <div class="image-lq">
                        <img src="../../img/sp5.jpg" alt="">
                        <div class="hot-lq">
                            <img src="../../img/fire.svg" alt="">
                            <p>BÁN CHẠY</p>
                        </div>
                    </div>
                    <div class="produce-info-lq">
                        <h4>Trà sữa Trân Châu Macchiato</h4>
                        <p>Ngào ngạt hương thơm của trà và vị thanh béo của sữa, quyện cùng lớp foarm sánh mịn, ngọt ngào. Là thức uống luôn được các bạn trẻ ưu ái lựa chọn được các bạn trẻ ưu á mỗi khi đến Chin.</p>
                        <h3>25.000<span>đ</span></h3>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="footer">
                <div class="footer-conten col-1 ">
                    <h4>VỀ CHÚNG TÔI</h4>
                    <ul>
                        <li>Khởi nguồn thương hiệu</li>
                        <li>Trách nhiệm cộng đồng</li>
                        <li>Lắng nghe thấu hiểu</li>
                        <li>Liên hệ với chúng tôi</li>
                    </ul>
                </div>
                <div class="footer-conten col-1">
                    <h4>SẢN PHẨM</h4>
                    <ul>
                        <li>Chin Macchiato</li>
                        <li>Chin Milktea</li>
                        <li>Chin special</li>
                        <li>Chin Full - Topping</li>
                        <li>Chin Topping</li>
                    </ul>
                </div>
                <div class="footer-conten col-1">
                    <h4>TIN TỨC</h4>
                    <ul>
                        <li>Khuyến mãi</li>
                        <li>Tuyển dụng</li>
                    </ul>
                </div>
                <div class="footer-conten footer-flex-conten col-2">
                    <h4>CHIN - MILKTEA & MACCHIATO</h4>
                    <ul>
                        <li><img src="../../img/footer-1.svg" alt=""><p>133 Trần Hưng Đạo, P. An Phú, Q. Ninh Kiều, TP. Cần Thơ</p></li>
                        <li><img src="../../img/footer-2.svg" alt=""><p>trasuachin@gmail.com</p></li>
                        <li><img src="../../img/footer-3.svg" alt=""><p>0901012067</p></li>
                    </ul>
                </div>
                <div class="footer-conten contact col-2">
                    <h4>KẾT NỐI VỚI CHÚNG TÔI</h4>
                    <ul>
                        <li><i class="fa-brands fa-facebook"></i></i></li>
                        <li><i class="fa-brands fa-instagram"></i></li>
                    </ul>
                </div>
            </div>
            <div class="coppyright">
                <p>© Copyright 2023 Chin - MilkTea & Macchiato</p>
                <div class="chinh-sach">
                    <a href="">Chính sách bảo mật</a>
                    <a href="">Quy định sử dụng</a>
                </div>
            </div>
        </footer>
        <script
    type="text/javascript"
    src="https://code.jquery.com/jquery-1.11.0.min.js"
  ></script>
  <script
    type="text/javascript"
    src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
  ></script>
  <script
    type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
  ></script>
  <link
      rel="stylesheet"
      type="text/css"
      href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
</body>
<script src="../../js/app.js"></script>
<script src="../../js/slider.js"></script>
</html>