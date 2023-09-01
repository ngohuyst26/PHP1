<?php
include_once 'function/functions.php';
if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $list = GetOne('orders', 'customer_name,customer_phone,customer_email,total,shipping_address,created_at', $id);
  $data = GetOrderDe($id);
} 
?>

<div class="col-12">
  <div class="callout callout-info">
    <h5><i class="fas fa-info"></i> Ghi chú:</h5>
    Trang này đã được tăng cường để in. Nhấn vào nút in ở cuối hóa đơn để kiểm tra.
  </div>


  <!-- Main content -->
  <div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h4><i class="fas fa-globe"></i> Thông tin khách hàng</h4>
        <h4>
          <small class="float-right">Ngày: <?= $list['created_at'] ?></small>
        </h4>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <b>Từ</b>
        <address>
          Ấp Hòa Trung, xã Hòa Tú 1, <br>
          Huyện Mỹ Xuyên, Tỉnh Sóc Trăng<br>
          Điện thoại: 081927054<br>
          Email: ngohuyst77@gmail.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Đến</b>
        <address>
          <?= $list['shipping_address'] ?> <br>
          Điện thoại: <?= $list['customer_phone'] ?? '' ?><br>
          Email: <?= $list['customer_email'] ?? '' ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Hóa đơn: <?= $list['customer_name'] ?? '' ?></b><br>
        <b>ID hóa đơn:<?= $list['id'] ?? '' ?></b><br>
        <b>Hạn thanh toán:</b> <?= $list['created_at'] ?><br>
        <b>Tổng tiền:</b> <?= number_format($list['total'],0,",",".") ?? '' ?> VNĐ<br>
        <b>Tài khoản:</b> <?= $list['id'] ?? '' ?> <b>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tên Sản Phẩm</th>
              <th>Hình Ảnh</th>
              <th>Số Lượng</th>
              <th>Tổng Tiền</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($data as $key): ?>
            <tr>
              <td><?= $key['id'] ?></td>
              <td><?= $key['name'] ?></td>
              <td><img src="<?=$key['thumbnail']?>"  width="50" alt=""></td>
              <td><?= $key['qty'] ?></td>
              <td><?= number_format($key['price'],0,",",".") ?? '' ?>VNĐ</td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
</div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-12">
        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> In</a>
        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
          <i class="fas fa-download"></i> Tải PDF
        </button>
      </div>
    </div>
  </div>
  <!-- /.invoice -->
</div>