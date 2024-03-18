
<?php
include("connect.php");
session_start();
if(!isset($_SESSION['user'])){
    header("location:index.php");
}

$id = $_GET['id'];
$select= $conn-> query("SELECT * FROM products WHERE id='$id'")or die(mysqli_error($conn));
foreach ($select as $row) {
   
$uname=$_SESSION['user'];
$prod_name = $row['prod_name']; 
$quantity = $row['quantity']; 
$s_name = $row['user_id']; 
$unit_price = $row['unit_price']; 
$created_at = $row['created_at']; 
$updated_at = $row['updated_at']; 
}   

  if (isset($_POST['save'])){

        $pname = $_POST['prod_name']; 
        $quant = $_POST['quantity']; 
        $supname = $_POST['s_name']; 
        $total = $quant*$unit_price ; 
        $create = $_POST['created_at']; 
        $update = $_POST['updated_at'];
         
        $UPDATE = mysqli_query($conn, "UPDATE products SET 
        `prod_name`='$pname',
        `user_id`='$supname',
        `quantity`='$quant',
        `total`='$total',
        `created_at`='$create',
        `updated_at`='$update'  
        WHERE `id`='$id'") or die(mysqli_error($conn));

      if($UPDATE){
        HEADER("LOCATION:PRODUCT.PHP");
      }else{
        echo" <script>alert('product update failed...')</script> ";
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
                <form method="post">
                  <h3>  <U>UPDATE PRODUCT</U></h3>
                    <hr>
                    <label for="">product name:</label>
                    <input type="text"name="prod_name"value="<?php echo   $prod_name;?>">
                    <p></p>
                    <label for="">product Quantity:</label>
                    <input type="text"name="quantity"value="<?php echo   $quantity;?>">
                    <p></p>
                    <label for="">supplier:</label>
                    <input type="text"name="s_name"value="<?php echo   $s_name;?>">
                    <p></p>
                    <label for="">created_date:</label>
                    <input type="date"name="created_at"value="<?php echo   $created_at;?>">
                    <p></p>
                    <label for="">updated_at:</label>
                    <input type="date"name="updated_at"value="<?php echo   $updated_at;?>" >
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