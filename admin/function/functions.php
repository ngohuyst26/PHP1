<?php
include_once 'database.php';


function inra(){
    echo "hahaha";
}


function ConnectDataBase($sql, $dang){   
    //Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
    global $connect;
    if ($dang == "add") {
        if (mysqli_query($connect, $sql)) {
            echo "Thêm dữ liệu thành công";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
    } elseif ($dang == "remove") {
        if (mysqli_query($connect, $sql)) {
            echo "Xóa Thành Công";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
    } elseif ($dang == "edit") {
        if (mysqli_query($connect, $sql)) {
            echo "Cập nhật thành công";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
    } elseif ($dang == "get") {
        $data = [];
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
            $data = $result->fetch_all(MYSQLI_ASSOC);
            return $data;
        }
    }elseif ($dang == "count") {
        $result = $connect->query($sql);
        if (isset($result)) {
                $data = $result->fetch_all(MYSQLI_ASSOC);
                foreach ($data as $count){
                    return $count['count'];
                }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        }
    }
    //Đóng database
    // mysqli_close($connect);
}


function upload($uploadedFile){
    $imagePath = "";
    if (isset($uploadedFile)) {
        // Kiểm tra xem có lỗi xảy ra không
        if ($uploadedFile["error"] === UPLOAD_ERR_OK) {
            $tempName = $uploadedFile["tmp_name"];
            // Xác định tên file mới
            $originalName = basename($uploadedFile["name"]);
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $newFileName = uniqid() . "_" . $originalName; // Thêm một giá trị duy nhất vào tên file

            // Thư mục lưu trữ ảnh
            $uploadDir = "../img2/";

            // Di chuyển file ảnh đến thư mục lưu trữ
            if (move_uploaded_file($tempName, $uploadDir . $newFileName)) {
                // Trả về đường dẫn ảnh mới
                $imagePath = $uploadDir ."/". $newFileName;
            } else {
                echo "Có lỗi xảy ra khi lưu trữ file ảnh.";
            }
        } else {
            echo "Có lỗi xảy ra trong quá trình upload ảnh.";
        }
        return $imagePath;
    } 
}


function postData(){
    $custom = "";
    if (isset($_GET["custom"])) {
        $custom = $_GET["custom"];
    }
    $tensp = "";
    $giatien = "";
    $giamgia = "";
    $mota = "";
    $duongdan = "";
    $thumbnail = "";
    $categori = "";
    //Lấy giá trị POST từ form vừa submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["tensp"])) {
            $tensp = $_POST["tensp"];
        }
        if (isset($_POST["giatien"])) {
            $giatien = $_POST["giatien"];
        }
        if (isset($_POST["giamgia"])) {
            $giamgia = $_POST["giamgia"];
        }
        if (isset($_POST["mota"])) {
            $mota = $_POST["mota"];
        }
        if (isset($_POST["categori"])) {
            $categori = $_POST["categori"];
        }
        if (isset($_POST["duongdan"])) {
            $duongdan = $_POST["duongdan"];
        }
        $thumbnail = upload($_FILES["thumbnail"]);
        if (!empty($thumbnail)) {
            echo "Tệp tin đã được tải lên thành công. Đường dẫn: " . $thumbnail;
        }
        //Code xử lý, insert dữ liệu vào table
        $mang = [
            "tensp" => $tensp,
            "giatien" => $giatien,
            "giamgia" => $giamgia,
            "mota" => $mota,
            "categori" => $categori,
            "duongdan" => $duongdan,
            "thumbnail" => $thumbnail,
            "custom" => $custom
        ];
        return $mang;
    }
}


function postDataPosts(){
    $custom = "";
    if (isset($_GET["custom"])) {
        $custom = $_GET["custom"];
    }
    $name = "";
    $slug = "";
    $content = "";
    $thumbnail = "";
    $posts_category_id = "";
    //Lấy giá trị POST từ form vừa submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["name"])) {
            $name = $_POST["name"];
        }
        if (isset($_POST["slug"])) {
            $slug = $_POST["slug"];
        }
        if (isset($_POST["content"])) {
            $content = $_POST["content"];
        }
        if (isset($_POST["posts_category_id"])) {
            $posts_category_id = $_POST["posts_category_id"];
        }
        $thumbnail = upload($_FILES["thumbnail"]);
        if (!empty($thumbnail)) {
            echo "Tệp tin đã được tải lên thành công. Đường dẫn: " . $thumbnail;
        }
        //Code xử lý, insert dữ liệu vào table
        $mang = [
            "name" => $name,
            "slug" => $slug,
            "content" => $content,
            "posts_category_id" => $posts_category_id,
            "thumbnail" => $thumbnail,
            "custom" => $custom
        ];
        return $mang;
    }
}


function AddPosts($value){ 
    if (isset($value["custom"]) && $value["custom"] == "add") {
        if (isset($value)) {
            $sql ="INSERT INTO posts(name, slug, content, thumbnail, posts_category_id)
                    VALUES ( '".$value["name"]."','".$value["slug"]."' , '".$value["content"]."' , '".$value["thumbnail"]."',".$value["posts_category_id"].")";
            ConnectDataBase($sql, "add");
        }
    }
}


function AddProduct($data){
    if (isset($data["custom"]) && $data["custom"] == "add") {
        if (isset($data)) {
            $sql =
                "INSERT INTO products(name, slug, content, thumbnail,price,sale_price, product_categori_id)
                VALUES ( '" .$data["tensp"]. "','" .$data["duongdan"]. "','" .$data["mota"]. "','" .$data["thumbnail"].
                "'," .$data["giatien"]. "," .$data["giamgia"]. "," .$data["categori"]. ")";
            ConnectDataBase($sql, "add");
        }
    }
}


function EditPosts($data){
    if (isset($data["custom"]) && $data["custom"] == "edit") {
        if (isset($_GET["edit"])) {
            $id = $_GET["edit"];
            $select = "SELECT id, name, slug, content, thumbnail, posts_category_id FROM posts WHERE id = '$id'";
            $value = ConnectDataBase($select, "get"); 
            if (isset($data)) {
                foreach ($value as $key){
                    if (empty($data['thumbnail'])){
                        $data['thumbnail'] = $key['thumbnail'];
                    }    
                $sql =
                    "UPDATE posts SET 
                    name = '".$data["name"] ."',
                    slug = '" .$data["slug"] ."',
                    content = '" .$data["content"] ."',
                    thumbnail = '" .$data["thumbnail"] ."',
                    posts_category_id= ".$data["posts_category_id"] ."  
                    WHERE id = $id";
                ConnectDataBase($sql, "edit");
            }
        }
    }
}
}


function EditProduct($data){
    if (isset($data["custom"]) && $data["custom"] == "edit") {
        if (isset($_GET["edit"])) {
            $id = $_GET["edit"];
            $select = "SELECT id, name, slug, content, thumbnail, price, sale_price FROM products WHERE id = '$id'";
            $value = ConnectDataBase($select, "get"); 
            if (isset($data)) {
                foreach ($value as $key){
                    if (empty($data['thumbnail'])){
                        $data['thumbnail'] = $key['thumbnail'];
                    }    
                $sql =
                    "UPDATE products SET 
                    name = '" .$data["tensp"] ."', 
                    slug = '" .$data["duongdan"] ."' ,
                    content = '" .$data["mota"] ."', 
                    thumbnail = '" .$data["thumbnail"] ."' , 
                    price = " .$data["giatien"] .", 
                    sale_price = " .$data["giamgia"] . " , 
                    product_categori_id= " .$data["categori"] . 
                    "WHERE id = $id";
                ConnectDataBase($sql, "edit");
            }   
        }
    }
}
}


function Remove($table){
    if (isset($_GET["remove"])) {
        $id = $_GET["remove"];
        $sql = "DELETE FROM $table WHERE id = '$id' ";
        ConnectDataBase($sql, "remove");
    }
}


function GetId($table, $colum){
    if (isset($_GET["edit"])) {
        $id = $_GET["edit"];
        $select = "SELECT id, $colum FROM $table WHERE id= $id";
        $value = ConnectDataBase($select, "get");
        return $value;
    }
}


function SelectData($table, $colum){
    $sql = "SELECT id,$colum
            FROM $table 
            ORDER BY id ASC";
    $data = ConnectDataBase($sql, "get");
    return $data;
}


function GetOne($table, $colum, $id){
    global $connect;
    $sql = "SELECT id,$colum
            FROM $table  WHERE id = ?";
    if($stmt = mysqli_prepare($connect, $sql)){
        $data = mysqli_stmt_bind_param($stmt,'i',$id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_assoc($result);
    }
    return $data;
}


function CountRow($categori_id ,$table,$columcategory){
    if($categori_id == 0){
        $sql = "SELECT COUNT(*) as count
        FROM $table";
        $data = ConnectDataBase($sql, 'count');
        return $data;
    }else if($categori_id > 0){
        $sql = "SELECT COUNT(*) as count
        FROM $table WHERE  $columcategory = $categori_id";
        $data = ConnectDataBase($sql, 'count');
        return $data;
    }
}



function SelectDataPage($table, $colum, $columcategory, $ofset, $limit, $categori_id ){
    if($categori_id == 0){
        $sql = "SELECT id, $colum
        FROM $table
        ORDER BY id DESC
        LIMIT $ofset, $limit";
        $data = ConnectDataBase($sql, "get");
        return $data;
    }else{
        $sql = "SELECT id, $colum
        FROM $table
        WHERE $columcategory= $categori_id
        ORDER BY id DESC
        LIMIT $ofset, $limit;";
        $data = ConnectDataBase($sql, "get");
        return $data;
    }
}



function getAllCategories($table){
    $sql = "SELECT * FROM $table";
    return ConnectDataBase($sql, "get");
}


function getProductByCategories($table, $columcategory, $categori_id){
    $sql = "SELECT * FROM $table where $columcategory = $categori_id";
    return ConnectDataBase($sql, "get");
    
}


function Paging($count,$record){
    if(isset($record) && isset($count)){
        $totalRecords = $count;
        // Số lượng bản ghi hiển thị trên mỗi trang
        $recordsPerPage = $record;

        // Trang hiện tại (nếu không được xác định, mặc định là trang 1)
        $current_page = isset($_GET['page-item']) ? $_GET['page-item']: 1;

        // Tính số lượng trang cần hiển thị
        $totalPages = ceil($totalRecords / $recordsPerPage);

        // Giới hạn giá trị trang hiện tại trong khoảng từ 1 đến tổng số trang
        $current_page = max(1, min($current_page, $totalPages));

        // Tính vị trí bắt đầu lấy dữ liệu từ CSDL
        $startFrom = ($current_page - 1) * $recordsPerPage;
        $data  = [
            'current_page' => $current_page,
            'totalPages' => $totalPages,
            'recordsPerPage' => $recordsPerPage,
            'startFrom' => $startFrom
        ];
            return $data;
    }else{
        echo "Thiếu dữ liệu";
    }
}


function Register($name,$email,$password){
    $getdata = "SELECT email, password FROM users";
    $value = ConnectDataBase($getdata,'get');
    $fund = false;
    foreach($value as $key){
        if($email == $key['email']){
            $fund = true;
            break;
        }
    }
    if(!$fund){
    $sql = "INSERT INTO users(name,email,password) 
    VALUES ('$name','$email','$password')";
    ConnectDataBase($sql,'add');
    }else{
        echo "<script>
        alert ('Email đã được đăng ký');
        </script>";
    }
}


function Login($email, $password){
    $sql = "SELECT email, password FROM users WHERE email = '$email'";
    $data = ConnectDataBase($sql,'get');
    if(isset($data)){
        foreach($data as $key){
            if(password_verify($password, $key['password'])){
                header('Location: /#');
            }else{
                echo "<script>
                alert ('Đăng nhập thất bại');
                </script>";
            }
            break;
            }
        }    
}


function QuenMatKhau($email){
    $getdata = "SELECT email, password FROM users";
    $value = ConnectDataBase($getdata,'get');
    $fund = false;
    $users = [];
    foreach($value as $key){
        if($email == $key['email']){
            $fund = true;
            break;
        }
    }
    if($fund){
        $token = bin2hex(random_bytes(10));
        $sql = "UPDATE users SET remember_token  = '$token' WHERE email = '$email'";
        ConnectDataBase($sql,'add');
        $verified_link = "
        Bấm vào link xác minh để đổi mật khẩu
        http://mail.php/client/users/doimatkhau.php/?veri=$token
        ";
        $users = [
            'email' => $email,
            'token' => $verified_link
        ];
    }else{
        echo "<script>
        alert ('Email chưa được đăng ký');
        </script>";
    }
    return $users;
}


function CheckToken($token) { 
    $sql = "SELECT id, remember_token  FROM users";
    $data = ConnectDataBase($sql,'get');
    $fund = false;
    foreach($data as $key){
        if($token == $key['remember_token']){
            $fund = true;
            break;
        }
    }
    return $fund;
}


function DoiMatKhau($password, $token){
    $query = "SELECT id, remember_token FROM users";
    $data = ConnectDataBase($query,'get');
    $fund = false;
    foreach($data as $key){
        if($token == $key['remember_token']){
            $fund = true;
        }
    }
    if($fund){
    $sql = "UPDATE users SET password = '$password', remember_token = '' WHERE remember_token = '$token'";
    ConnectDataBase($sql,'add');
    }

}


function RegisterAdmin($name,$email,$password){
    $getdata = "SELECT email, password FROM users";
    $value = ConnectDataBase($getdata,'get');
    $fund = false;
    foreach($value as $key){
        if($email == $key['email']){
            $fund = true;
            break;
        }
    }
    if(!$fund){
    $sql = "INSERT INTO users(name,email,password) 
    VALUES ('$name','$email','$password')";
    ConnectDataBase($sql,'add');
    
    }else{
        echo "<script>
        alert ('Email đã được đăng ký');
        </script>";
    }
}


function AddOder($customer_name,$customer_phone,$customer_email,$shipping_address,$total){
    $sql = "INSERT INTO  orders(customer_name,customer_phone,customer_email,shipping_address,total)
    VALUES ('$customer_name','$customer_phone','$customer_email','$shipping_address','$total')";
    ConnectDataBase($sql,'add');
}


function GetIdOrder(){
    global $connect;
    $sql = "SELECT id
    FROM orders
    ORDER BY id DESC
    LIMIT 1;";
    $result = mysqli_query($connect,$sql);
    $data = mysqli_fetch_assoc($result);
    return $data['id'];
}


function AddOderDetail($order_id,$product_id,$name,$thumbnail,$qty,$price){
    $sql = "INSERT INTO order_detail(order_id,product_id,name,thumbnail,qty,price) 
    VALUES($order_id,$product_id,'$name','$thumbnail',$qty,$price)";
    ConnectDataBase($sql,"add");
}


function GetOrderDe($order_id){
    $sql = "SELECT * FROM order_detail WHERE order_id = '$order_id'";
    $data = ConnectDataBase($sql,"get");
    return $data;
}


function SelectLike($like){
    $sql = "SELECT * FROM products WHERE name LIKE '%$like%'";
    $data = ConnectDataBase($sql,"get");
    return $data;
}


?>