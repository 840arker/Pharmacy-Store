<?php

include 'php/config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/sidenav.css">

    <title>Home</title>




</head>

<body>

    <?php
  include "sidenav.html";
?>
    <div class="container-fluid">
        <div class="container">
            <?php
          require "header.php";
          createHeader('home', 'Dashboard', 'Home');

          
        ?>


            <div class="row">
                <div class="row col col-xs-8 col-sm-8 col-md-8 col-lg-8">

                    <?php
              function createSection1($location, $title, $table) {
                require 'php/config.php';

                $query = "SELECT * FROM $table";
                if($title == "Out of Stock")
                  $query = "SELECT * FROM $table WHERE QUANTITY = 0";

                $result = mysqli_query($con, $query);
                $count = mysqli_num_rows($result);


                if($title == "Expired") {
                
                  $count = 0;
                  while($row = mysqli_fetch_array($result)) {
                    $expiry_date = $row['EXPIRY_DATE'];
                    if(substr($expiry_date, 3) < date('y'))
                      $count++;
                    else if(substr($expiry_date, 3) == date('y')) {
                      if(substr($expiry_date, 0, 2) < date('m'))
                        $count++;
                    }
                  }
                }

                echo '
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
                    <div class="dashboard-stats" onclick="location.href=\''.$location.'\'">
                      <a class="text-dark text-decoration-none" href="'.$location.'">
                        <span class="h4">'.$count.'</span>
                        <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
                        <div class="small font-weight-bold">'.$title.'</div>
                      </a>
                    </div>
                  </div>
                ';
              }
              createSection1('customer_table.php', 'Total Customer', 'customers');
              createSection1('supplier_table.php', 'Total Supplier', 'suppliers');
              createSection1('medicine_table.php', 'Total Medicine', 'medicines');
              createSection1('manage-medicine-stock.php?out_of_stock', 'Out of Stock', 'medicines_stock');
              createSection1('manage-medicine-stock.php?expired', 'Expired', 'medicines_stock');
              createSection1('user_invoice_table.php', 'Total Invoice', 'invoices');
            ?>

                </div>

                <div class="col col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding: 7px 0; margin-left: 15px;">
                    <div class="todays-report">
                        <div class="h5">Todays Report</div>
                        <table class="table table-bordered table-striped table-hover">
                            <tbody>
                                <?php
                    require 'php/conn_database.php';
                    if($conn) {
                      $date = date('Y-m-d');
                  ?>
                                <tr>
                                    <?php
                      $total = 0;
                      $query = "SELECT net_total FROM invoice WHERE invoice_date = '$date'";
                      $result = mysqli_query($conn, $query);

                      while($row = mysqli_fetch_array($result))
                        $total = $total + $row['net_total'];
                    ?>
                                    <th>Total Sales</th>
                                    <th class="text-success">Rs. <?php echo $total; ?></th>
                                </tr>
                                <tr>
                                    <?php

                      $total = 0;
                      $query = "SELECT total_amount FROM purchase WHERE purchase_date = '$date'";
                      $result = mysqli_query($conn, $query);
                      while($row = mysqli_fetch_array($result))
                        $total = $total + $row['total_amount'];
                    }
                    ?>
                                    <th>Total Purchase</th>
                                    <th class="text-danger">Rs. <?php echo $total; ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <hr style="border-top: 2px solid #ff5252;">

            <div class="row">

                <?php
            function createSection2($icon, $location, $title) {
              echo '
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3" style="padding: 10px;">
              		<div class="dashboard-stats" style="padding: 30px 15px;" onclick="location.href=\''.$location.'\'">
              			<div class="text-center">
                      <span class="h1"><i class="fa fa-'.$icon.' p-2"></i></span>
              				<div class="h5">'.$title.'</div>
              			</div>
              		</div>
                </div>
              ';
            }
            createSection2('address-card', 'new_invoice.php', 'Create New Invoice');
            createSection2('handshake', 'add_customer.php', 'Add New Customer');
            createSection2('shopping-bag', 'add_medicine.php', 'Add New Medicine');
            createSection2('group', 'add_supplier.php', 'Add New Supplier');
            createSection2('bar-chart', 'add_purchase.php', 'Add New Purchase');
            createSection2('book', 'sales_report.php', 'Sales Report');
            createSection2('book', 'purchase_report.php', 'Purchase Report');
          ?>

            </div>

        </div>
    </div>


</body>

</html>