<html>
<head><style>
        input[type=text] {
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
    
    
        h1
        {
            font-weight: bolder;
            text-align: center;
        }
        table
        {
            border: solid black;
            width: 100%;
            color: black;
            font-family: cursive;
            font-size: 25px;
            text-align: left;
        }
        
        th
        {
            border:  solid black;
            background-color: darkolivegreen;
            color: black;
        }
    
        td
        {
            border:  solid black;
        }
        
        tr:nth-child(even)
        {
            border:  solid black;
            background-color: lightgoldenrodyellow;
        }
        
        a{
            color: firebrick;
        }
    
        body{
        background: url("back.jpg"); 
        }
    
        a.users {
        background-color: rgba(255, 0, 0);
        color:white;
        padding: 14px 30px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        border:2px solid black;
    }
    
    </style>
    </head>
    <body>
<?php
$id = $_REQUEST['id'];
$name = $_REQUEST['name'];
$credit= $_REQUEST['credit'];
$connection = mysqli_connect("localhost","root","","tsf1");
$query="SELECT * FROM transaction WHERE sender_id = $id";
$result=mysqli_query($connection,$query);
?>
        
 <table style="width:100%">
        <thead>
        <tr>
        <th>Transaction no.</th>
        <th>SenderName</th>
        <th>SenderId</th>
        <th>ReceiverName</th>
        <th>ReceiverId</th>
        <th>Credits transferred</th>
        </tr></thead>
        <tr>
        <tbody>
        <?php
            while($rows = mysqli_fetch_assoc($result)){                    ?>
            <tr>
            <td><?php echo $rows['transaction_id'];?></td>
                <td><?php echo $rows['sender'];?></td>
                <td><?php echo $rows['sender_id'];?></td>
                <td><?php echo $rows['receiver'];?></td>
                <td><?php echo $rows['receiver_id'];?></td>
                <td><?php echo $rows['credit_transferred'];?></td>
            </tr>
            <h1><?php   
            }
                    echo "Name: ".$name;    ?><br>
            <?php   echo "ID: ".$id;   ?><br>
            <?php   echo "Current Credits: ".$credit;
            mysqli_close($connection); ?></h1>            
                </tbody></table><br><br>
        
        <?php session_start();
        $_SESSION['name'] = $name; 
        $_SESSION['id'] = $id;
        $_SESSION['credit'] = $credit;
        ?>
        
        <form name="myForm" action="transfer.php" method="POST">
        Receiver Name<input name="receiver" type="text"><br>
        Receiver ID<input name="receiver_id" type="text"><br>
        Credits to transfer<input name="credit_transferred" type="text"><br>
        <input type="submit" name="transfer" value="TRANSFER"><br>
        </form>
        <a href="users.php" class="users">VIEW AVAILABLE USERS</a>
    </body>
</html>