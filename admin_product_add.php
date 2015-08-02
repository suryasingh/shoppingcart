<?php
if(!isset($_COOKIE["email"])) {
	$newURL = "localhost:8888/eretail/admin_login.php";
	header('Location: '.$newURL);
	
}
require_once 'header.php';
require_once 'product.php';
require_once 'category.php';
require_once 'administator.php';
$error = "Please fill all the texts in the fields.";
$admin = new Administator();
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description= $_POST['description'];
	$quantity= $_POST['quantity'];
	$category_id = $_POST['category_id'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $error.= "File is not an image.";
        $uploadOk = 0;
    }
	// Check if file already exists
	if (file_exists($target_file)) {
    	$error.= "Sorry, file already exists.";
    	$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
    	$error.=  "Sorry, your file is too large.";
    	$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
    	$error.=  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    	$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
    	$error.=  "Sorry, your file was not uploaded.";
		// 	if everything is ok, try to upload file
	} else {
    	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
   		 } else {
        	$error.= "Sorry, there was an error uploading your file.";
   		 }
	}
	if(!empty($name) && !empty($price) && !empty($description) && !empty($quantity)){
		$admin->addProduct($name,$price,$description,$category_id,$quantity,$target_file);
		$error = "Successfully added:::add more";
	}else{
		$error = "Please fill all the texts in the fields";
	}
}
?>

<div class="container">
 <div class="main" style="margin-top: 10px;">
<form action="admin_product_add.php" method="post" class="smart-green" enctype="multipart/form-data">
    <h1>Add Product
        <span><?php echo $error; ?></span>
    </h1>
    
    <label>
        <span>Nmae :</span>
        <input id="name" type="text" name="name" placeholder="Enter product name" />
    </label>
    <label>
        <span>Price :</span>
        <input id="price" type="text" name="price" placeholder="Enter the price" />
    </label>
    <label>
        <span>Description :</span>
        <textarea id="message" name="description" placeholder="Enter the Description"></textarea>
    </label>
    <label>
        <span>Upload Photo :</span>
        <input type="file" name="fileToUpload" id="fileToUpload" />
    </label>
     <label>
        <span>Quantity :</span>
        <input id="quantity" type="text" name="quantity" placeholder="Enter quantity" />
    </label>
    <label>
 	 <label>
        <span>Category :</span><select name="category_id">
        <?php 
        	  $result = $admin->getAllCategory();
		      while ($row = mysql_fetch_array($result)) {
		 ?>
              <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
        <?php  }?>
        </select>
    </label> 
     <label>
        <span>&nbsp;</span> 
        <input type="submit" name="submit" class="button"  /> 
    </label>    
</form>
</div>
<div class="sidebar">
	<div class="product_cart">
    				<div class="product_header extra_pad">
    					<h3>Menu</h3>
    				</div>
  
    				<ul class="vert-one">
    				
    					<li><a href="http://localhost:8888/eretail/admin.php" title="CSS Menus" >Home</a></li>
    					<li><a href="http://localhost:8888/eretail/admin_product_add.php" title="CSS Menus" class="current">Add Product</a></li>
    					<li><a href="http://localhost:8888/eretail/admin_category_add.php" title="CSS Menus" >Add Category</a></li>
    					
    						
					 </ul>
 				
    			</div>
	</div>
	</div>
​<?php
require_once 'footer.php';
?>
   
