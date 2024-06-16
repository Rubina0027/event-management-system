<?php
 include('session.php');


  require_once "config.php";
$errors=array();
include('error.php');
$count=0;

$errors = array(); 
    if (isset($_POST['signup'])) {
        $mno = mysqli_real_escape_string($db, $_POST['mno']);
$name = mysqli_real_escape_string($db, $_POST['name']);

        $price = mysqli_real_escape_string($db, $_POST['price']);
$descr = mysqli_real_escape_string($db, $_POST['descr']);
 $vendor=$login_session;       
        if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
            array_push($errors, "Name Should include only Alphabets");
        }
       
if($mno =="") {
            array_push($errors, "No should be  in proper way");
        }       

        
       if(strlen($price) < 0) {
            array_push($errors, "Please eneter Correct Price");
        }       
      
       

      if($count >= 1) {

echo "User Already Exists,Please Try Another Name!!";
exit();
}
        elseif (count($errors) == 0)  {
echo "hello";
            if(mysqli_query($db, "INSERT INTO products(productid,productname, price, description,vendor) VALUES(" .$mno.",'". $name . "', " . $price . ", '" . $descr . "', '" . $vendor . "')")) {
echo "Product Added Successfully!!";

             header("location: signup.php");
             exit();
            } else {
               echo "Error: " .mysqli_error($db);
            }
        }
        mysqli_close($db);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-offset-2">
                <div class="page-header">
                    <h2>Event Management System</h2>
                </div>
                <p>Please fill all fields in the form</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<?php include('error.php'); ?>
<div class="form-group">
                        <label>Product Id</label>
                        <input type="text" name="mno" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" value="" maxlength="50" required="" >
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>

                    
<div class="form-group ">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" value="" maxlength="30" required="" >
                        <span class="text-danger"></span>
                    </div>

                    
<div class="form-group ">
                        <label>Description</label>
                        <input type="payment" name="descr" class="form-control" value="" maxlength="30" required="" >
                        <span class="text-danger"></span>
                    </div>

                   
                    <input type="submit" class="btn btn-primary" name="signup" value="Submit">

                    
                </form>
            </div>
        </div>    
    </div>
</body>
</html>


      
