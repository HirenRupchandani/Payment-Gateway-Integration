# payment-gateway

A simple website that connects users to donate money to the foundation.
On the home page (i.e. index.php), the user is asked to enter their email and the amount they wish to donate.
On clicking the donate button, the user is directed to TxnTest.php where all the details such as transaction_id, donor_id,email, amount, etc are mentioned.
On clicking the check_out button, the user is directed to payment page (Paytm Gateway Integration) where the user can pay the amount either by paytm wallet or saved cards or net banking
and user authentication is carried out by sending an OTP to the mobile number registered on Paytm.
On successful transaction, an email to sent to the user stating the amount donated to the foundation.

To work with sample, install the sample kit on a web server:

Copy PaytmKit folder in document root of your server (like /htdocs/paytm/). 
Open config_paytm.php file from the PaytmKit/lib folder and update the below constant values.

PAYTM_MERCHANT_KEY – Provided by Paytm

PAYTM_MERCHANT_MID - Provided by Paytm

PAYTM_MERCHANT_WEBSITE - Provided by Paytm

PaytmKit folder is having following files:

TxnTest.php – Testing transaction through Paytm gateway.

pgRedirect.php – This file has the logic of checksum generation and passing all required parameters to Paytm PG.

pgResponse.php – This file has the logic for processing PG response after the transaction processing.

TxnStatus.php – Testing Status Query API

And to send email :

Download composer for windows. And make necessary changes (add yor email and password) in pgResponse.php for sending email to the user.

TESTING DETAILS:
For Wallet use 7777777777 as phone number, Paytm12345 as password and set OTP as 489871.
For CC/DC use any valid VISA or MASTER card number, expiry date can be any future date, CVV any three digit number and set OTP as 123123.
