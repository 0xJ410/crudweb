<?php

if(isset($_POST['submit'])) 
{
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $psw = $_POST['psw'];
}

  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = "phpMyAdmin";

  $con = mysqli_connect($host, $username, $password, $dbname);

  if (!$con)
  {
      die("Connection failed!" . mysqli_connect_error());
  }

  $sql = "INSERT INTO contactform_entries (id, fName, lName, userName, email, psw) VALUES ('0', '$fName', '$lName','$userName', '$email', '$psw')";


  $rs = mysqli_query($con, $sql);
  if($rs)
  {
      echo "Entries added!";
  }

  mysqli_close($con);


?>