<?php
@include 'php/conn_database.php';

$select = mysqli_query($conn, "SELECT * FROM suppliers");

?>
<link rel="stylesheet" href="css/product_style.css">

 <div class="product-display">
   <table class="product-display-table">
      <thead>
      <tr>
         <th>SN.</th>
         <th>SUPPLIER NAME</th>
         <th>SUPPLIER EMAIL</th>
         <th>SUPPLIER CONTACT</th>
         <th>SUPPLIER ADDRESS</th>
         <th>Action</th>
      </tr>
      </thead>
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
      <td><?php echo $row['ID']; ?></td>

         <td><?php echo $row['NAME']; ?></td>
         <td><?php echo $row['EMAIL']; ?></td>
         <td><?php echo $row['CONTACT_NUMBER']; ?></td>
         <td><?php echo $row['ADDRESS']; ?></td>


         <td>
            <a href="supplier_edit.php?edit=<?php echo $row['ID']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
            <a href="add_supplier.php?delete=<?php echo $row['ID']; ?>" class="btn" onclick="delete(this.value)"> <i class="fas fa-trash"></i> delete </a>
         </td>
      </tr>
   <?php } ?>
   </table>
</div>

</div>
