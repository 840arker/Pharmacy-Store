<?php

@include 'nava.php';
@include 'php/conn_database.php';



session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}



if(isset($_POST['add_customer'])){
   $NAME = $_POST['NAME'];
   $CONTACT_NUMBER= $_POST['CONTACT_NUMBER'];
   $ADDRESS= $_POST['ADDRESS'];
   $DOCTOR_NAME= $_POST['DOCTOR_NAME'];
   $DOCTOR_ADDRESS = $_POST['DOCTOR_ADDRESS'];


   if  (empty($NAME) || empty($CONTACT_NUMBER) || empty($ADDRESS)|| empty($DOCTOR_NAME)||empty($DOCTOR_ADDRESS)){
      $message[] = 'please fill out all';
   }else{

    $insert="INSERT INTO customers(NAME, CONTACT_NUMBER,ADDRESS, DOCTOR_NAME,DOCTOR_ADDRESS) VALUES ('$NAME','$CONTACT_NUMBER','$ADDRESS','$DOCTOR_NAME','$DOCTOR_ADDRESS')";


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
    $query=mysqli_query($conn, "DELETE FROM customers WHERE id = $ID");

   if(performQuery($query)){
      echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
  }else{
      echo "<script>alert('Unknown error occured.')</script>";
  }

   header('location:add_customer.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CUSTOMERS</title>
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
         <h3>add a new customers</h3>
         <input type="text" placeholder="CUSTOMER NAME" name="NAME" class="box">
         <input type="number" placeholder="CONTACT_NUMBER" name="CONTACT_NUMBER" class="box">
         <input type="text" placeholder="ADDRESS" name="ADDRESS" class="box">
         <input type="text" placeholder="DOCTOR NAME" name="DOCTOR_NAME" class="box">
         <input type="text" placeholder="DOCTOR ADDRESS" name="DOCTOR_ADDRESS" class="box">


         <input type="submit" class="btn" name="add_customer" value="ADD">
      </form>

   </div>

  
   </div>

</div>


</body>
</html>