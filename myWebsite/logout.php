<?php 
session_start();
unset($_SESSION['username']);
unset($_SESSION['ID']);
header("location: index.php");
?>