<?php
if( !isset($_POST['deleteid'])){
    header("Location: ../tlist.php");
}else{
    include 't1.php';
    $deleteid = $_POST['deleteid'];
    $delete = mysqli_query($con, "delete from tb1 where ID='$deleteid'");
    if($delete){
        echo "Record has been deleted";
    }else{
        echo "Record not deleted";
    }
}
?>