<?php

    include 't1.php';

    $roleid = $_POST['roleid'];
    $un = $_POST['un'];
    $pw = $_POST['pw'];

    $saverecord = mysqli_query($con,"insert into tb1 
    values(null, '$un', '$pw', '$roleid' )" );

    if ($saverecord){
        echo "New record has been saved";
    }else{
        echo "Error";
    }
?>