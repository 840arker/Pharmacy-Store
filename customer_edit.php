
<?php

@include 'php/conn_database.php';

$id = $_GET['edit'];

if(isset($_POST['update'])){

   $NAME = $_POST['NAME'];
   $CONTACT_NUMBER = $_POST['CONTACT_NUMBER'];
   $ADDRESS = $_POST['ADDRESS'];
   $DOCTOR_NAME = $_POST['DOCTOR_NAME'];
   $DOCTOR_ADDRESS = $_POST['DOCTOR_ADDRESS'];


   if(empty($NAME) || empty($CONTACT_NUMBER) || empty($ADDRESS) || empty($DOCTOR_NAME)|| empty($DOCTOR_ADDRESS) ){
      $message[] = 'Please fill out all!';    
   }else{

      $update_data = "UPDATE customers SET NAME='$NAME', CONTACT_NUMBER='$CONTACT_NUMBER', ADDRESS='$ADDRESS', DOCTOR_NAME='$DOCTOR_NAME', DOCTOR_ADDRESS='$DOCTOR_ADDRESS'  WHERE ID = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){

         $message[] = 'success';


         header('location:add_customer.php');

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
   <link rel="stylesheet" href="css\productstyle.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>


<link rel="stylesheet" href="css/product_style.css">
<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM customers WHERE ID = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the customer</h3>
      <input type="text" class="box" name="NAME" value="<?php echo $row['NAME']; ?>" placeholder="Enter the customer name">
      <input type="number" min="0" class="box" name="CONTACT_NUMBER" value="<?php echo $row['CONTACT_NUMBER']; ?>" placeholder="Enter the contact number">
      <input type="TEXT" min="0" class="box" name="ADDRESS" value="<?php echo $row['ADDRESS']; ?>" placeholder="Enter the address">
      <input type="TEXT" min="0" class="box" name="DOCTOR_NAME" value="<?php echo $row['DOCTOR_NAME']; ?>" placeholder="Enter the ">
      <input type="TEXT" min="0" class="box" name="DOCTOR_ADDRESS" value="<?php echo $row['DOCTOR_ADDRESS']; ?>" placeholder="Enter the ">

      <input type="submit" value="update product" name="update" class="btn">
      <a href="customer_table.php" class="btn">Go back!</a>
   </form>
   


   <?php } ?>

   

</div>

</div>

</body>
</html>