<?php
   include("config.php");
   session_start();
   $error='';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
   
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

      $sql = "SELECT * FROM vendors WHERE username = '$myusername' ";

      $result = mysqli_query($db,$sql);      
      $row = mysqli_num_rows($result);      
      $count = mysqli_num_rows($result);
$row1 = $result->fetch_assoc();
 $hash=$row1["passcode"];
echo $hash;
$verify = password_verify($mypassword, $hash); 
echo $verify;
      if($verify) {
     
	  
         // session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         header("location: vendor.php");
      } else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
<head>
   <title>Login Page</title>
   <style type = "text/css">
      body {
         font-family:Arial, Helvetica, sans-serif;
         font-size:14px;
      }
      label {
         font-weight:bold;
         width:100px;
         font-size:14px;
      }
      .box {
         border:#666666 solid 1px;
      }
   </style>
</head>
<body bgcolor = "#FFFFFF">
   <div align = "center">
      <div style = "width:300px; border: solid 1px #333333; " align = "left">
         <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Vendor Login</b></div>
         <div style = "margin:30px">
            <form action = "" method = "post">
               <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
               <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
               <input type = "submit" value = " Submit "/><br />
		New Vendor Sign Up Here <a href="signup.php">Sign Up</a>
            </form>
            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
         </div>
      </div>
   </div>
</body>
</html>