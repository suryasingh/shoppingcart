<?php
session_start();
require_once 'administator.php';
require_once 'customer.php';
$admin = new Administator();
$customer = new Customer();
$category_id = 0;
if(!empty($_GET['category_id'])){
	$category_id = $_GET['category_id'];
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
    		<h2>E Retail Store</h2>
    	</div>
    	
    	<div class="container">
    		<div class="main">
    			<?php 
    			 
        	  		$result = $admin->getProductById($_GET['view_product_id']);
		      		while ($row = mysql_fetch_array($result)) {
		 		?>
    			<div class="product_wide">
    				<div class="product_header">
    					<h3 class="left_head"><?php echo ucfirst($row[1]); ?></h3><h3 class="right_head">Rs. <?php echo $row[2]; ?></h3>
    					<div class="clear"></div>
    				</div>
    				<div class="product_image_wide">
    					<?php
    					if(empty($row[6])){
    						$img = "sury.jpg";
    					}else{
    						$img = $row[6];
    					}
    					?>
    					<img src="<?php echo $img; ?>"  height="175px" width="190px"/>
    				</div>
    				
    				<div class="product_description">
    					
    					<h2>Product Description</h2>
    					<p><?php echo $row[3]; ?></p>
    				</div>
    				<div class="product_footer clear"> 
    						<a href="http://localhost:8888/eretail/index.php?product_id=<?php echo $row[0]; ?>">Add to cart </a>  					
    				</div>
    				
    			</div>
    			<?php } ?>
    			
    			
    		</div>
    		<div class="sidebar">
    			<div class="product_cart">
    				<div class="product_header">
    					<h3>Cart</h3>
    				</div>
    				
    					<?php 
    			 
    			 		if(isset($_GET['product_id'])){
    			 			$customer->addTocart($_GET['product_id']);
						}
						if(isset($_GET['remove'])){
    			 			$customer->removeFromCart($_GET['product_id']);
						}
						if (!$customer->hasItems()) {
							?> 
							<div class="info">
								<p>Your Cart is empty</p>
							</div>
							
						<?php }
        	  				$result = $customer->getCart();
		      				foreach($result as $key=>$value) {
		      					$result = $admin->getProductById($key);
		      					while ($row = mysql_fetch_array($result)) {
		 				?>
    					<div class="info">
    					<div class="cart_img">
    						<?php
    					if(empty($row[6])){
    						$img = "sury.jpg";
    					}else{
    						$img = $row[6];
    					}
    					?>
    						<img src="<?php echo $row[6]; ?>" width="50px" height="60" />
    					</div>
    					<div class="cart_desc">
    						<h3><?php echo $row[1]; ?></h3>
    						<h3>Quantity: <?php echo $value; ?></h3>
    					</div>
    					<div class="cart_price">
    						<h3>Price</h3>
    						<h3>Rs. <?php echo $value*$row[2]; 
							$total += $value*$row[2];
    							?></h3>
    					</div>
    					<div class="cart_cancel">
    						<a href="http://localhost:8888/eretail/index.php?product_id=<?php echo $key; ?>&&remove=1">X</a>
    					</div>
    					<div class="clear"></div>
    					</div>
    					<?php } } ?>
    					<div class="info">
    						<h4>Total Amount :    <?php echo $total; ?></h4>
    					</div>
    				
    				<div class="product_footer">
    						<?php if ($customer->hasItems()) {
							?> 
							<a href="http://localhost:8888/eretail/checkout.php?ch_price=<?php echo $total; ?>">Check Out </a>
							
						<?php }else{ ?>
    						<a href="#">Check Out </a>
    						<?php } ?>   
    				</div>
    				
    			</div>
    			<div class="product_cart">
    				<div class="product_header extra_pad">
    					<h3>Category</h3>
    				</div>
  
    				<ul class="vert-one">
    					<?php
    					if($category_id == 0){
						?>
    					<li><a href="http://localhost:8888/eretail/index.php?category_id=0" title="CSS Menus" class="current">Home</a></li>
    					<?php 
						}else{
							?>
							<li><a href="http://localhost:8888/eretail/index.php?category_id=0" title="CSS Menus" >Home</a></li>
							<?php
						}
        	  				$result = $admin->getAllCategory();
		      				while ($row = mysql_fetch_array($result)) {
		      					if($row[0] == $category_id){
		      						?>
		      						<li><a href="http://localhost:8888/eretail/index.php?category_id=<?php echo $row[0]; ?>" title="CSS Menus" class="current"><?php echo ucfirst($row[1]); ?></a></li>
		      						<?php
		      					}else{
		 				?>
  						<li><a href="http://localhost:8888/eretail/index.php?category_id=<?php echo $row[0]; ?>" title="CSS Menus"><?php echo ucfirst($row[1]); ?></a></li>
  						<?php
								}
								$i++;
							}
  						?>
  						
					 </ul>
 				
    			</div>
    		</div>
    		<div class="clear"></div>
    	</div>
    	
 	</body>
</html>
