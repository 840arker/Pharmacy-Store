<?php

include("conn_database.php");
if(isset($_POST['input'])){
    $input=$_POST['input'];

    $query="SELECT* FROM medicines WHERE NAME LIKE '{$input}%'OR PACKING LIKE '{$input}%'OR GENERIC_NAME LIKE '{$input}%' OR SUPPLIER_NAME LIKE '{$input}%' LIMIT 3";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){?>
    
<table class="table table-bordered table-striped mt-4">
    <thead>
        <tr>
            <th>id</th>
            <th>Medicine</th>
            <th>Packing</th>
            <th>Generic</th>
            <th>Supplier-Name</th>
         


    </tr>
    </thead>


<tbody>
    <?php

    while($row = mysqli_fetch_assoc($result)){

        $id = $row['ID'];
        $medicine_name = $row['NAME'];
        $packing = $row['PACKING']; 
        $generic_name = $row['GENERIC_NAME'];
        $batch_id = $row['SUPPLIER_NAME'];
      


?>


<tr>


<td><?php echo $id;?></td>
<td><?php echo $medicine_name;?></td>
<td><?php echo $packing;?></td>
<td><?php echo $generic_name;?></td>
<td><?php echo $batch_id;?></td>



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