<?php

@include 'nava.php';

@include 'php/config.php';



session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}



if(isset($_POST['add_supplier'])){

   $NAME = $_POST['NAME'];
   $EMAIL= $_POST['EMAIL'];
   $CONTACT_NUMBER= $_POST['CONTACT_NUMBER'];
   $ADDRESS = $_POST['ADDRESS'];


   if(empty($NAME) || empty($EMAIL) || empty($CONTACT_NUMBER)|| empty($ADDRESS)  ){
      $message[] = 'please fill out all';
   }else{

    $insert="INSERT INTO suppliers(NAME,EMAIL,CONTACT_NUMBER,ADDRESS) VALUES ('$NAME','$EMAIL','$CONTACT_NUMBER','$ADDRESS')";


      $upload = mysqli_query($con,$insert);
      if($upload){

        echo "<script>alert('incorrect email or password')</script>";

         //$message[] = 'New customer added successfully';
      }else{
         $message[] = 'Could not add the customer';
      }
   }

};

if(isset($_GET['delete'])){
   $ID = $_GET['delete'];
 $mes= mysqli_query($conn, "DELETE FROM suppliers WHERE ID = $ID");

if($mes)
{
   echo "<script> alert('data has been delete') </script>";
}
else{
   echo "<script> alert('data has been not delete') </script>";

}


   //header('location:supplier.php');


};

?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SUPPLIER</title>
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
         <h3>add a new supplier</h3>
         <input type="text" placeholder="SUPPLIER NAME" name="NAME" class="box" required>
         <input type="email" placeholder="SUPPLIER EMAIL" name="EMAIL" class="box" required>
         <input type="text" placeholder="SUPPLIER CONTACT NUMBER" name="CONTACT_NUMBER" class="box" required>
         <input type="text" placeholder="SUPPLIER ADDRESS" name="ADDRESS" class="box" required>

         <input type="submit" class="btn" name="add_supplier" value="ADD">
      </form>

   </div>


   
</body>

</html>

  