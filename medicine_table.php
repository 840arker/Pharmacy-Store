<?php

@include 'php/conn_database.php';


   $select = mysqli_query($conn, "SELECT * FROM medicines");
   
   ?>

<link rel="stylesheet" href="css/product_style.css">


    <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>SL.</th>
            <th>MEDICINE NAME</th>
            <th>PACKING</th>
            <th>GENERIC NAME</th>
            <th>SUPPLIER NAME</th>
            <th>Action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['ID']; ?></td>
            <td><?php echo $row['NAME']; ?></td>
            <td><?php echo $row['PACKING']; ?></td>
            <td><?php echo $row['GENERIC_NAME']; ?></td>
            <td><?php echo $row['SUPPLIER_NAME']; ?></td>


            <td>
               <a href="medicine_edit.php?edit=<?php echo $row['ID']; ?>" class="btn btn-warning"> <i class="fas fa-edit"></i> edit </a>
               <a href="add_medicine.php?delete=<?php echo $row['ID']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php }
      
      ?>
      </table>
   </div>
