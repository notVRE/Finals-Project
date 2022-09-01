<?php
        include 'Connection.php';

    
            $last = $_POST['last'];
            $fir = $_POST['fir'];
            $ds = $_POST['ds'];
            $ed = $_POST['ed']; 
            $rdo = $_POST['rdo'];
            $rpd = $_POST['rpd'];
            $rdt = $_POST['rdt'];
            $rdtt = $_POST['rdtt'];
         

            $saverecord = mysqli_query($con,
            "insert into tblagency values(null,'$rdo','$last','$fir','$rdt','$ds','$ed','$rdtt','$rpd')");

            if($saverecord){
                echo "New Record has been added";
            }else{
                echo "Error";
            }
?>