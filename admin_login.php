<?php 
include 'administator.php';
require_once 'category.php';
$error = "Please enter the information";
if(isset($_COOKIE["email"])) {
	$newURL = "http://localhost:8888/eretail/admin.php";
	header('Location: '.$newURL);
	
}else{
if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	if(!empty($email)&&!empty($password)){
		$admin = new Administator();
		if($admin->checkUser($email,$password) == 1){
			setcookie("email", $email, time() + (86400 * 30));
			$newURL = "http://localhost:8888/eretail/admin.php";
			header('Location: '.$newURL);
		}else{
			$error = "Wrong Password";
		}
	}else{
		$error = "Please enter the required information";
	}
}
}
require_once 'header.php';
?>
<form action="admin_login.php" method="post" class="smart-green">
    <h1>Admin Login
        <span><?php echo $error; ?></span>
    </h1>
    
    <label>
        <span>Your Email :</span>
        <input id="email" type="email" name="email" placeholder="Enter your name" />
    </label>
    <label>
        <span>Password :</span>
        <input id="email" type="password" name="password" placeholder="Enter your password" />
    </label>
 
     <label>
        <span>&nbsp;</span> 
        <input type="submit" name="submit" class="button"  /> 
    </label>    
</form>
​
<?php
require_once 'footer.php';
?>