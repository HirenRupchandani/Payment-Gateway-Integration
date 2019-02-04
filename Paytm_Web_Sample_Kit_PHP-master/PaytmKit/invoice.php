<?php
$connection = mysqli_connect("localhost","root","","tsf1");    
$query="SELECT * FROM donors ORDER BY id DESC ";
$result=mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($result);
$USER_ID = $row['id'];
$EMAIL = $row['user_email'];
$TXN_AMOUNT = $row['amount'];
?>
<html>
<head>
<style>
    .invoice{
        border: 8px outset blue;
        text-align: center;
        padding: 20px 10px;
        width: 50%;
        background: pink;
        margin: auto;
        font-size: 20px;
    }
    
    body{
        background: url("back.jpg");
        }
</style>        
</head>
<body>
<div class="invoice">
    <h3><u>THE SPARKS FOUNDATION</u></h3>
    <p><b><u>EMAIL</u>: <?php echo $EMAIL ?></b></p>
    <p><b><u>CUSTOMER ID</u>: CUST<?php echo $USER_ID ?></b></p>
    <p><b><u>AMOUNT DONATED</u>: <?php echo $TXN_AMOUNT ?></b></p>
</div>
    
</body>

</html>