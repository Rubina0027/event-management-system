<?php
require('script.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Registration Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--bootstrap4 library linked-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
 <div class="row">
   <div class="col-sm-4">
   </div>
   <div class="col-sm-4">
    
    <!--====registration form====-->
    <div class="registration-form">
      <h4 class="text-center">Create a New Account</h4>
      
<p class="text-success text-center"><?php echo $register; ?></p> <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?><" method="post">
        <!--//first name//-->
        <div class="form-group">
           <label for="email">First Name</label>
               
<input type="text" class="form-control" placeholder="Enter First Name" name="first_name" value="<?php echo $set_firstName;?>">
           <p class="err-msg">
            
<?php if($fnameErr!=1){ echo $fnameErr; }?>
           </p>
        </div>
       
        
        <!--// Email//-->
        <div class="form-group">
            <label for="email">Email:</label>
                
<input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $set_email;?>">
            <p class="err-msg">
    
<?php if($emailErr!=1){ echo $emailErr; } ?>
            </p>
        </div>
        
        <!--//Password//-->
        <div class="form-group">
            <label for="pwd">Password:</label>
               
            <input type="password" class="form-control"  placeholder="Enter password" name="password"
            <p class="err-msg">
                
<?php if($passErr!=1){ echo $passErr; } ?>
            </p>
        </div>
        <!--//Confirm Password//-->
        <div class="form-group">
            <label for="pwd">Confirm Password:</label>
            <input type="password" class="form-control" placeholder="Enter Confirm password" name="cpassword">
            <p class="err-msg">
                
<?php if($cpassErr!=1){ echo $cpassErr; } ?>
            </p>
        </div>
     <div class="form-group">
            <label for="Cat">Category:</label>
<select name="cat" id="cat" class="form-control">
<option value="Catering">Catering</option>
<option value="Florist">Florist</option>
<option value="Decoration">Decoration</option>
<option value="Lightning">Lightning</option>
</select>
</div>

        <button type="submit" class="btn btn-danger" name="submit">Register Now</button>
      </form>
    </div>
   </div>
   <div class="col-sm-4">
   </div>
 </div>
  
</div>
</body>
</html>