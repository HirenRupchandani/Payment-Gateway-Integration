<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
    $TXN_AMOUNT = $_POST["TXN_AMOUNT"];
    $EMAIL = $_POST['EMAIL'];
    $connection = mysqli_connect("localhost","root","","tsf1");
    $query1="INSERT INTO donors(user_email,amount)
    VALUES ('$EMAIL','$TXN_AMOUNT')";
    $result1=mysqli_query($connection,$query1);
    $query="SELECT * FROM donors WHERE user_email = '$EMAIL' ";
    $result=mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);
    $USER_ID = $row['id'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style>
        input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border-left: 5px solid red;
            background-color: lightgoldenrodyellow;
        }
        input[type=submit]{
            background-color: red;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            border: 2px solid black;
            border-radius: 4px;
        }
    
        a{
            color: firebrick;
        }
        body{
        background: url("back.jpg"); 
        }
    
        h1
        {
            font-weight: bolder;
            text-decoration: underline;
        }
        table
        {
            border: 2px solid black;
            width: 100%;
            color: black;
            font-size: 25px;
            text-align: left;
        }
        
        th
        {
            border: 2px solid black;
            background-color: darkolivegreen;
            color: black;
        }
        
        tr:nth-child(even)
        {
            border: 2px solid black;
            background-color: lightgoldenrodyellow;
        }
        td
        {
            border:  solid black;
        }
    </style>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body>
	<h1>Merchant Check Out Page</h1>
	<pre>
	</pre>
	<form method="post" action="pgRedirect.php">
		<table border="1">
			<tbody>
				<tr>
					
					<th>DETAILS</th>
				
				</tr>
				<tr>
					
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly>
					</td>
				</tr>
				<tr>
					
					<td><label>DONOR_ID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo  "CUST" . "$USER_ID"?>" readonly></td>
				</tr>
				<tr>
				
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="RETAIL" readonly></td>
				</tr>
				<tr>
					
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
					</td>
				</tr>
				<tr>
					
					<td><label>Amount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php echo "$TXN_AMOUNT" ?>" readonly>
					</td>
				</tr>
                <tr>
                <tr>
					<td><label>Email*</label></td>
					<td><input title="EMAIL" tabindex="10"
						type="text" name="EMAIL"
						value="<?php echo "$EMAIL" ?>" readonly>
					</td>
				</tr>
				<tr>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>
</body>
</html>