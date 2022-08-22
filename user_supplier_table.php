<?php
include 'php/conn_database.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Customer-Table</title>
</head>

<body>



    <div class="col-md-12">



        <div class="card mt-4">
            <div class="card-body">
                <table class="table table-bordered">


                    <h1  >Customer-Table<h1>

                    <hr style="border-top: 2px solid #ff5252;">



                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN-NO</th>
                                        <th>Customer-Name</th>
                                        <th>Contact-Number</th>
                                        <th>Address</th>
                                        <th>Doctor-Name</th>
                                        <th>DOctor-Address</th>
                                        <th>Action</th>




                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
            $count=0;
            $res=mysqli_query($conn,"select * from customers");
            while($row=mysqli_fetch_array($res))
            {
                $count=$count+1;
                echo"<tr>";
                echo"<td>"; echo $count; echo "</td>";
                echo"<td>"; echo $row["NAME"]; echo "</td>";
                echo"<td>"; echo $row["CONTACT_NUMBER"]; echo "</td>";
                echo"<td>"; echo $row["ADDRESS"]; echo "</td>";
                echo"<td>"; echo $row["DOCTOR_NAME"]; echo "</td>";
                echo"<td>"; echo $row["DOCTOR_ADDRESS"]; echo "</td>";
                


             













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