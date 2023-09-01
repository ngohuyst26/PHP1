<?php
include_once '../../admin/function/functions.php';

$fund = false;
$token = "";

if(isset($_GET['veri'])){
  $token = $_GET['veri'];
  $fund = CheckToken($token);
}

if(isset($_POST['doimatkhau'])){
  $password = $_POST['password'];
  $password_check = $_POST['password_check'];
  $pass_hash = password_hash($password,PASSWORD_DEFAULT);
  if(password_verify($password_check, $pass_hash)){
    DoiMatKhau($pass_hash,$token);
    header('Location: /#');

  }else{
    echo "<script>
        alert ('Mật khẩu và Mật khẩu nhập lại không trùng nhau');
        </script>";
  }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
          <?php if($fund): ?>
            <div class="card card-info w-25 position-absolute top-50 start-50 translate-middle ">
              <div class="card-header">
                <h3 class="card-title">Đổi Mật Khẩu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal " method="post"  enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group row ">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Mật khẩu</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="password" id="inputEmail3" placeholder="Mật khẩu">
                    </div>
                  </div>
                  <div class="form-group row ">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nhâp lại mật khẩu</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="password_check" id="inputEmail3" placeholder="Mật khẩu">
                    </div>
                  </div>
                <div class="card-footer mt-2">
                  <button type="submit" name="doimatkhau" class="btn btn-info">Quên Mật Khẩu</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <?php else:  ?>
              <?= "<script>
                      alert ('Đường link đã hết hạn');
                      </script>"; ?>
            <?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

