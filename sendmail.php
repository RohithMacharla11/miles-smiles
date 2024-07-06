<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate and sanitize inputs
    $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
    $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
    $userPhone = filter_input(INPUT_POST, 'userPhone', FILTER_SANITIZE_STRING);
    $userMessage = filter_input(INPUT_POST, 'userMessage', FILTER_SANITIZE_STRING);
    echo ("1");
    if ($userName && $userEmail && $userPhone && $userMessage) {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            //Send using SMTP
            $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->Username = 'macharlarohith111@gmail.com';                     //SMTP username
            $mail->Password = 'Rohith@999r';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('macharlarohith111@gmail.com', 'Rohith Macharla');
            $mail->addAddress('signinrohith123@gmail.com', 'Chinnu');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'New Enquiry - Car Rental Contact Form';
            $mail->Body = '<h3>Hello, you have a new enquiry</h3>
                            <h4>Full Name: '.$userName.'</h4>
                            <h4>Email: '.$userEmail.'</h4>
                            <h4>Phone Number: '.$userPhone.'</h4>
                            <h4>Message: '.$userMessage.'</h4>';

            if ($mail->send()) {
                echo 'Message has been sent';
                exit(0);
            } else {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                exit(0);
            }
            
        } catch (Exception $e) {
            echo "Message could not be sent... Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "All fields are required.";
    }
} else {
    header('Location: contact.php');
    exit(0);
}
?>
