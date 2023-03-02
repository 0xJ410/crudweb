<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'mydatabase');

if (isset($_POST['regUser'])) {

  $fName = mysqli_real_escape_string($db, $_POST['fName']);
  $lName = mysqli_real_escape_string($db, $_POST['lName']);
  $username = mysqli_real_escape_string($db, $_POST['userName']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $psw = mysqli_real_escape_string($db, $_POST['psw']);
  $pswRepeat = mysqli_real_escape_string($db, $_POST['psw-repeat']);

  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($psw)) { array_push($errors, "Password is required"); }
  if ($psw != $pswRepeat) {
	array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM validaccounts WHERE userName='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['userName'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  if (count($errors) == 0) {

  	$query ="INSERT INTO validaccounts(fName, lName, userName, email, psw) VALUES ('$fName','$lName','$username','$email','$psw')";
  	mysqli_query($db, $query);
  	header('location: index.php');
  }
}