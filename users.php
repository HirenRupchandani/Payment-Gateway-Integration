<html>
<head><style>
    
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
            font-family: cursive;
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
    
    <title>
    All users</title></head>
    <body>
<?php
    $connection = mysqli_connect("localhost","root","","tsf1");
    $query1="SELECT * FROM people";
    $res1=mysqli_query($connection,$query1);
?>
    
    <table style="width:100%">
        <thead>
    <tr>
        <th>ID</th>
        
        <th>Name</th>
        <th>Email</th>
        <th>Credit</th>
        </tr></thead>
        <tr>
            <tbody>
            <?php
                while($rows = mysqli_fetch_assoc($res1)){
                    ?>
            <tr>
                <td><?php echo $rows['id'];?></td>
                <td><a href="views.php?id=<?php echo $rows['id']?>&name=<?php echo $rows['name']?>&credit=<?php echo $rows['credit']?>"><?php echo $rows['name'];?></a></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['credit'];?></td>
                </tr>
                <?php             }
                mysqli_close($connection); ?>            
                </tbody></table>
  
    </body></html>