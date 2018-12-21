<?php 

 require('include/connect.php');

$id = 1;

session_start();

$json = file_get_contents('https://openexchangerates.org/api/latest.json?app_id=319de52e4ae44cc8b8b6ae51bd6a4f02');
$obj = json_decode($json);

$ratelak = $obj->rates->LAK;

   

$sql = "UPDATE `rate` SET `USDTOLAK`='".$ratelak."' WHERE `id`=$id";
$result = $conn->query($sql);

if($result)
{
    echo "data update";
}else{
    echo "update error";
}
mysqli_close($conn);