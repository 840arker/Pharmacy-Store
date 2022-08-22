<?php


@include 'php/d-hkm.php';

if(isset($_POST['add'])){
    $supplier_name= $_POST['supplier_name'];
    $invoice_number = $_POST['invoice_number'];
    $purchase_date = $_POST['purchase_date'];
    $total_amount = $_POST['total_amount'];
    $payment = $_POST['payment'];

    $medicine_name = $_POST['medicine_name'];
    $batch_id = $_POST['batch_id'];
    $expirey_date = $_POST['expirey_date'];
    $quantity = $_POST['quantity'];
    $mrp = $_POST['mrp'];  
    $rate = $_POST['rate'];

   


   

    $insert="INSERT INTO `purchase`(`supplier_name`, `invoice_number`,`purchase_date`, `total_amount`, `payment`) VALUES ('$supplier_name','$invoice_number','$purchase_date','$total_amount','$payment')";

    $query = mysqli_query($conn,$insert);

    if($query==1)

    {


     $inser=" INSERT INTO `medicines_stock`( `medicine_name`, `batch_id`, `expirey_date`, `quantity`, `mrp`, `rate`) VALUES ('$medicine_name','$batch_id','$expirey_date','$quantity','$mrp','$rate')";




        $quey = mysqli_query($conn, $inser) or die(mysqli_error($conn));

        if($quey==1)
        {

          echo "<script>alert('purchased successfull')</script>";

            //$message[] = 'add the product';
          
        }
        
        

 
 }

};






if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM purchase WHERE id = $id");
   header('location:purchase.php');
};

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

        <div class="admin-product-form-container">


            <form action="" method="POST" enctype="multipart/form-data">
                <h3>Add A New Purchase</h3>

                <h2><label>SUPPLIER NAME</label></h2>

                <input type="text" class="box" name="supplier_name" id="hh">


                <h2> <label>Invoice NUMBER</label></h2>
                <input type="number" placeholder="Invoice Number" name="invoice_number" class="box" required>


                <h2><label>PURCHASE DATE</label></h2>
                <input type="date" placeholder="Invoice_Date" name="purchase_date" class="box" required>
                <hr>
                </hr>




                <h2> <label>PAYMENT TYPE</label></h2>

                <select name="payment" class="box">
                    <option>Select Payment Type</option>
                    <option>Cash Payment</option>
                    <option>Card Payment</option>
                    <option>Net Banking</option>
                </select>


                <hr>
                <h2> <label>MEDICINE NAME</label></h2>

                <input type="text" placeholder="Medicine Name" name="medicine_name" class="box" required>

                


                <h2> <label>BATCH ID</label></h2>

                <input type="text" placeholder="batch Id" name="batch_id" class="box" required>

                <h2> <label>EXPIREY DATE</label></h2>

                <input type="date" placeholder="Expirey Date" name="expirey_date" class="box" required>

                <h2> <label>rate</label></h2>

                <input type="text" placeholder="Rate" name="rate" id="rate" class="box" required>


                <h2> <label>quantity</label></h2>

                <input type="number" placeholder="Quantity" name="quantity" id="quantity" class="box"
                    onkeyup="generate_total(this.value)" required>

                <h2> <label>MARKET PRICE</label></h2>

                <input type="text" placeholder="Market Price" name="mrp" id="mrp" class="box" required>


                <h2><label>Total-Amount</label></h2>
                <input type="text" placeholder="Invoice_Date" name="total_amount" id="total_amount" class="box"
                    required>
                <hr>
                </hr>












                <input type="submit" class="btn" name="add" value="ADD">
            </form>

        </div>


    </div>

    <script>
    function generate_total(qty)

    {

        document.getElementById("total_amount").value = eval(document.getElementById("quantity").value) * eval(document
            .getElementById("rate").value);
       


    }
    </script>




</body>

</html>