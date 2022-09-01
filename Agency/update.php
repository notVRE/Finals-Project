<?php

if( isset($_POST['rdo'])&&
isset($_POST['last'])&&
isset($_POST['fir'])&&
isset($_POST['rdt'])&&
isset($_POST['ds'])&&
isset($_POST['ed'])&&
isset($_POST['rdtt'])&&
isset($_POST['rpd'])&&
isset($_POST['userid'])
){
    $pid = $_POST['rdo'];
    $lname = $_POST['last'];
    $uname = $_POST['fir'];
    $dept = $_POST['rdt'];
    $dst = $_POST['ds'];
    $ded = $_POST['ed'];
    $rdt = $_POST['rdtt'];
    $rpd = $_POST['rpd'];
    $userid = $_POST['userid'];

    include 'Connection.php';

    $update = mysqli_query($con,
    "update tblagency set positionid='$pid', lastname='$lname', firstname='$uname', department='$dept', datestart='$dst', dateend='$ded', assignedto='$rdt', rateperday='$rpd' where id='$userid'  ");
    if($update){
        echo 'Record has been updated';
    }else{
        echo 'Error';
    }
}
?>
