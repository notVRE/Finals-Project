<?php

    if(isset($_GET['userid'])){
        $userid = $_GET['userid'];

        include 't1.php';
        $searchuser = mysqli_query($con, "Select * from tb1 where ID='$userid' ");
        if (mysqli_num_rows($searchuser) > 0){
            $rowedit = mysqli_fetch_array($searchuser);

            $unedit = $rowedit['uname'];
            $pedit = $rowedit['pass'];
            $redit = $rowedit['roleid'];
        }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Account</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
      <h1>Edit User Account</h1>

      <label for="role">Select a Role:</label>
      <select  id="idedit" class="form-select form-select-lg mb-3 required" aria-label=".form-select-lg example">
                    <option value = "" selected disabled >Role</option>
                        <?php
                                if($redit == 1){
                                    echo '<option value ="1" selected> Administrator</option>
                                    <option value = "2"> Guest</option>';
                                }else if($redit == 2){
                                    echo '<option value ="1" > Administrator</option>
                                    <option value = "2" selected> Guest</option>';
                                }
                        ?>     
      </select>

      <br><br>
      <label for="username">Enter username:</label>
      <input type="text" id = "unedit" value="<?php echo $unedit; ?>">

      <br><br>
      <label for="password">Enter password:</label>
      <input type="password" id = "pwedit" value="<?php echo $pedit; ?>">

      <br><br>
      <label for="retype">Re-type password:</label>
      <input type="password" id ="rpwedit" value="<?php echo $pedit; ?>">

      <br><br>
      <button id="update" uid="<?php echo $userid; ?>">Update</button>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>       
       <script>
                 $("#update").click(function(){

                    var roleid = $("#idedit").val();
                    var un = $("#unedit").val();
                    var pw = $("#pwedit").val();
                    var rpw = $("#rpwedit").val(); 
                    var userid = $(this).attr('uid');

                    if(roleid == "" || roleid == null){
                     alert('Please Select a role');
                 }else if(un ==""){
                     alert('Usename Required');
                 }else if(pw ==""){
                     alert('Password Required');
                 }else if(rpw == ""){
                     alert('Re-Type Required');
                 }else if(pw.length < 6){
                     alert('Password must be 6 or more characters');
                 }else if(pw != rpw){
                     alert('Password Mismatch');
                 }else{
                     $.ajax({
                         url: 'update.php',
                         method: 'POST',
                         data: {
                             roleid:roleid,
                             un:un,
                             pw:pw,
                             userid:userid
                         },
                         success: function(response){
                             alert(response);
                             window.location = 'tlist.php'
                         }   
                     })
                 }
                 })
        </script>
  </body>
</html>