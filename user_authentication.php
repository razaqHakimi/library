<?php
session_start();

session_regenerate_id();

if(!isset($_SESSION["session_login"])){

header("location:login.php");
}
?>