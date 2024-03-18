<?php
include("connect.php");
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
    <title>products</title>
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
                    <h3> STOCK AVAILABLE</h3>
             </div>
             
        <div class="content">

            <div class="product-info-table">
            <button type="button" onclick="clickBtn()" name="add_prod">
            ADD PRODUCT
        </button>
                <table border='1'>
                 <tr>
                    <th>ID</th>
                    <th>PRODUCT NAME</th>
                    <th>supplied_by</th>
                    <th>Quantity</th>
                    <th>UNIT PRICE</th>
                    <th>TOTAL AMOUNT</th>
                    <th>Delivery-date</th>
                    <th>Updating-date</th>
                    <th>stock out</th>
                    <th>ACTION</th>
                 </tr>
                 <?php 
                  $products=$conn->query("SELECT * FROM products ");
                  foreach ($products as $row) {
                   echo '<tr>
                   <td>'. $row["id"].'</td>
                   <td>'. $row["prod_name"].'</td>
                   <td>'. $row["user_id"].'</td>
                   <td> '.$row["quantity"].'</td>
                   <td> '.$row["unit_price"].'</td>
                   <td> '.$row["total"].'</td>
                   <td>'. $row["created_at"].'</td>
                   <td>'. $row["updated_at"].'</td>
                   <td>
                   <a href="stock_out.php?id='.$row['id'].'">outflow</a>
                   </td>
                   <td> 
                    
            
                 
                    <a href="update.php?id='.$row['id'].'"><img src="update.png"></a> 
                   <a href="delete.php?id='.$row["id"].'"> <img src="delete.PNG" width="40px" alt=""> </a> 
                    
                   </td>
                  
                </tr>';
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
        window.location.replace("add-product.php");
      
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
</html>  