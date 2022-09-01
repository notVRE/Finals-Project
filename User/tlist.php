<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of users</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">

</head>

<body>
    <div class = "container">
        <a href="tlist.php"><h1 class="text-center">List of User Accounts</h1></a>
<table id="example" class="table table-hover" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
                include 't1.php';
                $loaduser = mysqli_query($con,'select * from tb1');
                $i = 1;
                while($row = mysqli_fetch_array($loaduser)){
            ?>
            <tr>
                <td><?php echo $i; $i++; ?></td>    
                <td><?php echo $row['uname']; ?></td>
                <td><?php echo $row['pass']; ?></td>
                <td>
                    <?php 
                    if($row['roleid'] == "1"){
                        echo "Administrator";
                    }else{
                        echo "Guest";
                    }
                    ?>
                </td>

                <td> <a href ="edit.php?userid=<?php echo $row['ID']; ?>" class="btn btn-primary">Edit</a>
                 <button class="btn btn-danger btndel" deleteid="<?php echo $row['ID']; ?>" type="reset">Delete</button>
                 <a href="../lp.php"><button class="btn btn-success">Home</button></a></td>
            </tr>
            <?php
                 }
                ?>
        </tbody>
                </table>
                </div>
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

                <script>
                    $(document).ready(function() {
                    $('#example').DataTable();
                } );

                $(".btndel").click(function(){
                    var deleteid = $(this).attr('deleteid');
                    if(confirm("Are you sure you want to delete this record?")){
                        $.ajax({
                            url: 'delete.php',
                            method: 'POST',
                            data: {
                                deleteid: deleteid
                            },
                            success: function(response){
                                if(response == "Record Has been deleted!"){
                                    alert("Record has been deleted");
                                    location.reload();
                                }else{
                                    alert(response);
                                }
                            }
                        })
                    }
                })
                </script>
                
</body>
</html>