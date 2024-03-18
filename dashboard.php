<?php
include('connect.php');
   include("sessions.php");
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

           <?php
   $sql=("SELECT count(*) AS total_products FROM products");
   $query=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($query);
   $total_products=$row['total_products'];

   $sql=("SELECT count(*) AS total_supplier FROM suppliers");
   $query=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($query);
   $total_suppliers=$row['total_supplier'];

   $sql=("SELECT count(*) AS total_users FROM users");
   $query=mysqli_query($conn,$sql);
   $row=mysqli_fetch_assoc($query);
   $total_users=$row['total_users'];
?>
        <div class="content">
            <div class="stock-available-container">

            <div class="stock-available-prod">
             <div class="img">
                <a href="product.php"><h4>stock</h4></a>
               <a href="product.php">
                <i class="fa fa-briefcase icon"></i>
               </a>
                
                <p>total:<?php  echo $total_products;?></p>
               
              
             </div>
            </div>
            <div class="stock-available-prod">
             <div class="img">
                <a href="suppliers.php"><h4>supplier</h4></a>
               <a href="suppliers.php">
                <i class="fa fa-truck icon"></i>
               </a>
                
                <p>total:<?php  echo $total_suppliers;?></p>
              
             </div>
            </div>
            <div class="stock-available-prod">
             <div class="img">
                <a href="users.php"><h4>user</h4></a>
               <a href="users.php">
                <i class="fa fa-user icon"></i>
               </a>
                

               <p>total:<?php  echo $total_users;?></p>


              
             </div>
            </div>
            <!-- <div class="stock-available-sup"></div>
            <div class="stock-available-users"></div> -->
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