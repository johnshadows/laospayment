<?php 
if(isset($_POST)){
    echo $_POST['f_name'];
    print_r($_FILES['f_attachment']);
    echo $_FILES['f_attachment']['tmp_name'].'/'.$_FILES['f_attachment']['name'];
exit;
}
?>