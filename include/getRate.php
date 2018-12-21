<?php 
    require('./connect.php');


    $query = "SELECT * FROM `rate` where id = 1";
    $result =mysqli_query($conn,$query) or die(mysql_error());

    $ratenow = mysqli_fetch_array( $result );
?>