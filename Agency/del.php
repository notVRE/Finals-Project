<?php
if( !isset($_POST['deleteid'])){
    header("Location: ../List.php");
}else{
    include 'Connection.php';
    $deleteid = $_POST['deleteid'];
    $delete = mysqli_query($con, "delete from tblagency where id='$deleteid'");
    if($delete){
        echo "Record has been deleted";
    }else{
        echo "Record not deleted";
    }
}
?>