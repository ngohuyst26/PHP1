<?php
include_once '../../admin/function/functions.php';
include_once '../../config/mail.php';

if (isset($_POST['quenmk'])){
    if(isset($_POST['email'])){
    $email = $_POST['email'];
    $users = QuenMatKhau($email);
      if(isset($users['email']) && $users['token']){
        guiMail($users['email'], $users['token']);
      }
    }else{
      echo "<script>
        alert ('Vui lòng nhập email');
        </script>";
    }
}

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<div class="card card-info w-25 position-absolute top-50 start-50 translate-middle ">
              <div class="card-header">
                <h3 class="card-title">Quên Mật Khẩu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal " method="post"  enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group row ">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                <div class="card-footer mt-2">
                  <button type="submit" name="quenmk" class="btn btn-info">Quên Mật Khẩu</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>