<?php
session_start();

error_reporting(0);
if(isset($_REQUEST['username'])&& isset($_REQUEST['password']))
{
    $authed = false;
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$authed = auth($username, $password);
    if(!$authed){
	   header("Location:RegistrationPage.html");
     }
    else{
	  $_SESSION['username'] = $username;
	  header("Location:HomeScreen.html");
     }
}
//Code hint to connect returning user to pages:
//$_SESSION['username']=$_REQUEST['username'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Screen</title>
    <style>
    body{
        background-color:lightblue;
        font-family:Courier New;
        }

    </style>
</head>
<body>

 <?php
function auth($username, $password){

    $userfile = fopen("user.txt", "r") or die("Unable to open user file:".$username);
    $tmp_arry = [];
    while(!feof($userfile)){
        $line = trim(fgets($userfile));
        $tmp_arry = explode(":", $line);
        if(!count($tmp_arry)==2){
        continue;
        }
        if($tmp_arry[0] ==$username and $tmp_arry[1]==$password)
        return true;
        }
    return false;
    }

?>
<h1>
    Welcome to the Egg Farm!
</h1>
<h3>You will receive 5 gold coins per play.</h3>
<form name="form" action="" onsubmit="return validateForm()" method="post">
    Enter your name: <br>
    <input type="text" name="username"><br>
    Enter your password:<br>
    <input type="password" name="password">
    <input type="submit" value="Submit">
</form>

<img src = "image014.png" alt = "Red Barn" style = "width:400px;height:400px;">
</img>
<h2>Don't have an account? Sign up here!</h2>
<form>
    <input type="submit" value="Sign Up">
</form>


</body>

</html>
