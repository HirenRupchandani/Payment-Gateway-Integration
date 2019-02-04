<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/wamp64/www/PHPMailer/vendor/autoload.php';

$connection = mysqli_connect("localhost","root","","tsf1");    
$query="SELECT * FROM donors ORDER BY id DESC ";
$result=mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($result);
$USER_ID = $row['id'];
$EMAIL = $row['user_email'];
$TXN_AMOUNT = $row['amount'];

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";
$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : "";
//Sent by Paytm pg
//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
        
        
        $subj = "SUCCESSFUL DONATION TO THE SPARKS FOUNDATION";
        // the message
        $msg = "THANK YOU FOR YOUR SUCCESSFUL DONATION OF RUPESS " .$TXN_AMOUNT. " TO THE SPARKS FOUNDATION";

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);
        
        $mail = new PHPMailer(true);
    try{
        $mail->SMTPDebug = 2;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'hiriee1499@gmail.com';                 // SMTP username
        $mail->Password = 'hiren1499';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                 // TCP port to connect to

        $mail->setFrom('hiriee1499@gmail.com', 'THE SPARKS FOUNdATION');
        $mail->addAddress($EMAIL);     // Add a recipient
        $mail->addReplyTo('hiriee1499@gmaill.com');

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subj;
        $mail->Body    = $msg;
        $mail->AltBody = '';
        $mail->send();
        echo 'Message has been sent';
        
        header("refresh:5; url=invoice.php");
    }
        catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
	   }
    }
    else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
?>