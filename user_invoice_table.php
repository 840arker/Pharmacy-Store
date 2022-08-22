<?php
include 'php/conn_database.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Invoice-Table</title>
</head>

<body>



    <div class="col-md-12">



        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-bordered">


                    <h1  >Invoice-Table<h1>

                    <hr style="border-top: 2px solid #ff5252;">



                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN-NO</th>
                                        <th>Invoice-No</th>
                                        <th>Customer-Number</th>
                                        <th>Invoice-Date</th>
                                        <th>Total-Amount</th>
                                        <th>Net-Total</th>




                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
            $count=0;
            $res=mysqli_query($conn,"select * from intos");
            while($row=mysqli_fetch_array($res))
            {
                $count=$count+1;
                echo"<tr>";
                echo"<td>"; echo $count; echo "</td>";
                echo"<td>"; echo $row["invoice_id"]; echo "</td>";
                echo"<td>"; echo $row["customer"]; echo "</td>";
                echo"<td>"; echo $row["invoice_date"]; echo "</td>";
                echo"<td>"; echo $row["total_amount"]; echo "</td>";
                echo"<td>"; echo $row["net_total"]; echo "</td>";
                


             













                                        }

                                        ?>

                                        
                            </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>