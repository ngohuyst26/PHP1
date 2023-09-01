<?php
include 'function/functions.php';
$value = GetId('products','name, slug, content, thumbnail, price, sale_price, product_categori_id');
?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">CHỈNH SỬA SẢN PHẨM</h3>
    </div>
    <?php if (isset($value)):?>
        <?php foreach($value as $key): ?>      
    <form method="post" action="/admin/?page=product&action=list&categori=0&custom=edit&edit=<?= $key['id']?>" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" class="form-control" id="" name="tensp" placeholder="Tên sản phẩm"
                    value="<?= $key['name'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Giá tiền</label>
                <input type="text" class="form-control" id="" name="giatien" placeholder="Giá tiền"
                    value="<?= $key['price'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Giảm giá</label>
                <input type="text" class="form-control" id="" name="giamgia" placeholder="Giảm giá"
                    value="<?= $key['sale_price'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <input type="text" class="form-control" id="" name="mota" placeholder="Mô tả"
                    value="<?= $key['content'] ?>">
            </div>
            <div class="form-group">
                <label for="">Danh mục</label>
            <?php if(!empty(getAllCategories('product_categories'))): ?>
                            <select name="categori" class="form-select col-2">
                                <?php foreach(getAllCategories('product_categories') as $category): ?>
                                <option
                                    <?= ( $key["product_categori_id"] === $category['id'])? 'selected': '' ?>
                                    value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                    <?php endif;  ?>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Đường dẫn</label>
                <input type="text" class="form-control" id="" name="duongdan" placeholder="Đường dẫn"
                    value="<?= $key['slug'] ?>">
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
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
    <?php endforeach; ?>
    <?php endif; ?>
</div>