<?php

@include 'php/conn_database.php';


   $select = mysqli_query($conn, "SELECT * FROM accounts");
   
   ?>

<link rel="stylesheet" href="css/product_style.css">


    <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>SL.</th>
            <th>NAME</th>
            <th>SURNAME</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['firstname']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>


           
         </tr>
      <?php }
      
      ?>
      </table>
   </div>
