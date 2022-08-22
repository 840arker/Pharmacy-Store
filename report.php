<?php

if(isset($_GET['action']) && $_GET['action'] == "purchase")
  showPurchases($_GET['start_date'], $_GET['end_date']);

if(isset($_GET['action']) && $_GET['action'] == "sales")
  showSales($_GET['start_date'], $_GET['end_date']);

function showPurchases($start_date, $end_date) {
  ?>
  <thead>
    <tr>
      <th>SL</th>
      <th>Purchase Date</th>
      <th>Voucher Number</th>
      <th>Invoice No</th>
      <th>Supplier Name</th>
      <th>Total Amount</th>
    </tr>
  </thead>
  <tbody>
  <?php
  include "conn_database.php";
  if($conn) {
    $seq_no = 0;
    $total = 0;
    if($start_date == "" || $end_date == "")
      $query = "SELECT * FROM pp";
    else
      $query = "SELECT * FROM pp WHERE purchase_date BETWEEN '$start_date' AND '$end_date'";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)) {
      $seq_no++;
      showPurchaseRow($seq_no, $row);
      $total = $total + $row['total_amount'];
    }
    ?>
    </tbody>
    <tfoot class="font-weight-bold">
      <tr style="text-align: right; font-size: 24px;">
        <td colspan="5" style="color: green;">&nbsp;Total Purchases =</td>
        <td style="color: red;"><?php echo $total; ?></td>
      </tr>
    </tfoot>
    <?php
  }
}

function showPurchaseRow($seq_no, $row) {
  ?>
  <tr>
    <td><?php echo $seq_no; ?></td>
    <td><?php echo $row['purchase_date']; ?></td>
    <td><?php echo $row['voucher_number']; ?></td>
    <td><?php echo $row['invoice_number']; ?></td>
    <td><?php echo $row['supplier_name'] ?></td>
    <td><?php echo $row['total_amount']; ?></td>
  </tr>
  <?php
}

function showSales($start_date, $end_date) {
  ?>
  <thead>
    <tr>
      <th>SL</th>
      <th>Sales Date</th>
      <th>Invoice Number</th>
      <th>Customer Name</th>
      <th>Total Amount</th>
    </tr>
  </thead>
  <tbody>
  <?php
  require "conn_database.php";
  if($conn) {
    $seq_no = 0;
    $total = 0;
    if($start_date == "" || $end_date == "")

    $query = "SELECT * FROM intos";

      //$query = "SELECT * FROM intos INNER JOIN customers ON invoices.CUSTOMER_ID = customers.ID";
    else

    $query = "SELECT * FROM intos WHERE invoice_date BETWEEN '$start_date' AND '$end_date'";

     // $query = "SELECT * FROM invoices INNER JOIN customers ON invoices.CUSTOMER_ID = customers.ID WHERE INVOICE_DATE BETWEEN '$start_date' AND '$end_date'";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)) {
      $seq_no++;
      //print_r($row);
      showSalesRow($seq_no, $row);
      $total = $total + $row['net_total'];
    }
    ?>
    </tbody>
    <tfoot class="font-weight-bold">
      <tr style="text-align: right; font-size: 24px;">
        <td colspan="4" style="color: green;">&nbsp;Total Sales =</td>
        <td class="text-primary"><?php echo $total; ?></td>
      </tr>
    </tfoot>
    <?php
  }
}

function showSalesRow($seq_no, $row) {
  ?>
  <tr>
    <td><?php echo $seq_no; ?></td>
    <td><?php echo $row['invoice_date']; ?></td>
    <td><?php echo $row['invoice_date']; ?></td>
    <td><?php echo $row['customer']; ?></td>
    <td><?php echo $row['net_total'] ?></td>
  </tr>
  <?php
}

?>
