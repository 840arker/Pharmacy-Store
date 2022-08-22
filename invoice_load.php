<?php

$medicine_name = $_REQUEST['medicine_name'];

$con = mysqli_connect("localhost", "root", "", "project_pharmacy");

if ($medicine_name !== "") {
	
	$query = mysqli_query($con, "SELECT medicine_name,
	batch_id,quantity,expirey_date,mrp FROM medicines_stock WHERE medicine_name='$medicine_name'");

	$row = mysqli_fetch_array($query);

	$medicine_name = $row["medicine_name"];

	$batch_id = $row["batch_id"];

    
    $aviable_quantity = $row["quantity"];

	$expirey_date = $row["expirey_date"];





    $market_price = $row["mrp"];

}




$result = array("$medicine_name", "$batch_id","$aviable_quantity","$expirey_date","$market_price");

$myJSON = json_encode($result);
echo $myJSON;
?>
