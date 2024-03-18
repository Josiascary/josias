
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

                  <?php  
                  $user_id = $_GET['user_id'];
                    $sql = $conn->query("SELECT* FROM suppliers WHERE id = '$user_id'")or die(mysqli_error($conn));

                    foreach ($sql as $row ) {
                        $sup_name = $row["supplier_name"];  
                        $sup_loc = $row["supplier_location"];  
                        $sup_email = $row["email"];  
                        $created_by = $row["created_by"];  
                        $create = $row["created_at"];  
                        $update = $row["created_at"];  
                
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
                    <hr>
                    <label for="">product name:</label>
                    <input type="text"name="supname"value="<?php echo $sup_name;?>">
                    <p></p>
                    <label for="">Supplier location:</label>
                    <input type="text"name="loc"value="<?php echo   $sup_loc;?>">
                    <p></p>
                    <label for="">Email:</label>
                    <input type="email"name="sup_email"value="<?php echo   $sup_email;?>">
                    <p></p>
                    <label for="">created_by:</label>
                    <input type="text"name="created_by"value="<?php echo   $created_by;?>">
                    <p></p>
                    <label for="">created_date:</label>
                    <input type="date"name="created_at"value="<?php echo   $create;?>">
                    <p></p>
                    <label for="">updated_date:</label>
                    <input type="date"name="updated_at"value="<?php echo   $update;?>" >
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