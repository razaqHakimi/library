<?php
session_start();
setcookie("username","username",time()-1000);
setcookie("password","password",time()-1000);

session_destroy();

//redirect
header("location:login.php");
?>