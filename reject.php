<?php
    include('functions.php');
    $id = $_GET['id'];
    
    $query = "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            echo "Account has been rejected.";
        }else{


            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<?php
header('location:\LYC-WEB\home.php');
?>