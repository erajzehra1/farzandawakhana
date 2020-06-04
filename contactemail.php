

<?php
require_once "phpmailer/class.phpmailer.php";
if (isset($_POST['contactsend'])) {

    $to = "info@farzanaherbs.com";
    $from = $_POST['email'];
    $subject = "Info";
    $message = 'Phone NO'.$_POST['phone'].$_POST['message'];

    $headers = "From: $from";
    // boundary
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";


    $ok = @mail($to, $subject, $message, $headers, "-f " . $from);

    echo '<script>alert("Email Sent Successfully")</script>';


        echo "<script> window.location.href=' contact.php'</script> ";


}





?>