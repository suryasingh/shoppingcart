<?php
    class Address{
    	private $address;
		private $city;
		private $state;
		private $country;
		function setAddress($address){
			$this->address = $address;
		}
		
		function getAddress(){
			return $this->address;
		}
		
		function setCity($city){
			$this->city = $city;
		}
		
		function getcity(){
			return $this->city;
		}
		
		function setCountry($country){
			$this->country = $country;
		}
		
		function getCountry(){
			return $this->country;
		}
    }
	
?>