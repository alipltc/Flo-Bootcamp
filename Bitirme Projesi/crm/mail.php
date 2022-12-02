<?php
// Import PHPMailer classes into the global namespace 
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception; 
 
// Include library files 
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php';
require_once 'Ayarlar/fonksiyonlar.php';
if (isset($_POST["mail"])) {
    $gelenmail = Guvenlik($_POST["mail"]);
    $konu      = Guvenlik($_POST["konu"]);
    $mesaj     = Guvenlik($_POST["mesaj"]);
    if (($gelenmail != "") and ($konu != "") and ($mesaj != "")) {
        
        $mail = new PHPMailer;
        
        // Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vipgamestar@gmail.com';  // SMTP username 
        $mail->Password = 'ddikxdxiypxuayta';       // SMTP password 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;// Enable TLS encryption, `ssl` also accepted 
        $mail->Port = 465;
        
        // Sender info
        $mail->setFrom('vipgamestar@gmail.com', 'CRM Panel');
        $mail->addReplyTo('vipgamestar@gmail.com', 'CRM Panel');
        
        // Add a recipient 
        $mail->addAddress($gelenmail);
        
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Mail subject
        $mail->Subject = $konu;
        
        // Mail body content 
        $bodyContent  = $mesaj;
        $bodyContent .= '<p><b>CRM Panel</b></p>';
        $mail->Body   = $bodyContent;
        $mail->CharSet = 'UTF-8';
        
        // Send email 
        if (!$mail->send()) {
            echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
            exit();
        } else {
            echo "<script>
            alert('Mail Gönderme Başarılı');
            window.top.location = 'http://localhost/crm/index.php';
            </script>";
            exit();
        }
    } else {
        echo "<script>
        alert('Mail Gönderme Başarısız!(Boş Alan Bırakmayın)');
        window.top.location = 'http://localhost/crm/index.php';
        </script>";
        exit();
    }
} else {
    echo "<script>
    window.top.location = 'http://localhost/crm/index.php';
    </script>";
}


?>