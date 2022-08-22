<?php
  require "php/conn_database.php";

  if($conn) {
    if(isset($_GET["action"]) && $_GET["action"] == "delete") {
      $id = $_GET["id"];
      $query = "DELETE FROM medicines WHERE ID = $id";
      $result = mysqli_query($con, $query);
      if(!empty($result))
    		showMedicinesStock("0");
    }

    if(isset($_GET["action"]) && $_GET["action"] == "edit") {
      $id = $_GET["id"];
      showMedicinesStock($id);
    }


    if(isset($_GET["action"]) && $_GET["action"] == "cancel")
      showMedicinesStock("0");

    if(isset($_GET["action"]) && $_GET["action"] == "search")
      searchMedicineStock(strtoupper($_GET["text"]), $_GET["tag"]);
  }

  function showMedicinesStock($id) {
    require "php/conn_database.php";
    if($conn) {
      $seq_no = 0;

     // $res=mysqli_query($conn,"select * from customers");

      $query = "SELECT * from  medicines_stock";
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
        if($row['batch_id'] == $id)
          showEditOptionsRow($seq_no, $row);
        else
          showMedicineStockRow($seq_no, $row);
      }
    }
  }

  function showMedicineStockRow($seq_no, $row) {
    ?>
    <tr>
      <td><?php echo $seq_no; ?></td>
      <td><?php echo $row['medicine_name']; ?></td>
      <td><?php echo $row['batch_id']; ?></td>
      <td><?php echo $row['expirey_date']; ?></td>
      <td><?php echo $row['quantity']; ?></td>
      <td><?php echo $row['mrp']; ?></td>
      <td><?php echo $row['rate']; ?></td>
      <td>
     
        <!--
        <button class="btn btn-danger btn-sm" onclick="deleteMedicineStock(<?php echo $row['ID']; ?>);">
          <i class="fa fa-trash"></i>
        </button>
      -->
      </td>
    </tr>
    <?php
  }



function searchMedicineStock($text, $column) {
  require "php/conn_database.php";
  if($conn) {
    $seq_no = 0;

    if($column == "expirey_date")
      $query = "SELECT * FROM medicines_stock WHERE medicines_stock.expirey_date";
    else if($column == 'quantity')
      $query = "SELECT * FROM medicines_stock WHERE medicines_stock.$column = 0";
    else
      $query = "SELECT * FROM medicines_stock WHERE UPPER(medicines_stock.$column) LIKE '%$text%'";

    $result = mysqli_query($conn, $query);

    if($column == 'expirey_date') {
      while($row = mysqli_fetch_array($result)) {
        $expiry_date = $row['expirey_date'];
        if(substr($expiry_date, 3) < date('y'))
          showMedicineStockRow($seq_no, $row);
        else if(substr($expiry_date, 3) == date('y')) {
          if(substr($expiry_date, 0, 2) < date('m'))
            showMedicineStockRow($seq_no, $row);
        }
      }
    }
    else {
      while($row = mysqli_fetch_array($result)) {
        $seq_no++;
        showMedicineStockRow($seq_no, $row);
      }
    }
  }
}

?>
