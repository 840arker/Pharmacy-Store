<?php

include("conn_database.php");
if(isset($_POST['input'])){
    $input=$_POST['input'];

    $query="SELECT* FROM customers WHERE NAME LIKE '{$input}%'OR CONTACT_NUMBER LIKE '{$input}%'OR ADDRESS LIKE '{$input}%' LIMIT 3";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){?>
    
<table class="table table-bordered table-striped mt-4">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Contact-Number</th>
            <th>Address</th>
         


    </tr>
    </thead>


<tbody>
    <?php

    while($row = mysqli_fetch_assoc($result)){

        $id = $row['ID'];
        $medicine_name = $row['NAME'];
        $packing = $row['CONTACT_NUMBER']; 
        $generic_name = $row['ADDRESS'];
      


?>


<tr>


<td><?php echo $id;?></td>
<td><?php echo $medicine_name;?></td>
<td><?php echo $packing;?></td>
<td><?php echo $generic_name;?></td>



    </tr>









<?php





    }


?>




    </tbody>


    </table>

    <?php
    }else{
        echo "<h6 class='text-danger text-center mt-3'>no data found</h6>";
    }









}




?>