<?php
include '../admin/function/functions.php';

// $data = SelectData('products', 'name,slug,content,thumbnail,price,sale_price,product_categori_id');
// var_dump($data);
if(isset($_GET['categori'])){
    $value = Paging(CountRow($_GET['categori'],'products','product_categori_id'),6);
    $data = SelectDataPage('products','name, slug, content, thumbnail, price, sale_price', 'product_categori_id', $value['startFrom'], $value['recordsPerPage'],$_GET['categori']);
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">
    <title>SẢN PHẨM</title>
    <script src="https://kit.fontawesome.com/91f424987f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/sanpham.css">
    <!-- <link rel="stylesheet" href="/css/animation.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>

<body>
    
    <div class="menu-bars">
        <div class="close">
            <i class="fa-solid fa-circle-xmark"></i>
        </div>
        <div class="menu-left">
            <ul>
                <li><a href="index.php">CHIN MILKTEA & MACCHIATO</a></li>
                <li class="chevron"><a href="vechungtoi.html">VỀ CHÚNG TÔI </a><span class="menu-con-1"><i
                            class="fa-solid fa-chevron-down"></i></span>
                    <ul class="ul-before">
                        <li><a href="">KHỞI NGUỒN THƯƠNG HIỆU</a></li>
                        <li><a href="">TRÁCH NHIỆM CỘNG ĐỒNG</a></li>
                        <li><a href="">LẮNG NGHE VÀ THẤU HIỂU</a></li>
                    </ul>
                </li>
                <li><a href="sanpham.html">SẢN PHẨM</a></li>
                <li class="chevron"><a href="tintuc.html">TIN TỨC</a><span><i
                            class="fa-solid fa-chevron-down"></i></span></li>
                <li><a href="cuahang.html">CỬA HÀNG</a></li>
            </ul>
        </div>
    </div>
    <header class="haeder-2">
        <nav>
            <img src="../img/logo.png" alt="">
            <ul>
                <li><a href="../" class="active">CHIN - MIKLTEA & MACCHIATO</a></li>
                <li><a href="#">SẢN PHẨM</a></li>
                <li><a href="cart/cart.php">GIỎ HÀNG</a></li>
                <li><a href="tintuc.html">TIN TỨC</a></li>
                <li><a href="users/dangnhap.php">ĐĂNG NHẬP</a></li>
            </ul>
            <div class="icon-menu">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>
    </header>
    <div class="banner-2" style="background-image: url(../img/banner-2.jpg);">
        <div class="title-banner">
            <h1 class="ckeck-height botoom-top-100 delay-1">TẤT CẢ SẢN PHẨM</h1>
        </div>
    </div>
    <div class="container-dh">
        <div class="dieu-huong">
            <p>Trang chủ</p>
            <i class="fa-solid fa-angles-right"></i>
            <span>Tất cả sản phẩm</span>
        </div>
    </div>
    <div class="container">
        <div class="menu-produce">
            <div class="menu-conten">
                <h2>Sản Phẩm</h2>
                <?php if(!empty(getAllCategories('product_categories'))): ?>
                <ul>
                    <li>
                        <form action="">
                            <input type="hidden" name="categori" value="0">
                            <button type="submit" <?= (isset($_GET["categori"]) && $_GET["categori"] === '0')? 'style="color: #ffd400; border-bottom: 3px solid #ffd400;"': '' ?>>
                            Tất Cả</button>
                        </form>
                    </li>
                        <?php foreach(getAllCategories('product_categories') as $key): ?>
                    <li>
                        <form action="">
                            <input type="hidden" name="categori" value="<?= $key['id'] ?>">
                            <button type="submit" <?= (isset($_GET["categori"]) && $_GET["categori"] === $key['id'])? 'style="color: #ffd400; border-bottom: 3px solid #ffd400;"': '' ?>>
                            <?= $key['name'] ?></button>
                        </form>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
        <div class="produce-2">
            <?php foreach($data as $key ): ?>
                
            <div class="produce-item-2 ckeck-height botoom-top delay-1">
                <a href="chitiet.php/?id=<?= $key['id'] ?>" style="text-decoration: none;">
                    <div class="image-2">
                        <img src="<?= $key['thumbnail'] ?>" alt="">
                        <div class="hot-2">
                            <img src="img/fire.svg" alt="">
                            <p>BÁN CHẠY</p>
                        </div>
                    </div>
                    <div class="produce-info-2">
                        <h4><?= $key['name'] ?></h4>
                        <p><?= $key['content'] ?></p>
                        <h3><?= $key['price'] ?><span>đ</span></h3>
                        
                    </div>
                        </a>
                        <form action="../client/cart/cart.php" method="post">
                                        <input type="hidden" name="id" value="<?= $key['id'] ?>">
                                        <input type="hidden" name="thumbnail" value="<?= $key['thumbnail'] ?>">
                                        <input type="hidden" name="name" value="<?= $key['name'] ?>">
                                        <input type="hidden" name="price" value="<?= $key['price'] ?>">
                                        <input type="hidden" name="sale_price" value="<?= $key['sale_price'] ?>">
                        <button type="submit" class="btn btn-primary" name="addcart">Thêm vào giỏ hàng</button>
                        </form>
                </div>
            </form>
            <?php endforeach; ?>
            </div>
    </div>
    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center  mt-4">

                            <?php if($value['current_page'] > 1): ?>
                            <li class="page-item">
                                <a class="page-link"
                                    href="/client/sanphamtest.php?categori=<?= $_GET['categori'] ?>&page-item=1"
                                    tabindex="-1" aria-disabled="true">Trang Đầu</a>
                            </li>
                            <?php endif; ?>

                            <?php if($value['current_page'] > 1): ?>
                            <?php $next =  $value['current_page'] - 1 ?>
                            <li class="page-item">
                                <a class="page-link "
                                    href="/client/sanphamtest.php?categori=<?=$_GET['categori']?>&page-item=<?= $next ?>">Trang
                                    trước</a>
                            </li>
                            <?php endif; ?>

                            <?php for($i = max(1, $value['current_page'] - 2); $i <= min($value['current_page'] + 2, $value['totalPages']); $i++): ?>
                            <?php if($i == $value['current_page']):?>
                            <li class="page-item active" >
                                <strong><a class="page-link " href="#"><?= $i ?></a></strong>
                            </li>
                            <?php else: ?>
                            <li class="page-item">
                                <a class="page-link"
                                    href="/client/sanphamtest.php?categori=<?= $_GET['categori'] ?>&page-item=<?= $i ?>"><?= $i ?></a>
                            </li>
                            <?php endif; ?>
                            <?php endfor; ?>

                            <?php if($value['current_page'] < $value['totalPages']): ?>
                            <?php $next =  $value['current_page'] +1 ?>
                            <li class="page-item">
                                <a class="page-link"
                                    href="/client/sanphamtest.php?categori=<?=$_GET['categori']?>&page-item=<?= $next ?>">Trang
                                    tiếp</a>
                            </li>
                            <?php endif; ?>

                            <?php if($value['current_page'] < $value['totalPages']): ?>
                            <li class="page-item">
                                <a class="page-link"
                                    href="/client/sanphamtest.php?categori=<?= $_GET['categori'] ?>&page-item=<?= $value['totalPages'] ?>"
                                    tabindex="-1" aria-disabled="true">Trang Cuối</a>
                            </li>
                            <?php endif; ?>

                        </ul>
                    </nav>
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
                    <li><img src="../img/footer-1.svg" alt="">
                        <p>133 Trần Hưng Đạo, P. An Phú, Q. Ninh Kiều, TP. Cần Thơ</p>
                    </li>
                    <li><img src="../img/footer-2.svg" alt="">
                        <p>trasuachin@gmail.com</p>
                    </li>
                    <li><img src="../img/footer-3.svg" alt="">
                        <p>0901012067</p>
                    </li>
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
        </div>
        <div class="coppyright">
            <p>© Copyright 2023 Chin - MilkTea & Macchiato</p>
            <div class="chinh-sach">
                <a href="">Chính sách bảo mật</a>
                <a href="">Quy định sử dụng</a>
            </div>
        </div>
    </footer>
</body>
<script src="js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</html>