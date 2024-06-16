<?php
  require_once "config.php";
$errors=array();
include('error.php');
$count=0;

$errors = array(); 
    if (isset($_POST['signup'])) {
$mno = mysqli_real_escape_string($db, $_POST['mno']);
$mobile = mysqli_real_escape_string($db, $_POST['mobile']);
$payment = mysqli_real_escape_string($db, $_POST['payment']);

        $name = mysqli_real_escape_string($db, $_POST['name']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $category = mysqli_real_escape_string($db, $_POST['category']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']); 
        if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
            array_push($errors, "Name Should include only Alphabets");
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "please enter valid email id");
        }
        if(strlen($password) < 6) {
            array_push($errors, "password should be more than 5 characters");
        }       
       
        if($password != $cpassword) {
            array_push($errors, "Password and Confirm Password doesn't match");
        }

$sql = "SELECT * FROM members WHERE name = '$name' ";

     $result = mysqli_query($db,$sql);      
      $row = mysqli_num_rows($result);      
      $count = mysqli_num_rows($result);

      if($count >= 1) {

echo "User Already Exists,Please Try Another Name!!";
exit();
}
        elseif (count($errors) == 0)  {
  
      
            if(mysqli_query($db, "INSERT INTO members(memberno,name, email, validity ,passcode,payment,mobile) VALUES(" .$mno.",'". $name . "', '" . $email . "', '" . $category . "', '" . password_hash($password, PASSWORD_DEFAULT) . "',".$payment.",".$mobile.")")) {
echo "Product Added to Cart Successfully!!";

             header("location: addmember.php");
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
                        <label>Member No</label>
                        <input type="text" name="mno" class="form-control" value="" maxlength="50" required="">
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="" maxlength="50" required="" >
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>

                    <div class="form-group ">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="" maxlength="30" required="" >
                        <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                    </div>
<div class="form-group ">
                        <label>Mobile No</label>
                        <input type="mobile" name="mobile" class="form-control" value="" maxlength="30" required="" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label>Membership Scheme</label>
                        <select name="category" id="category" class="form-control" >
<option value="6 Months">6 Months</option>
<option value="One Year">One Year</option>
<option value="Two Years">Two Years</option>
<span class="text-danger"</span>>
</select>
                    </div>
<div class="form-group ">
                        <label>Payment</label>
                        <input type="payment" name="payment" class="form-control" value="" maxlength="30" required="" >
                        <span class="text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="" maxlength="8" required="" >
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                    </div>  

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="cpassword" class="form-control" value="" maxlength="8" required="" >
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                    </div>

                    <input type="submit" class="btn btn-primary" name="signup" value="Submit">

                    
                </form>
            </div>
        </div>    
    </div>
</body>
</html>


      
