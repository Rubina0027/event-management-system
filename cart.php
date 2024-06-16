<?php
  require_once "config.php";
include('session.php');
$username=$login_session;
    if (isset($_POST['submit'])) {
        $pname = mysqli_real_escape_string($db, $_POST['pname']);
$price = mysqli_real_escape_string($db, $_POST['price']);
$qty = mysqli_real_escape_string($db, $_POST['qty']);
$total=$qty * $price;
      
            if(mysqli_query($db, "INSERT INTO cart(username,productname,price,qty,total) VALUES('" .$username."','". $pname . "', " . $price . ", " . $qty . ", " . $total . ")")) 
{
echo "Products Added to cart Successfully!!";

             header("location: cart.php");
             exit();
            } 
else {
               echo "Error: " .mysqli_error($db);
            }
        }
        mysqli_close($db);
    
?>

      
