<?php


@include 'php/d-hkm.php';

if(isset($_POST['add_sales'])){



    $medicine_name = $_POST['medicine_name'];
    $batch_id = $_POST['batch_id'];
    $aviable_quantity = $_POST['aviable_quantity'];


    $expirey_date = $_POST['expirey_date'];
    $market_price = $_POST['market_price'];

    $quantity = $_POST['quantity'];
    $total_amount = $_POST['total_amount'];
    $paid_amount = $_POST ['paid_amount'];
    $change_amount = $_POST ['change_amount'];
    $payment_status = $_POST['payment_status'] ;

    $net_total = $_POST['net_total'] ;
    $total_discount = $_POST['total_discount'] ;

    $customer = $_POST['customer'] ;
    $invoice_date = $_POST['invoice_date'] ;




    $insert="INSERT INTO `ssales`(`medicine_name`, `batch_id`, `aviable_quantity`, `expirey_date`, `market_price`, `quantity`, `total_amount`, `paid_amount`, `change_amount`, `payment_status`) VALUES ('$medicine_name','$batch_id','$aviable_quantity','$expirey_date','$market_price','$quantity','$total_amount','$paid_amount','$change_amount','$payment_status')";

    $query = mysqli_query($conn,$insert);


    if($query==1)

    
    {
      // $insert= "INSERT INTO `ssales`(`medicine_name`, `batch_id`, `aviable_quantity`, `expirey_date`, `market_price`, `quantity`, `total_amount`, `paid_amount`, `change_amount`,`payment-status`) VALUES ('$medicine_name','$batch_id','$aviable_quantity','$expirey_date','$market_price','$quantity','$total_amount','$paid_amount','$change_amount')";

     $inser="INSERT INTO `intos`( `net_total`, `customer`, `invoice_date`, `total_amount`, `total_discount`) VALUES ('$net_total','$customer','$invoice_date','$total_amount','$total_discount')";
      $quey = mysqli_query($conn, $inser) or die(mysqli_error($conn));






      if($quey==1)
      {

            echo "<script>alert('successfull.');</script>";

          //  $message[] = 'Could not add the product';
          
        }else{

            echo "<script>alert('unsuccessfull.');</script>";


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
    <title>SALES</title>
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
                <h3> Sales</h3>

                <h2> <label>MEDICINE NAME</label></h2>

                <select type="text" placeholder="Medicine Name" name="medicine_name" id="medicine_name"
                    onchange="GetDetail(this.value)" class="box">
                    <optiom>select</option>
                        <?php
                         @include 'php/conn_database.php';
                         $link =mysqli_query($conn,"select * from medicines_stock");
                        while($row =mysqli_fetch_array($link))
                         {
                            echo"<option>";
                             echo $row["medicine_name"];
                             echo"</option>";
                          }


                              ?>
                </select>



                <h2> <label>BATCH-ID</label></h2>

                <input type="text" placeholder="batch Id" name="batch_id" id="batch_id" class="box">

                <h2> <label>AVIABLE-QUANTITY</label></h2>

                <input type="text" placeholder="Aviable Quantity" name="aviable_quantity" id="aviable_quantity"
                    class="box">


                <h2> <label>EXPIREY-DATE</label></h2>


                <input type="text" placeholder="Expirey Date" name="expirey_date" id="expirey_date" class="box">

                <h2> <label>MARKET-PRICE</label></h2>

                <input type="number" placeholder="Market Price" name="market_price" id="market_price" class="box">

                <h2> <label>QUANTITY</label></h2>

                <input type="number" placeholder="Quantity" name="quantity" id="quantity" class="box"
                    onkeyup="generate_total(this.value)">

                <h2> <label>TOTAL-AMOUNT</label></h2>


                <input type="text" placeholder="Total" name="total_amount" id="total_amount" class="box">


                <h2> <label>Discount</label></h2>

                <input type="text" placeholder="Discount" name="total_discount" id="total_discount" class="box">


                <h2> <label>NET-TOTAL</label></h2>


                <input type="text" placeholder="Net Total" name="net_total" id="net_total" class="box">


                <h2> <label>PAID-AMOUNT</label></h2>

                <input type="text" placeholder="Paid Amount" name="paid_amount" id="paid_amount" class="box"
                    onkeyup="change_value(this.value)">
                <h2> <label>CHANGE-AMOUNT</label></h2>

                <input type="text" placeholder="Change" name="change_amount" id="change" class="box">

                <h2> <label>PAYMENT-TYPE</label></h2>


                <select name="payment_status" id="payment_status" class="box">
                    <option>Cash Payment</option>
                    <option>Card Payment</option>
                    <option>Net Banking</option>
                </select>

                <h2> <label>CUSTOMER NAME</label></h2>



                <select class="box" name="customer" id="customer_name" onchange="getdet(this.value)" value="">


                    <optiom>select</option>
                        <?php
@include 'php/conn_database.php';
$link =mysqli_query($conn,"select * from customers");
while($row =mysqli_fetch_array($link))
{
echo"<option>";
echo $row["NAME"];
echo"</option>";
}


?>
                </select>



                <h2> <label>INVOICE-DATE</label></h2>



                <input type="date" placeholder="invoice-date" name="invoice_date" id="invoice_date" class="box">





                <input type="submit" class="btn" name="add_sales" value="SALES">
            </form>

        </div>


        <script>
        function generate_total(qty)

        {

            document.getElementById("total_amount").value = eval(document.getElementById("quantity").value) * eval(
                document
                .getElementById("market_price").value);

            document.getElementById("net_total").value = eval(document.getElementById("quantity").value) * eval(document
                .getElementById("market_price").value);



        }

        function change_value(qq) {
            document.getElementById("change").value = eval(document.getElementById("paid_amount").value) - eval(document
                .getElementById("net_total").value);

                
        }
        </script>
    </div>

    </div>


    <script>
    function GetDetail(str) {
        if (str.length == 0) {
            document.getElementById("medicine_name").value = "";
            document.getElementById("batch_id").value = "";
            document.getElementById("aviable_quantity").value = "";
            document.getElementById("expirey_date").value = "";


            document.getElementById("market_price").value = "";




            return;
        } else {

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {


                if (this.readyState == 4 &&
                    this.status == 200) {


                    var myObj = JSON.parse(this.responseText);



                    document.getElementById("medicine_name").value = myObj[0];

                    document.getElementById(
                        "batch_id").value = myObj[1];

                    document.getElementById(
                        "aviable_quantity").value = myObj[2];

                    document.getElementById(
                        "expirey_date").value = myObj[3];

                    document.getElementById(
                        "market_price").value = myObj[4];

                }



            }
        };

        xmlhttp.open("GET", "php/invoice_load.php?medicine_name=" + str, true);

        xmlhttp.send();
    }

   
    </script>

</body>

</html>