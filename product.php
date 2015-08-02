<?php
require_once("db.php");
    class Product{
    	private $name;
		private $price;
		private $description;
		private $category;
		private $quantity;
		private $target_file;
		function __construct($name,$price,$description,$category,$quantity,$target_file){
			$this->name  = $name;
			$this->price = $price;   
			$this->description = $description;
			$this->quantity = $quantity;
			$this->category = $category;
			$this->target_file = $target_file;
		}
		
		
		function setName($name){
			$this->name = $name;
		}
		
		function getName(){
			return $this->name;
		}
		
		function setPrice($price){
			$this->price = $price;
		}
		
		function getPrice(){
			return $this->price;
		}
		
		function getDescription(){
			return $this->description;
		}
		
		function setDescription($description){
			$this->description = $description;
		}
		
		function addProduct(){
			$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die("unable to connect to database");
			mysql_select_db(DB_NAME, $connection);
    		$query = "INSERT INTO product (`id`,`name`,`price`,`description`,`quantity`,`category_id`,`filename`) VALUES (NULL,'$this->name','$this->price','$this->description','$this->quantity','$this->category','$this->target_file')";
			mysql_query($query, $connection) or die("unable to insert the Category");
		}
		
    }
?>