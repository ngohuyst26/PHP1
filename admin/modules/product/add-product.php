<?php
ob_start();
include_once 'function/functions.php';

if(isset($_POST['submit'])){
if(empty($_POST['tensp'])){ $_SESSION['error']['name'] = true; }else{ $_SESSION['error']['name'] = false; }
if(empty($_POST['giatien'])){ $_SESSION['error']['price'] = true; }else{ $_SESSION['error']['price'] = false; }
if(empty($_POST['giamgia'])){ $_SESSION['error']['sale_price'] = true; }else{ $_SESSION['error']['sale_price'] = false; }
if(empty($_POST['mota'])){ $_SESSION['error']['content'] = true; }else{ $_SESSION['error']['content'] = false; }
if(empty($_POST['duongdan'])){ $_SESSION['error']['slug'] = true; }else{ $_SESSION['error']['slug'] = false; }
if($_FILES['thumbnail']['size'] == 0){ $_SESSION['error']['thumbnail'] = true; }else{ $_SESSION['error']['thumbnail'] = false; }
}

?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">THÊM SẢN PHẨM</h3>
    </div>
    <form  method="post" action='<?=(isset($_POST['tensp'])  && isset($_POST['giatien']) && isset($_POST['giamgia']) && isset($_POST['mota']) && isset($_POST['duongdan'])?"/admin/?page=product&action=list&categori=0&custom=add":"#") ?>' enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" id="" name="tensp" placeholder="Tên sản phẩm">
                <?php if(isset($_SESSION['error']) && $_SESSION['error']['name']): ?>
                <small class="text-danger"> Vui lòng nhập tên </small>
                <?php unset($_SESSION['error']['name']); endif; ?>
            </div>

            <div class="form-group">
                <label for="">Giá tiền</label>
                <input type="text" class="form-control" id="" name="giatien" placeholder="Giá tiền">
                <?php if(isset($_SESSION['error']) && $_SESSION['error']['price']): ?>
                <small class="text-danger"> Vui lòng nhập giá </small>
                <?php unset($_SESSION['error']['price']); endif; ?>
            </div>

            <div class="form-group">
                <label for="">Giảm giá</label>
                <input type="text" class="form-control" id="" name="giamgia" placeholder="Giảm giá">
                <?php if(isset($_SESSION['error']) && $_SESSION['error']['sale_price']): ?>
                <small class="text-danger"> Vui lòng nhập giá giảm </small>
                <?php unset($_SESSION['error']['sale_price']); endif; ?>
            </div>

            <div class="form-group">
                <label for="">Mô tả</label>
                <input type="text" class="form-control" id="" name="mota" placeholder="Mô tả">
                <?php if(isset($_SESSION['error']) && $_SESSION['error']['content']): ?>
                <small class="text-danger"> Vui lòng nhập mô tả </small>
                <?php unset($_SESSION['error']['content']); endif; ?>
            </div>

            <div class="form-group">
                <label for="">Danh mục</label>
            <?php if(!empty(getAllCategories('product_categories'))): ?>
                            <select name="categori" class="form-select col-2">
                                <?php foreach(getAllCategories('product_categories') as $key): ?>
                                <option
                                    <?= (isset($_GET["categori"]) && $_GET["categori"] === $key['id'])? 'selected': '' ?>
                                    value="<?= $key['id'] ?>"><?= $key['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                    <?php endif;  ?>
            </div>

            <div class="form-group">
                <label for="">Đường dẫn</label>
                <input type="text" class="form-control" id="" name="duongdan" placeholder="Đường dẫn">
                <?php if(isset($_SESSION['error']) && $_SESSION['error']['slug']): ?>
                <small class="text-danger"> Vui lòng nhập đường dẫn </small>
                <?php unset($_SESSION['error']['slug']); endif; ?>
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Hình ảnh</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail"> 
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>

                </div>
                <?php if(isset($_SESSION['error']) && $_SESSION['error']['thumbnail']): ?>
                <small class="text-danger"> Vui lòng tải lên file </small>
                <?php unset($_SESSION['error']['thumbnail']); endif; ?>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>