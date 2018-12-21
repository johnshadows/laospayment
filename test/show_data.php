<?php 
if(isset($_POST["mytext1"])){
    echo $_POST['mytext1'];

    foreach($_FILES['pic_upload']['name'] as $key => $value){
        print_r($_FILES['pic_upload']['tmp_name'][$key]);
    }
    
exit;
}
?>