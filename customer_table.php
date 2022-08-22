<?php
@include 'php/conn_database.php';
$select = mysqli_query($conn, "SELECT * FROM customers");

?>

<link rel="stylesheet" href="css/product_style.css">
 <div class="product-display">
   <table class="product-display-table">
      <thead>
      <tr>
         <th>SL.</th>
         <th>CUSTOMER NAME</th>
         <th>CUSTOMER NUMBER</th>
         <th>ADDRESS</th>
         <th>DOCTOR'S NAME</th>
         <th>DOCTOR'S ADDRESS</th>



         <th>Action</th>
      </tr>
      </thead>
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
         <td><?php echo $row['ID']; ?></td>
         <td><?php echo $row['NAME']; ?></td>
         <td><?php echo $row['CONTACT_NUMBER']; ?></td>
         <td><?php echo $row['ADDRESS']; ?></td>
         <td><?php echo $row['DOCTOR_NAME']; ?></td>
         <td><?php echo $row['DOCTOR_ADDRESS']; ?></td>




         <td>
            <a href="customer_edit.php?edit=<?php echo $row['ID']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
            <a href="add_customer.php?delete=<?php echo $row['ID']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
         </td>
      </tr>
   <?php } ?>
   </table>
</div>

</div>


</body>
</html>