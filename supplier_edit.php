<?php

@include 'php/conn_database.php';

   $ID = $_GET['edit'];


if(isset($_POST['update_supplier'])){

    $NAME = $_POST['NAME'];
    $EMAIL= $_POST['EMAIL'];
    $CONTACT_NUMBER= $_POST['CONTACT_NUMBER'];
    $ADDRESS = $_POST['ADDRESS'];


   if(empty($NAME) || empty($EMAIL) || empty($CONTACT_NUMBER)|| empty($ADDRESS)){
    $message[] = 'Please fill out all!';    
   }else{

      $sql = "UPDATE suppliers SET NAME='$NAME', EMAIL='$EMAIL', CONTACT_NUMBER='$CONTACT_NUMBER',ADDRESS='$ADDRESS' WHERE ID = '$ID'";
      $result = mysqli_query($conn, $sql);

      if($result){
         header('location:supplier_table.php');
      }else{
         $message[] = 'please fill out all!'; 
      }

   }
}

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

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM suppliers WHERE ID = '$ID'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the Supplier</h3>
      <input type="text" class="box" name="NAME" value="<?php echo $row['NAME']; ?>" placeholder="Enter the Supplier Name">
      <input type="email" min="0" class="box" name="EMAIL" value="<?php echo $row['EMAIL']; ?>" placeholder="Enter the Suppliers Email Address">
      <input type="TEXT" min="0" class="box" name="CONTACT_NUMBER" value="<?php echo $row['CONTACT_NUMBER']; ?>" placeholder="Enter the Supplier Contact Number">
      <input type="TEXT" min="0" class="box" name="ADDRESS" value="<?php echo $row['ADDRESS']; ?>" placeholder="Enter the Supplier Address">

      <input type="submit" value="update supplier" name="update_supplier" class="btn">
      <a href="supplier_table.php" class="btn">Go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>