<?php
// include('dashboard.php');
include('connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supplier</title>
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
                    <h3> SUPPLIERS AVAILABLE</h3>
             </div>
             
        <div class="content">

            <div class="product-info-table">
            <button type="button" onclick="clickBtn()" name="add_prod">
            ADD USER
        </button>
                <table border='1'>
                 <tr>
                    <th>ID</th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>Email</th>
                    <th>USERNAME</th>
                    <th>PASSWORDS</th>
                    <th>CREATED-AT</th>
                    <th>UPDATED-AT</th>
                    <th>ACTIONS</th>
                 </tr>
                 <?php 
                  $users=$conn->query("SELECT * FROM users ");
                  foreach ($users as $row) {
                   echo "<tr>
                   <td>". $row['user_id']."</td>
                   <td>". $row['first_name']."</td>
                   <td>". $row['last_name']."</td>
                   <td> ".$row['email']."</td>
                   <td>". $row['username']."</td>
                   <td>". $row['password']."</td>
                   <td>". $row['created_at']."</td>
                   <td>". $row['updated_at']."</td>
                   <td>
                   <a href=update_users.php?user_id=". $row['user_id'].">Edit</a>
                   <a href=delete_users.php?id=". $row['user_id'].">Delete</a>
                   </td>
                  
                </tr>";
                  }
                 ?>
                 
                </table>
            </div>
        </div>
         </div>
    </div>
   </div> 
   <script>
    function clickBtn() {
        window.location.replace("add_user.php");
      
    }
   </script>
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
</html>  a