<?php
include('connect.php');
session_start();
if(isset($_POST['submit'])){
  $user = $_POST['username'];
  $pass = $_POST['password'];
  $select = mysqli_query($conn, "select * FROM users WHERE username='$user' AND password='$pass'");
if($row = $select->fetch_assoc()){
    $_SESSION['user']=$user;
    header("location:dashboard.php");
}else{
  echo "<script>
  alert('user not found...');
  </script>";
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecole Primaire Sainte Anne</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h1>Ecole Primaire Sainte Anne</h1>
    <div class="banner">
        <div class="banner-img">
        
          
        </div>
   
    <div class="login">
       
        <form action="" method="post">
        <h2>login</h3>
        <p>Enter your credentials</p>
            <label for="">username:</label>
            <input type="text" name="username" value="">
            <p></p>
            <label for="">password:</label>
            <input type="password" name= "password" value="">
            <p></p>
            <button type="submit"  name="submit">login</button>
            <p></p>
            <a href="register.php">Create new account.</a>
        </form>

    </div>
          </div>
    </div>
   
</body>
</html>