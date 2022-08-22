<?php

include("php/conn_database.php");
if(isset($_POST['input'])){
    $input=$_POST['input'];

    $query="SELECT* FROM intos WHERE invoice_id LIKE '{$input}%'OR net_total LIKE '{$input}%'OR invoice_date LIKE '{$input}%' OR customer LIKE '{$input}%' OR total_amount LIKE '{$input}%' OR total_discount LIKE '{$input}%' LIMIT 3";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){?>
    
<table class="table table-bordered table-striped mt-4">
    <thead>
        <tr>
            <th>Invoice-ID</th>
            <th>Customer-Name</th>
            <th>DATE</th>
            <th>Total-Amount</th>
            <th>Total-Discount</th>
            <th>Net-Total</th>
           


    </tr>
    </thead>


<tbody>
    <?php

    while($row = mysqli_fetch_assoc($result)){

       // $id = $row['ID'];
        $invoice_id = $row['invoice_id'];
        $customer_name = $row['customer']; 
        $invoice_date= $row['invoice_id'];
        $total_amount = $row['total_amount'];
        $total_discount = $row['total_discount'];
        $net_total = $row['net_total'];
     


?>


<tr>


<td><?php echo $invoice_id;?></td>
<td><?php echo $customer_name;?></td>
<td><?php echo $invoice_date;?></td>
<td><?php echo $total_amount;?></td>
<td><?php echo $total_discount;?></td>
<td><?php echo $net_total;?></td>



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