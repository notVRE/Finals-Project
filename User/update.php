<?php

if( isset($_POST['roleid'])&&
isset($_POST['un'])&&
isset($_POST['pw'])&&
isset($_POST['userid'])
){
    $roleid = $_POST['roleid'];
    $uedit = $_POST['un'];
    $pedit = $_POST['pw'];
    $userid = $_POST['userid'];

    include 't1.php';

    $update = mysqli_query($con,
    "update tb1 set uname='$uedit', pass='$pedit', roleid='$roleid' where ID='$userid' ");
    if($update){
        echo 'Record has been updated';
    }else{
        echo 'Error';
    }
}
?>
