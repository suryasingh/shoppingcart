<?php
require_once 'user.php';
require_once 'product.php';
require_once 'category.php';
require_once 'db.php';
class Administator extends User{
	
	function addProduct($name,$price,$description,$category_id,$quantity,$target_file){
		$product = new Product($name,$price,$description,$category_id,$quantity,$target_file);
		$product->addProduct();	
	}
	
	function removeProduct(){
		
	}
	
	function addCategory($cat_name){
		$category = new Category();
		$category->setCategoryType($cat_name);
		$category->addCategory();
		
	}
	
	function removeCategory(){
		
	}
	
	function getAllCategory(){
			$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die("unable to connect to database");
			mysql_select_db(DB_NAME, $connection);
    		$query = "SELECT * FROM category";
			$result = mysql_query($query, $connection) or die("unable to insert the Category");
			return $result;
	}
	
	function getAllProduct(){
			$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die("unable to connect to database");
			mysql_select_db(DB_NAME, $connection);
    		$query = "SELECT * FROM product";
			$result = mysql_query($query, $connection) or die("unable to insert the Category");
			return $result;
	}
		
	function getProductByCategoryId($id){
			$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die("unable to connect to database");
			mysql_select_db(DB_NAME, $connection);
    		$query = "SELECT * FROM product WHERE category_id = ".$id;
			$result = mysql_query($query, $connection) or die("unable to get the product by Category id");
			return $result;
	}
	
	
	function getProductById($id){
			$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die("unable to connect to database");
			mysql_select_db(DB_NAME, $connection);
    		$query = "SELECT * FROM product WHERE id = ".$id;
			$result = mysql_query($query, $connection) or die("unable to get the product by Id");
			return $result;
	}
	
	function getAllOrder(){
			$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die("unable to connect to database");
			mysql_select_db(DB_NAME, $connection);
    		$query = "SELECT * FROM `order`";
			$result = mysql_query($query, $connection) or die("unable to query order");
			return $result;
	}
	
	function checkUser($email,$password)
	{
		$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die("unable to connect to database");
		mysql_select_db(DB_NAME, $connection);
    	$query = "SELECT * FROM `user` WHERE email='$email' and password='$password'";;
		$result = mysql_query($query, $connection) or die("unable to get the product by Id");
		$count=mysql_num_rows($result);
		return $count;
		
	}
		
	
}

?>