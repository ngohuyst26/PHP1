<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/PHPMailer/src/Exception.php';
require '../../vendor/PHPMailer/src/PHPMailer.php';
require '../../vendor/PHPMailer/src/SMTP.php';


function haha(){
    echo "hahha";
}

function thanhToanVaGuiEmail($emailNguoiNhan, $tieuDe, $noiDung) {
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    try {
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'huynhpc05784@fpt.edu.vn';                    
        $mail->Password   = 'iumhxkntcpdnahjg';                              
        $mail->SMTPSecure = 'ssl';            
        $mail->Port       = 465;     

        // Thiết lập người gửi và người nhận
        $mail->setFrom('huynhpc05784@fpt.edu.vn', 'Chin Millk Tea');  // Thay đổi bằng địa chỉ email và tên của bạn
        $mail->addAddress($emailNguoiNhan);  // Sử dụng địa chỉ email người nhận được truyền vào hàm
        $mail->isHTML(true);

        // Đặt tiêu đề và nội dung của email
        $mail->Subject = $tieuDe;
        $mail->Body = $noiDung;

        // Gửi email
        $mail->send();
        echo "Thành công";
        return true;

    } catch (Exception $e) {
        echo "Lỗi khi gửi email: " . $mail->ErrorInfo;
        return false;
    }
}

function guiMail($email,$conten){
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    try {
        // Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
        $mail->isSMTP();                                           
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'huynhpc05784@fpt.edu.vn';                    
        $mail->Password   = 'iumhxkntcpdnahjg';                              
        $mail->SMTPSecure = 'ssl';            
        $mail->Port       = 465;                                    
        
        // $mail->isSMTP();
        // $mail->Host = 'sandbox.smtp.mailtrap.io';
        // $mail->SMTPAuth = true;
        // $mail->Port = 2525;
        // $mail->Username = 'd7d719045438dd';
        // $mail->Password = '608f268da0964e';
        //Recipients

        $mail->setFrom($email, 'ĐỔI MẬT KHẨU');
        $mail->addAddress($email, 'Joe User');     //Add a recipient           //Name is optional
        $mail->addReplyTo($email, 'Information');
 
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "ĐỔI MẬT KHẨU";
        $mail->Body    = $conten;
        $mail->AltBody = $conten;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>