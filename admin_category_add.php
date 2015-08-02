<?php
if(!isset($_COOKIE["email"])) {
	$newURL = "localhost:8888/eretail/admin_login.php";
	header('Location: '.$newURL);
	
}
include 'administator.php';
require_once 'header.php';
require_once 'category.php';
$error = "Please enter the category";
if(isset($_POST['submit'])){
	$cat_name = $_POST['category'];
	if(!empty($cat_name)){
		$admin = new Administator();
		$admin->addCategory($cat_name);
		$error = "Successfully added:::add more";
	}else{
		$error = "Please enter the category";
	}
}
?>
    	<div class="container">
    		<div class="main" style="margin-top: 10px;">
<form action="admin_category_add.php" method="post" class="smart-green">
    <h1>Add Category
        <span><?php echo $error; ?></span>
    </h1>
    
    <label>
        <span>Category Nmae :</span>
        <input id="category" type="text" name="category" placeholder="Enter product name" />
    </label> 
     <label>
        <span>&nbsp;</span> 
        <input type="submit" name="submit" class="button"  /> 
    </label>  
</form>
​</div>
<div class="sidebar">
	<div class="product_cart">
    				<div class="product_header extra_pad">
    					<h3>Menu</h3>
    				</div>
  
    				<ul class="vert-one">
    				
    					<li><a href="http://localhost:8888/eretail/admin.php?category_id=0" title="CSS Menus" >Home</a></li>
    					<li><a href="http://localhost:8888/eretail/admin_product_add.php" title="CSS Menus" >Add Product</a></li>
    					<li><a href="http://localhost:8888/eretail/admin_category_add.php" title="CSS Menus" class="current">Add Category</a></li>
    						
					 </ul>
 				
    			</div>
	</div>
<?php
require_once 'footer.php';
?>