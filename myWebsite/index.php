<?php 
if(!isset($_SESSION)){
    session_start();
}
$myconnection = new mysqli('localhost','root','','mydatabase');

if(isset($_POST["submit"])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query_sent = "SELECT * FROM validaccounts WHERE psw = '$password' AND userName = '$username'";
        $user = $myconnection->query($query_sent);
        $row = $user->fetch_assoc();
        if($user->num_rows == 1){
            header('location: login-resume.html' );
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in.</title>
    <link rel = "stylesheet" href="display-index.css">
    <script src="js-login-resume.js"></script>
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="logintext">Welcome, please log-in to <b>continue</b>.</div>
    <form method = "post" {  

    }>
    <div class = "border">
        <div class = "login_container">
            <i class="fa fa-user"></i>
            <label for = "username"> <b>Username</B></label>
            <input type="text" placeholder="Your username..." name = "username" required>

            <i class="fa fa-user"></i>
            <label for = "password"> <b>Password</B></label>
            <input type="password" placeholder="Your password..." name = "password" required>

            <button type = "submit" class = "login" name = "submit" id ="submit">
                <span class = "fa fa-check">
                    Login
                </span>
            </button>

            <button class="signup" onclick="window.location.href = 'signup-form.html';">
                <span class="fa fa-question">
                    No account yet? Sign up here.
                </span>
            </button>

            <label>
                <input id="checkbox" type="checkbox" name="rememberMe" > Remember Me
            </label>   
        </div>
    </div>

</body>
</html>