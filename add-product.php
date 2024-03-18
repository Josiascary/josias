<?php
include("connect.php");
session_start();
if(!isset($_SESSION['user'])){
    header("location:index.php");
}
if(isset($_POST['add'])){
    $uname=$_SESSION['user'];
    $prod_name = $_POST['prod_name']; 
    $s_name = $_POST['supplier'];
    $quantity = $_POST['prod_quantity']; 
    $unit =$_POST['unit_price']; 
    $total = $quantity*$unit; 
    $create = $_POST['created_at']; 
    $update = $_POST['updated_at']; 
    $select_user=$conn->query("SELECT user_id FROM users WHERE username='$uname'");
    $fetch_id=mysqli_fetch_assoc($select_user);
    $user_id=$fetch_id['user_id'];
    $INSERT = mysqli_query($conn,"INSERT INTO products(id,prod_name,user_id,quantity,unit_price,total,created_at,updated_at) values('','$prod_name','$user_id',' $quantity','$unit','$total','$create','  $update')")or die(mysqli_error($conn));
    if($INSERT){
        header('location:product.php');
    }else{
       echo' <script>alert("Product not saved!")</> ';
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add_product</title>
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
    
   
            <div class="add-prod-center">
            <div class="add-product">
                <form action="" method="post">
                  <h3>  <U>ADD NEW PRODUCT</U></h3>
                    <hr>
                    <label for="">product name:</label>
                    <input type="text"name="prod_name">
                    <p></p>
                    <label for="">supplier:</label>
                    <input type="text"name="supplier">
                    <p></p>
                    <label for="">product Quantity:</label>
                    <input type="text"name="prod_quantity">
                    <p></p>
                    <label for="">Unit price:</label>
                    <input type="text"name="unit_price">
                    <!-- <p></p>
                    <label for="">product Quantity:</label>
                    <input type="text"name="prod_quantity">
                    -->
                    <p></p>
                    <label for="">created_date:</label>
                    <input type="datetime-local"name="created_at">
                    <p></p>
                    <label for="">updated_at:</label>
                    <input type="datetime-local"name="updated_at" >
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