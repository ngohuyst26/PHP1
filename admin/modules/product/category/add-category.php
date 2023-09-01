<?php
include_once 'function/functions.php';



?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">THÊM DANH MỤC SẢN PHẨM</h3>
    </div>
    <form action="/admin/?page=product&action=list&categori=0&custom=add" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tên Danh Muc</label>
                <input type="text" class="form-control" id="" name="tensp" placeholder="Tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="">Mô Tả</label>
                <input type="text" class="form-control" id="" name="giatien" placeholder="Giá tiền">
            </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>