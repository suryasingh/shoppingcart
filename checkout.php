<?php
session_start();
require_once 'product.php';
require_once 'category.php';
require_once 'administator.php';
require_once 'customer.php';
require_once 'db.php';
$customer = new Customer();
$error = "Please fill all the texts in the fields.";
$output = 1;
$total = $_GET['ch_price'];
$admin = new Administator();
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$phone= $_POST['phone'];
	$address= $_POST['address'];
	if(!empty($name) && !empty($phone) && !empty($address)){
		$customer->placeOrder($name,$phone,$address);
		$error = 'Your order has been Successfully placed. Go to the <a href="http://localhost:8888/eretail/index.php">Home Page</a>';
		$output = 0;
	}else{
		$error = "Please fill all the texts in the fields";
		$output = 1;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>E Retail System</title>
    </head>
    <body>
    	<div class="header">
    		<h2>E Retail Store - Checkout Page</h2>
    	</div>
<form action="checkout.php?ch_price=<?php echo $total; ?>" method="post" class="smart-green">
    <h1>Totatl Price : <?php echo $total;?>
        <span><?php echo $error; ?></span>
    </h1>
    <?php if($output == 1){ ?>
    <label>
        <span>Nmae :</span>
        <input id="name" type="text" name="name" placeholder="Enter your name" />
    </label>
    <label>
        <span>Phone :</span>
        <input id="price" type="text" name="phone" placeholder="Enter the phone Number" />
    </label>
    
     <label>
        <span>Address :</span>
        <input id="quantity" type="text" name="address" placeholder="Enter address" />
    </label>
     <label>
        <span>&nbsp;</span> 
        <input type="submit" name="submit" class="button"  /> 
    </label>   
    <?php } ?> 
</form>
​<?php
require_once 'footer.php';
?>
   
