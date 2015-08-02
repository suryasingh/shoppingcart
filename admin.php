<?php
if(!isset($_COOKIE["email"])) {
	$newURL = "http://localhost:8888/eretail/admin_login.php";
	header('Location: '.$newURL);	
}
require_once 'header.php';
require_once 'product.php';
require_once 'category.php';
require_once 'administator.php';
require_once 'db.php';
$error = "Please fill all the texts in the fields.";
$admin = new Administator();
?>

<div class="container">
 <div class="main" style="margin-top: 10px;">
 	<?php 
    	
        	  		$result1 = $admin->getAllOrder();
		      		while ($row1 = mysql_fetch_array($result1)) {
		      			$result = $admin->getProductById($row1[4]);
						while ($row = mysql_fetch_array($result)) {
		 		?>
    			<div class="product_wide">
    				<div class="product_header">
    					<h3 class="left_head_1">Customer Name: <?php echo ucfirst($row1[1]); ?></h3><h3 class="right_head_2">Phone No. <?php echo $row1[2]; ?></h3>
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
    					<h5>Product Name : <?php echo ucfirst($row[1]); ?></h5>
    					<h5>Product Price : <?php echo $row[2]; ?></h5>
    					<h5>Product Quantity Ordered : <?php echo $row1[5]; ?></h5>
    					<h5>Shipping Address : <?php echo $row1[3]; ?></h5>
    					<h5>Total Amount : <?php echo $row[2]*$row1[5]; ?></h5>
    				</div>
    				<div class="product_footer clear"> 
    						 					
    				</div>
    				
    			</div>
    			<?php }} ?>
    			
</div>
<div class="sidebar">
	<div class="product_cart">
    				<div class="product_header extra_pad">
    					<h3>Menu</h3>
    				</div>
  
    				<ul class="vert-one">
    				
    					<li><a href="http://localhost:8888/eretail/admin.php" title="CSS Menus" class="current" >Home</a></li>
    					<li><a href="http://localhost:8888/eretail/admin_product_add.php" title="CSS Menus" >Add Product</a></li>
    					<li><a href="http://localhost:8888/eretail/admin_category_add.php" title="CSS Menus" >Add Category</a></li>
    				
    						
					 </ul>
 				
    			</div>
	</div>
	</div>
​<?php
require_once 'footer.php';
?>
   
