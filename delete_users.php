<?php
include("connect.php");
if(isset($_GET['id'])){
   $id = $_GET['id'];
   $DELETE = mysqli_query($conn,"DELETE FROM users WHERE id='$id'")or die(mysqli_error($conn));
   if($DELETE){
   header("location:users.php");
   }
}
?>