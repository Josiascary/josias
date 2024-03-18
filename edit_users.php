<?php
session_start();
if(!isset($_SESSION['user'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users</title>
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
                    <h3> NEW PRODUCT</h3>
             </div>
             
        <div class="content">
        <?php  
                  $user_id = $_GET['user_id'];
                    $sql = $conn->query("SELECT* FROM users WHERE id = '$user_id'")or die(mysqli_error($conn));

                    foreach ($sql as $row ) {
                        $fname = $row["first_name"];  
                        $lname = $row["last_name"];  
                        $email = $row["email"];  
                        $username = $row["username"];  
                        $pass = $row["password"];  
                        $create = $row["created_at"];  
                        $update = $row["updated_at"];  
                
                    }
                    if(isset($_POST['save'])){
                    $name = $_POST['supname'];
                    $loc = $_POST['loc'];
                    $email = $_POST['sup_email'];
                    $created_by = $_POST['created_by'];
                    $created_at = $_POST['created_at'];
                    $updated_at = $_POST['updated_at'];

                    $sql = $conn->query("UPDATE `suppliers` SET `supplier_name`='$name',supplier_location='$loc',email='$email',created_by='$created_by',created_at='$created_at',updated_at='$updated_at' WHERE id ='$user_id'");
                    
                    if($sql){
                       header("location:suppliers.php");

                    }else{
                        echo"supplier failed to updated..";
                    }
                   } 
                  ?>
   
            <div class="add-prod-center">
            <div class="add-product">
                <form method="post">
                  <h3>  <U>EDIT USER</U></h3>
                    <hr>
                    <label for="">USER NAME:</label>
                    <input type="text"name="fname"value="<?php echo   $fname;?>">
                    <p></p>
                    <label for="">LAST NAME:</label>
                    <input type="text"name="lname"value="<?php echo   $lname;?>">
                    <p></p>
                    <label for="">email:</label>
                    <input type="text"name="email"value="<?php echo   $email;?>">
                    <p></p>
                    <label for="">Username:</label>
                    <input type="text"name="username"value="<?php echo   $username;?>">
                    <p></p>
                    <label for="">Password:</label>
                    <input type="password"name="pass"value="<?php echo   $pass;?>">
                    <p></p>
                    <label for="">Created_at:</label>
                    <input type="text"name="created_at"value="<?php echo   $created_at;?>">
                    <p></p>
                    <label for="">Updated_by:</label>
                    <input type="date"name="updated_at"value="<?php echo   $updated_at;?>">
                     <p></p>

                    <div class="button">
                 
                    <button type="button" onclick="BackToProd()" name="add-prod">BACK</button>
                  
                    <button type="submit"name="save">SAVE</button>
                    </div>
                    
                </form>
            </div>
               
            </div>
            </div>
    </div>
   </div> 

   <script>
   
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