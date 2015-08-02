<?php
require_once("address.php");
class User{
	private $name;
	private $address;
	private $phone;
	private $email;
	
	function __construct($name,$address,$phone,$email){
		$this->name = $name;
		$this->address = $address;
		$this->phone = $phone;
		$this->email = $email;
	}
	
	function setName($name){
		$this->name = $name;
	}
	
	function getName(){
		return $this->name;
	}
	
	function setPhone($phone){
		$this->phone = $phone;
	}
	function getPhone(){
		return $this->phone;
	}
	
	function setEmail($email){
		$this->email = $email;
	}
	
	function getEmail(){
		return $this->email;
	}
	
	
	function setAddree($address){
		$this->address = $address;
	}
	
	function getAddress(){
		return $this->address;
	}
}
?>