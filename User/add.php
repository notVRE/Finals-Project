<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Account</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script></head>
<link rel="stylesheet" href="style.css">
  <body>
  <form action="/action_page.php" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="select"><b>Roles</b></label>
    <select placeholder="Select a role" name="roles" required id="roleid">
        <option selected disabled value="" >Roles</option>
        <option value="1">Administrator</option>
        <option value="2">Guest</option>
    </select>

    <label for="email"><b>Username</b></label>
    <input type="text" placeholder="Username" name="username" required id="txtun">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required id="txtpw">

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required id="txtrpw" >

    <div class="clearfix" style="text-align:center;">
      <button type="reset" class="signupbtn" id="btnsave">Sign Up</button>
    </div>
  </div>
</form>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       <script>
                 $("#btnsave").click(function(){

                    var roleid = $("#roleid").val();
                    var un = $("#txtun").val();
                    var pw = $("#txtpw").val();
                    var rpw = $("#txtrpw").val(); 

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
                         url: 'save.php',
                         method: 'POST',
                         data: {
                             roleid:roleid,
                             un:un,
                             pw:pw
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