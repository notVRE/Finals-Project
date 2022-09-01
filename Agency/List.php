<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of users</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class = "container">
       <a href="List.php"> <h1 class="text-center">List of Employees</h1></a>
        <br>
        <table id="ototng" class="table table-dark table-hover table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Position</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Department</th>
                <th>Date Started</th>
                <th>Date Ended</th>
                <th>Assigned Area</th>
                <th>Rate Per Day</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
                include 'Connection.php';
                $loaduser = mysqli_query($con,'select * from tblagency');
               // $i = 1;
                while($row = mysqli_fetch_array($loaduser)){
            ?>
            <tr>
                <td><?php echo $row['id'] ?></td>    
                <td>
                    <?php 
                    if($row['positionid'] == "1"){
                        echo "Head";
                    }else{
                        echo "Staff";
                    }
                    ?>
                </td>

                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['firstname']; ?></td>

                <td>
                    <?php 
                    if($row['department'] == "1"){
                        echo "IT";
                    }else if($row['department'] == "2"){
                        echo "Accounting";
                    }else{
                        echo"HR";
                    }
                    ?>
                </td>

                <td><?php echo $row['datestart']; ?></td>
                <td><?php echo $row['dateend']; ?></td>

                <td>
                    <?php 
                    if($row['assignedto'] == "1"){
                        echo "Fairview";
                    }else if($row['assignedto'] == "2"){
                        echo "Caloocan";
                    }else{
                        echo"Valenzuela";
                    }
                    ?>
                </td>

                <td><?php echo $row['rateperday']; ?></td>


                <td> <a href ="edita.php?userid=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                 <button class="btn btn-danger btndel" deleteid="<?php echo $row['id']; ?>">Delete</button>
                 <a href="../lp.php"><button class="btn btn-success">Home</button></a></td></td>
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
      $(document).ready(function () {
        $('#ototng').DataTable({
            "lengthMenu": [[10, 20, 50, -1], [10, 20, 50, "All"]]
        });
      });
      $(".btndel").click(function(){
                    var deleteid = $(this).attr('deleteid');
                    if(confirm("Are you sure you want to delete this record?")){
                        $.ajax({
                            url: 'del.php',
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