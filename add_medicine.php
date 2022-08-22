<?php
@include 'nava.php';

@include 'php/conn_database.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

if(isset($_POST['add_medicine'])){
   $NAME = $_POST['NAME'];
   $PACKING= $_POST['PACKING'];
   $GENERIC_NAME= $_POST['GENERIC_NAME'];
   $SUPPLIER_NAME = $_POST['SUPPLIER_NAME'];                                  


   if(empty($NAME) || empty($PACKING) || empty($GENERIC_NAME)|| empty($SUPPLIER_NAME)  ){
      $message[] = 'please fill out all';
   }else{

    $insert="INSERT INTO medicines( NAME, PACKING, GENERIC_NAME, SUPPLIER_NAME) VALUES ('$NAME','$PACKING','$GENERIC_NAME','$SUPPLIER_NAME')";


      $upload = mysqli_query($conn,$insert);
      if($upload){

         $message[] = 'New product added successfully'; 
      }else{
         $message[] = 'Could not add the product';
      }
   }

};

if(isset($_GET['delete'])){
   $ID = $_GET['delete'];
  $mes= mysqli_query($conn, "DELETE FROM medicines WHERE ID = $ID");
  if($mes){
    $message[]='detele success';

  }else{
   $message[] = 'Could not add the product';



  }
   
  
  // header('location:add_medicine.php');
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEDICINES</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="\webpharmacy\css\productstyle.css">


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

        <div class="admin-product-form-container">

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <h3>add a new medicines</h3>
                <input type="text" placeholder="MEDICINE NAME" name="NAME" class="box" required>
                <input type="number" placeholder="PACKING" name="PACKING" class="box" required>
                <input type="text" placeholder="GENERIC NAME" name="GENERIC_NAME" class="box" required>
                <input type="text" placeholder="SUPPLIER NAME" name="SUPPLIER_NAME" class="box" required>

                <input type="submit" class="btn" name="add_medicine" value="ADD">



            </form>

        </div>


    </div>


</body>

</html>