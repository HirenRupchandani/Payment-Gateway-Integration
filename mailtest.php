<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:/wamp64/www/PHPMailer/vendor/autoload.php';
        $email="rupchandanihiren@gmail.com";
        $subj = "SUCCESSFUL DONATION TO THE SPARKS FOUNDATION";
        // the message
        $msg = "THANK YOU FOR YOUR SUCCESSFUL DONATION OF RUPESS XXXXX TO THE SPARKS FOUNDATION";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);
        
        $mail = new PHPMailer(true);
    try{
        $mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'hiriee1499@gmail.com';                 // SMTP username
        $mail->Password = 'hiren1499';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                 // TCP port to connect to

        $mail->setFrom('hiriee1499@gmail.com', 'TSF');
        $mail->addAddress($email);     // Add a recipient
        $mail->addReplyTo('hiriee1499@gmaill.com');

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subj;
        $mail->Body    = $msg;
        $mail->AltBody = '';
        $mail->send();
        echo 'Message has been sent';
    }
        catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>