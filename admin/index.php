
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    <script src="https://kit.fontawesome.com/91f424987f.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <?php
  include 'components/stylesheet.php';
  ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <?php
    include 'components/navbar.php';
    include 'components/sidebar.php';
    ?>
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="modal" tabindex="-1">

                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <?php
      
        if(isset($_GET['page'])){
        switch($_GET["page"]){
          case 'dashboard':
            include 'dashboard.php';
            break;
          case 'product':
             switch($_GET["action"]){
              case 'add':
                include 'modules/product/add-product.php';
              break;
              case 'edit':
                  include 'modules/product/edit-product.php';
                break;
              case 'list':
                  include 'modules/product/list-product.php';
                break; 
                case 'category':
                    switch($_GET["action-category"]){
                        case 'add':
                            include 'modules/product/category/add-category.php';
                            break;
                    }
                    break;   
             };
              break;

          case 'posts':
            switch($_GET["action"]){
              case 'add':
                include 'modules/posts/add-posts.php';
              break;
              case 'edit':
                include 'modules/posts/edit-posts.php';
                break;
              case 'list':
                include 'modules/posts/list-posts.php';
                break; 
              
             };
            break;
            case 'users':
                switch($_GET["action"]){
                  case 'add':
                    include 'modules/users/add-users.php';
                  break;
                  case 'list':
                    include 'modules/users/list-users.php';
                    break;    
                 };
                break;
          case 'order':
            switch($_GET["action"]){
                case 'list':
                    include 'modules/order/list-orders.php';
                break;
                case 'view':
                  include 'modules/order/view-orders.php';
                  break;    
               };
            
            break;
          default:
              include '404.php'; 
             break;
        }
        }
        else{
            include 'dashboard.php';
        }
        ?>

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <?php
  include 'components/footer.php';
  ?>
    </div>
    <?php
    include 'components/script.php';
    ?>
</body>
<script>
$(function() {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
})

var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function() {
    myInput.focus()
})
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

</html>