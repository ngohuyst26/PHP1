<?php
include_once 'function/functions.php';
include 'function/mainproduct.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>
<style>
.content p {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 300px;
}

.table td,
.table th {
    height: 60px;
    vertical-align: middle;
    text-align: center;
}

/* .table th {
   border: 0.5px solid gray;

} */
</style>

<body>
    <div class="row">
        <div class="col-12">
            <div class="card">

                <!-- Danh mục sản phẩm -->
                <?php if(!empty(getAllCategories('product_categories'))): ?>
                <div class="card-header">
                    <div>
                        <form class="form-inline" action="" method="get">
                            <input type="hidden" name="page" value="product">
                            <input type="hidden" name="action" value="list">
                            <input type="hidden" name="page-item" value="1">
                            <select name="categori" class="form-select col-2">
                                <option <?= (isset($_GET["categori"]) && $_GET["categori"] === 0)? 'selected': '' ?>
                                    value="0">Tất cả</option>
                                <?php foreach(getAllCategories('product_categories') as $key): ?>
                                <option
                                    <?= (isset($_GET["categori"]) && $_GET["categori"] === $key['id'])? 'selected': '' ?>
                                    value="<?= $key['id'] ?>"><?= $key['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class='ms-2 p-1 rounded-2 border-0 bnt btn-primary '>
                                Lọc Sản Phẩm</button>
                        </form>
                    </div>
                    <?php endif;  ?>
                </div>

                <!-- Danh sách sản phẩm -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr class='center'>
                                <th>MÃ SP</th>
                                <th>TÊN SẢN PHẨM</th>
                                <th>HÌNH ẢNH</th>
                                <th>GIÁ TIỀN</th>
                                <th>GIẢM GIÁ</th>
                                <th>ĐƯỜNG DẪN</th>
                                <th class="content">MÔ TẢ</th>
                                <th>HÀNH ĐỘNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($data)): ?>
                            <?php foreach($data as $key): ?>
                            <tr>
                                <td><?= $key['id'] ?></td>
                                <td><?= $key['name'] ?></td>
                                <td><img src="<?= $key['thumbnail'] ?>" alt="" width="50"></td>
                                <td><del><?= number_format($key['price'],0,',','.') ?></del></td>
                                <td><?= number_format($key['sale_price'],0,',','.')  ?></td>
                                <td><?= $key['slug'] ?></td>
                                <td class="content">
                                    <p><?= $key['content']?></p>
                                </td>
                                <td><a href="?page=product&action=edit&categori=0&page-item=1&edit=<?= $key['id']?>"><button
                                            class="btn btn-primary"><i class="fa-solid fa-pen fa-beat fa-xs"></i>
                                            Sửa</button></a>
                                    <a href="?page=product&action=list&categori=0&remove=<?= $key['id']?>&page-item=1"><button
                                            class="btn btn-danger"><i class="fa-regular fa-circle-xmark fa-spin"
                                                style="color: #ffffff;"></i> Xóa Sản Phẩm</button></a></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <!-- Phân trang -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center  mt-4">

                            <?php if($value['current_page'] > 1): ?>
                            <li class="page-item">
                                <a class="page-link"
                                    href="?page=product&action=list&categori=<?= $_GET['categori'] ?>&page-item=1"
                                    tabindex="-1" aria-disabled="true">Trang Đầu</a>
                            </li>
                            <?php endif; ?>

                            <?php if($value['current_page'] > 1): ?>
                            <?php $next =  $value['current_page'] - 1 ?>
                            <li class="page-item">
                                <a class="page-link "
                                    href="?page=product&action=list&categori=<?=$_GET['categori']?>&page-item=<?= $next ?>">Trang
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
                                    href="?page=product&action=list&categori=<?= $_GET['categori'] ?>&page-item=<?= $i ?>"><?= $i ?></a>
                            </li>
                            <?php endif; ?>
                            <?php endfor; ?>

                            <?php if($value['current_page'] < $value['totalPages']): ?>
                            <?php $next =  $value['current_page'] +1 ?>
                            <li class="page-item">
                                <a class="page-link"
                                    href="?page=product&action=list&categori=<?=$_GET['categori']?>&page-item=<?= $next ?>">Trang
                                    tiếp</a>
                            </li>
                            <?php endif; ?>

                            <?php if($value['current_page'] < $value['totalPages']): ?>
                            <li class="page-item">
                                <a class="page-link"
                                    href="?page=product&action=list&categori=<?= $_GET['categori'] ?>&page-item=<?= $value['totalPages'] ?>"
                                    tabindex="-1" aria-disabled="true">Trang Cuối</a>
                            </li>
                            <?php endif; ?>

                        </ul>
                    </nav>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</body>

</html>