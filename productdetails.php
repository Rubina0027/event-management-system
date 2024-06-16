<?php
  require_once "config.php";
    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($db, $_POST['vname']);
        
$sql = "SELECT * FROM products WHERE vendor = '$name' ";

      $result = mysqli_query($db,$sql);      
      $row = mysqli_num_rows($result);      
      $count = mysqli_num_rows($result);
?>

<html>
<head>
   <title>Welcome </title>
</head>
<style>
        #geeks1 {
		display: grid;
            grid-template-columns: auto auto auto auto ;
            background-color: gray;
            
            padding: 5px;

        }
#geeks2{
		height: 80px;
            width: 310px;
            background: blue;
            display: inline-block;
text-align: center;
color:white;



        }

.grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid black;
            padding: 10px;
            font-size: 20px;
            text-align: left;
        }
#item2 {
text-align: right;
}
#item1 {
            grid-column-start: 2;
            grid-column-end: 4;
text-align: center;
font-size: 25px;
font-weight: bold;
color:blue;

        }

</style>
<body>
<div id="geeks1">

<div class="grid-item"><a href="index.php">Home</a></div>
<div class="grid-item"></div>
<div class="grid-item"></div>
<div class="grid-item" id="item2"><a href = "logout.php" >Logout</a></div>
<div class="grid-item"></div>
<div class="grid-item" id="item1">Vendor: <?php echo $name; ?> </div>
<div class="grid-item"></div></div>
<div class="grid-item" id="geeks2">Products</div><br>

<?php
if ($result = mysqli_query($db, $sql)) {
  // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {
    ?>
<div class="grid-item" id="geeks2"> <form action="cart.php" method ="post">
<label>Product Name:</label><input type="text"  name="pname" value=<?php echo $row[1]; ?> ></input><br>
<label>Price:</label><input type="text" name="price" value=<?php echo $row[2]; ?> ></input><br>
<label>Quantity:</label><input type="text" value="" name="qty"></input><br>

<input type="submit" name="submit" value="Add to Cart"></input></form> </div>
<?php
  }
  mysqli_free_result($result);
}
}
?>


   
</body>
</html>