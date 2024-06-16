<?php
   include('session.php');
?>
<html>
<head>
   <title>Welcome </title>
</head>
<style>
        #geeks1 {
		display: grid;
            grid-template-columns: auto auto auto auto;
            background-color: gray;
            
            padding: 5px;

        }
.grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid black;
            padding: 10px;
            font-size: 20px;
            text-align: center;
        }
</style>
<body>
<h2 align="left"><a href="index.php">Home</a>&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp  &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp &nbsp&nbsp&nbsp<a href = "logout.php">Logout</a></h2>
<h1><center>Welcome <?php echo $login_session; ?></h1> <br>
<br>
<br><center>
                       <div id="geeks1">
 <div class="grid-item" ><label>Vendor</label>
<form action="vendors.php" method="post">
                        <select name="category" id="category" >
<option value="Catering">Catering</option>
<option value="Florist">Florist</option>
<option value="Decoration">Decoration</option>
<option value="Lightning">Lightning</option>
</select>
 <input type="submit" name="submit" value="Submit">    
</form>
</div>               
<div class="grid-item"><a href="cart.php">Cart</a></div>
<div class="grid-item">Guest List</div>
<div class="grid-item"><a href="order.php">Order Status</a></div>
</div>

   
</body>
</html>