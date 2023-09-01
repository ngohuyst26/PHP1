<?php
include_once '../../admin/function/functions.php';

if(isset($_POST['dangky'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_check = $_POST['password_check'];
  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  if(password_verify($password_check,$password_hash)){
    Register($name,$email,$password_hash);
  }else{
    echo "Đăng ký thất bại";
  }
} 


?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<div class="card card-info w-25 position-absolute top-50 start-50 translate-middle ">
              <div class="card-header">
                <h3 class="card-title">Đăng Ký</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal " method="post"  enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group row ">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Tên</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="Tên">
                    </div>
                  </div>
                  <div class="form-group row  mt-2">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                      <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row mt-2">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Mật Khẩu</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row  mt-2">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Nhập lại mật khẩu</label>
                    <div class="col-sm-8">
                      <input type="password" class="form-control" name="password_check" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="dangky" class="btn btn-info">Đăng ký</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>