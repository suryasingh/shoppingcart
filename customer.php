<?php
	require_once 'user.php';
	require_once 'shoppingcart.php';
	require_once 'db.php';
    class Customer extends User{
    	
		var $cart;
    	function __construct(){
    		$this->cart = new ShoppingCart("mycart");
    	}
    	function addTocart($product_id){
    		 if($this->cart->hasItems()){
    		 	if($this->cart->hasItem($product_id) == 1){
    		 		$this->cart->setItemQuantity($product_id, $this->cart->getItemQuantity($product_id)+1);
    		 	}else{
    		 		$this->cart->setItemQuantity($product_id, 1);
    		 	}
				$this->cart->save();
    		 }else{
    		 	$this->cart->setItemQuantity($product_id, 1);
				$this->cart->save();
    		 }
    	}
		
		
		function removeFromCart($product_id){
			$this->cart->removeItem($product_id);
		}
		
		function placeOrder($name,$phone,$address){
			$result = $this->getCart();
			$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die("unable to connect to database");
			mysql_select_db(DB_NAME, $connection);
			foreach($result as $key=>$value){
				$query = "INSERT INTO `order` (`id`,`name`,`phone`,`address`,`product_id`,`quantity`) VALUES (NULL,'$name','$phone','$address','$key','$value')";
				mysql_query($query, $connection) or die("unable to insert the Category");
			}
			session_destroy();
		}
	
		function hasItems(){
			return 	$this->cart->hasItems();
		}
		
		function getCart(){
			return $this->cart->getItems();
		}
    }
?>