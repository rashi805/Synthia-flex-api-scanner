
<?php

session_start();
include "../DB_connect/db.php";

if(isset($_POST['login'])){

$email=$_POST['email'];
$password=$_POST['password'];

$query="SELECT * FROM admins WHERE email='$email' AND password='$password'";
$result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)==1){

$_SESSION['admin']=$email;

header("Location: dashboard.php");

}else{

$error="Invalid Email or Password";

}

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#0f172a;
font-family:Segoe UI;
}

.login-box{
background:#1e293b;
color:white;
padding:30px;
border-radius:10px;
width:350px;
margin:auto;
margin-top:120px;
}

</style>

</head>

<body>

<div class="login-box">

<h3 class="text-center mb-4">Admin Login</h3>

<?php if(isset($error)){ ?>

<div class="alert alert-danger"><?php echo $error; ?></div>

<?php } ?>

<form method="POST">

<input type="email" name="email" class="form-control mb-3" placeholder="Admin Email" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

<button class="btn btn-primary w-100" name="login">Login</button>

</form>

</div>

</body>

</html>
