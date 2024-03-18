<?php
include("connect.php");
session_start();
if(!isset($_SESSION['user'])){
    header("location:index.php");
}
if(isset($_POST['add'])){
    $uname=$_SESSION['user'];
    $fname = $_POST['fname']; 
    $lname = $_POST['lname']; 
    $email = $_POST['email']; 
    $username = $_POST['username']; 
    $pass = $_POST['pass']; 
    // $created_by = $_POST['created_by']; 
    $create = $_POST['created_at']; 
    $update = $_POST['updated_at']; 
    $select_user=$conn->query("SELECT user_id FROM users WHERE username='$uname'");
    $fetch_id=mysqli_fetch_assoc($select_user);
    $user_id=$fetch_id['user_id'];
    $INSERT = mysqli_query($conn,"INSERT INTO users (user_id,first_name,last_name,email,username,password,created_at,updated_at) values('','$fname',' $lname','$email','$username','$pass','$create','  $update')")or die(mysqli_error($conn));
    if($INSERT){
        header('location:users.php');
    }else{
       echo' <script>alert("Product not saved!")';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>
    <link rel="stylesheet" href="fontawesome-free-6.2.1-web/css/all.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="dashboard" id="dashboard">

    <?php   
        include("sidebar.php");
    ?>

    <div class="right-panel">
        <div class="right-header">
            <div class="menu-icon">

               <a href="" id="toggleBtn"> <i class="fa fa-bars"></i></a>
         
            
                <a href="index.php" id="power-off"><i class="fa fa-power-off"></i>log-out</a>
            
            
           </div>
         <div class="right-content">
         <div class="product-details-banner">
                    <h3> NEW USER</h3>
             </div>
             
        <div class="content">
    
   
            <div class="add-prod-center">
            <div class="add-product">
                <form action="" method="post">
                  <h3>  <U>ADD USER </U></h3>
                    <hr>
                    <label for="">first name:</label>
                    <input type="text"name="fname">
                    <p></p>
                    <hr>
                    <label for="">last name:</label>
                    <input type="text"name="lname">
                    <p></p>
                    <hr>
                    <label for="">Email:</label>
                    <input type="email"name="email">
                    <p></p>
                    <hr>
                    <label for="">Username:</label>
                    <input type="text"name="username">
                    <p></p>
                    <hr>
                    <label for="">Password:</label>
                    <input type="password"name="pass">
                    <p></p>
                    <!-- <hr>
                    <label for="">created_by:</label>
                    <input type="text"name="created_by">
                    <p></p> -->
                    <label for="">created_at:</label>
                    <input type="date"name="created_at">
                    <p></p>
                    <label for="">updated_at:</label>
                    <input type="date"name="updated_at">
                    <p></p>
                    

                    <div class="button">
                 
                    <button type="button" onclick="BackToProd()" name="add-prod">BACK</button>
                  
                    <button type="submit"name="add">SAVE</button>
                    </div>
                    
                </form>
            </div>
               
            </div>
            </div>
        </div>
         </div>
    </div>
   </div> 
    
   <script>
   function BackToProd(){
       window.location.replace("product.php");
   }
   var leftPanelIsOpen = true;
    
       toggleBtn.addEventListener( 'click', (event) =>{
        event.preventDefault();

        if(leftPanelIsOpen){

     leftPanel.style.width = '10%';    
         menu.style.fontSize= '10%';
         leftPanel.style.transition='.5s all';   
         banner.style.fontSize='20px';  
         menu.style.fontSize='15px';  
        // menu2.style.fontSize='15px'; 
         
         menuIcons = document.getElementsByClassName('menuText');
         for(var i = 0; i < menuIcons.length;i++)
         {
            menuIcons[i].style.display = 'none';
         }
        document.getElementsByClassName('menu')[0].style.textAlign = 'center';
        leftPanelIsOpen = false;
   }else{
     leftPanel.style.width = '20%';    
         menu.style.fontSize= '10%'; 
         leftPanel.style.transition =  '.5sec all'; 
         banner.style.fontSize='30px';  
        //  menu1.style.fontSize='10px';  
        // menu2.style.fontSize='10px'; 
         
         menuIcons = document.getElementsByClassName('menuText');
         for(var i = 0; i < menuIcons.length;i++)
         {
            menuIcons[i].style.display = 'inline-block';
         }
        document.getElementsByClassName('menu')[0].style.textAlign = 'left';
           leftPanelIsOpen = true; 
   }
      
        
       });
   </script>
</body>
</html>  