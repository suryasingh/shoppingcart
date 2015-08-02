<?php
class ShoppingCart {
	var $cart_name;       
	var $items = array();
	
	function __construct($name) {
		$this->cart_name = $name;
		if(isset($_SESSION[$this->cart_name])){
			$this->items = $_SESSION[$this->cart_name];
		}
	}

	function hasItems() {
		return (bool) $this->items;
	}

	function setItemQuantity($order_code, $quantity) {
		$this->items[$order_code] = $quantity;
	}
	
	function removeItem($order_code){
		$this->items[$order_code] = 0;
		$this->clean();
		$this->save();
	}
	
	function getItemQuantity($order_code) {
		return (int)$this->items[$order_code] ;
	}
	
	function getItems() {
		return $this->items;
	}
	
	
	function hasItem($order_code){
		if(isset($this->items[$order_code])){
			return 1;
		}
		return -1;
	}
	
	function clean() {
		foreach ( $this->items as $order_code=>$quantity ) {
			if ( $quantity < 1 )
				unset($this->items[$order_code]);
		}
	}
	
	function save() {
		$this->clean();
		$_SESSION[$this->cart_name] = $this->items;
	}
}



?>