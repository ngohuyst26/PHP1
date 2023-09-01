<?php
include_once 'functions.php';
// lấy dữ liệu từ from
$value = postData();



// Thêm sản phẩm vào database
AddProduct($value);
// Update sản phẩm vào database
EditProduct($value);
// Xóa sản phẩm
Remove('products');
if(isset($_GET['categori'])){
    $value = Paging(CountRow($_GET['categori'],'products','product_categori_id'),5);
    $data = SelectDataPage('products','name, slug, content, thumbnail, price, sale_price', 'product_categori_id', $value['startFrom'], $value['recordsPerPage'],$_GET['categori']);
}
?>