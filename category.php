<?php
require_once("db.php");
    class Category{
    	var $categoryType;
		function setCategoryType($categoryType){
			$this->categoryType = $categoryType;
		}
		
    	function addCategory(){
    		$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die("unable to connect to database");
			mysql_select_db(DB_NAME, $connection);
    		$query = "INSERT INTO category (`id`,`name`) VALUES (NULL,'$this->categoryType')";
			mysql_query($query, $connection) or die("unable to insert the Category");
    	}
		
    }
?>