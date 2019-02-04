<?php
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$credit= $_SESSION['credit'];
$receiver= $_REQUEST['receiver'];
$receiver_id=$_REQUEST['receiver_id'];
$credit_transferred=$_REQUEST['credit_transferred'];

    $connection = mysqli_connect("localhost","root","","tsf1");
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // Set autocommit to off
    mysqli_autocommit($connection,FALSE);

    $query0="SELECT * FROM people where name='$receiver' and id='$receiver_id'";
    $res0=mysqli_query($connection,$query0);
    $num=mysqli_num_rows($res0);
    if($num>0 && (($credit-$credit_transferred)>=200))
    {
    $query1="UPDATE people SET credit=(credit + $credit_transferred) where id='$receiver_id' and name='$receiver'";
    $res1=mysqli_query($connection,$query1);
    
    $query2="UPDATE people SET credit=($credit - $credit_transferred) where id='$id' and name='$name'";
    $res2=mysqli_query($connection,$query2);

    $query3="INSERT INTO transaction(sender,sender_id,receiver,receiver_id,credit_transferred) VALUES ('$name','$id','$receiver','$receiver_id','$credit_transferred')";
    
    $res3=mysqli_query($connection,$query3);
    
    if($res1 and $res2 and $res3){
        echo "Transaction successful";
        // Commit transaction
        mysqli_commit($connection);
    }
    else{
        echo "Transaction failed";
        // Rollback transaction
        mysqli_rollback($connection);
    }
    }
    else{
        echo "Invalid Receiver Credentials or Insufficient Credits\n";  
        echo "Transaction Failed";
    }
    // Close connection
        header("refresh:2; url=users.php");
        mysqli_close($connection);
    
?>