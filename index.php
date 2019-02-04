<html>
<head>
    <style>
     body{
        background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
         text-align: center;
          font-size: 40px;
        
    }
        h1{
             text-shadow: 1px 2px 4px #000000;
        
        }
        .button{
            background-color: cadetblue;
            font-size: 30px;
            border-radius: 8px;
            padding: 20px 20px;
            color: aliceblue;
            cursor: pointer;
        }
        .details input{
                width: 20%;
            }
            .details input[type="text"],input[type="email"]{
                border: none;
                border-bottom: 3px solid #000;
                background: transparent;
                outline: none;
                height: 40px;
                font-size: 26px;
                padding: 10px 10px;
            }
    
    </style>
    <title>transfer</title>
    <script>
    function validateForm(){
        var x = document.forms["donate"]["amt"].value;
        if(isNaN(x))
            {
                alert("Enter amount in rupees.");
                return false;
            }
    }
    </script>
    </head>
<body style="background-image:url(1.jpg); ">
    <br><h1>The Sparks Foundation</h1>
    <br><br><br>
    <div class="details">
    <form action="TxnTest.php" method="POST" name="donate" onsubmit="return validateForm()">
	<div class="form-group">
        <label for=""><B>Enter Email : </B></label>
		<input type="email" class="form-control" id="EMAIL" name="EMAIL" required> &ensp;&ensp;
        <label for=""><B>Enter Amount : </B></label>
		<input type="text" class="form-control" id="TXN_AMOUNT" name="TXN_AMOUNT" required>
	</div>


<br>
	<button type="submit" class="button" name="submit">DONATE</button>
</form>
</div>
    </body>