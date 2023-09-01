<?php
include_once '../../admin/function/functions.php';

if(isset($_POST['dangnhap'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  Login($email,$password);  
}
if(isset($_POST['quenmatkhau'])){
  header('Location: quenmatkhau.php');
}
if(isset($_POST['dangky'])){
  header('Location: dangky.php');
}
?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<div class="card card-info w-25 position-absolute top-50 start-50 translate-middle ">
              <div class="card-header">
                <h3 class="card-title">Đăng Nhập</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal " method="post"  enctype="multipart/form-data">
                <div class="card-body">
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
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <form method="post">
                  <button type="submit" name="quenmatkhau" class="btn btn-default float-right">Quên Mật khẩu ?</button>
                  </form>
                  <form method="post">
                  <button type="submit" name="dangky" class="btn btn-default float-right" >Đăng Ký</button>
                  </form >
                  <button type="submit" name="dangnhap" class="btn btn-info">Đăng nhập</button>
                <!-- /.card-footer -->
                </div>
               
              </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>