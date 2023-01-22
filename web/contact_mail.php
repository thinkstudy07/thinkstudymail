<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//Load Composer's autoloader
require 'autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// $fname = $_REQUEST['fname'];
// $lname = $_REQUEST['lname'];
// $email = $_REQUEST['email'];
// $mobile = $_REQUEST['mobile'];
// $comment = $_REQUEST['comment'];


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                       //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.zoho.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'contactus@thinkstudy.co.in';                     //SMTP username
    $mail->Password   = 'Study@100$';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('contactus@thinkstudy.co.in', 'From Website');
    $mail->addAddress('web.field@thinkstudy.co.in', 'No Reply');     //Add a recipient
    // $mail->addAddress('webfield@intrc.us');               //Name is optional
    // $mail->addReplyTo('webfield@intrc.us', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'No Reply | Leads from INTRC Website Form';

    // echo "$fname";
    $mail->Body    = "
        <h1>Test Mail</h1>
        ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
