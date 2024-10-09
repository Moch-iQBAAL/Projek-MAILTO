<?php
// Include PHPMailer library

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if (isset($_FILES['file']) && isset($_POST['email'])) {
    $mail = new PHPMailer(true);

    try {
        // Konfigurasi server SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Gunakan server SMTP Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'lordiqball404@gmail.com'; // Ganti dengan email Gmail kamu
        $mail->Password = 'qgdw sbtq klxi zxiq';    // Ganti dengan password Gmail kamu
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Pengirim dan penerima
        $mail->setFrom('emailmu@gmail.com', 'Pengirim');
        $mail->addAddress($_POST['email']); // Email tujuan dari form

        // Lampiran file
        $mail->addAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);

        // Konten email
        $mail->isHTML(true);
        $mail->Subject = 'File yang kamu minta';
        $mail->Body = 'Berikut adalah file yang dikirimkan.';

        // Kirim email
        $mail->send();
        echo 'Email terkirim dengan file terlampir.';
    } catch (Exception $e) {
        echo "Gagal mengirim email. Error: {$mail->ErrorInfo}";
    }
}
?>
