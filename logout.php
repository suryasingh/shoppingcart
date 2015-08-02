<?php
setcookie("email", "", time() - 3600);
$newURL = "http://localhost:8888/eretail/admin_login.php";
header('Location: '.$newURL);
?>