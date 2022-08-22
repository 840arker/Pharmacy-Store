<?php


@include 'php/conn_database.php';


session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:home.php');
}

$ID = $_GET['edit'];

if(isset($_POST['update'])){

   $NAME = $_POST['NAME'];
   $PACKING = $_POST['PACKING'];
   $GENERIC_NAME = $_POST['GENERIC_NAME'];
   $SUPPLIER_NAME = $_POST['SUPPLIER_NAME'];



   if(empty($NAME) || empty($PACKING) || empty($GENERIC_NAME) || empty($SUPPLIER_NAME) ){
      $message[] = 'Please fill out all!';   
        
   }else{

   
      
      $sql = "UPDATE medicines SET NAME='$NAME', PACKING='$PACKING', GENERIC_NAME='$GENERIC_NAME', SUPPLIER_NAME='$SUPPLIER_NAME'  WHERE  ID = '$ID'";
      $result = mysqli_query($conn, $sql);
   
   
      if($result){
           
         header('location:medicine_table.php');

      }else{

         $message[] = 'please fill out all!'; 

      }

   
}
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\product_style.css">

</head>

<body>


    <div class="container">


        <div class="admin-product-form-container centered">

            <?php
            $select = mysqli_query($conn, "SELECT * FROM medicines WHERE ID = '$ID'");
      while($row = mysqli_fetch_assoc($select)){

   ?>

            <form action="" method="post" enctype="multipart/form-data">
                <h3 style="border-top: 5px solid #ff5252;" class="title">update Medicine</h3>
                <input type="text" class="box" name="NAME" value="<?php echo $row['NAME']; ?>"
                    placeholder="Enter the product name">

                    
                <input type="number" min="0" class="box" name="PACKING" value="<?php echo $row['PACKING']; ?>"
                    placeholder="packing">

                <input type="TEXT" min="0" class="box" name="GENERIC_NAME" value="<?php echo $row['GENERIC_NAME']; ?>"
                    placeholder="Enter the product price in pcs">

                <input type="TEXT" min="0" class="box" name="SUPPLIER_NAME" value="<?php echo $row['SUPPLIER_NAME']; ?>"
                    placeholder="Enter the product price in pcs">
                    <hr style="border-top: 5px solid #ff5252;">


                <input type="submit" value="update medicine" name="update" class="btn">
                <a href="medicine_table.php" class="btn">Go back!</a>
            </form>




            <?php } ?>

        </div>

    </div>

</body>

</html>