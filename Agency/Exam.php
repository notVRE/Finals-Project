<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User Account</title>
    <script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

  <section class="h-100 h-custom gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="p-5">
                  <h3 class="fw-normal mb-5" style="color: #4835d4;">Employee Infomation</h3>

                  <div class="mb-4 pb-2">
                  <select  id="roleid1" class="form-select form-select-lg mb-3 required" aria-label=".form-select-lg example">
                    <option value = "" selected disabled >Position</option>
                    <option value="1">Head</option>
                    <option value="2">Staff</option>
                  </select>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input type="text" id="lname" class="form-control form-control-lg" />
                        <label class="form-label">Last name</label>
                      </div>

                    </div>
                    <div class="col-md-6 mb-4 pb-2">

                      <div class="form-outline">
                        <input type="text"  class="form-control form-control-lg" id="fname"/>
                        <label class="form-label" for="form3Examplev3">First name</label>
                      </div>

                    </div>
                  </div>

                  <div class="mb-4 pb-2">
                  <select class="form-select form-select-lg mb-3 require" aria-label=".form-select-lg example" id="roleid2">
                    <option selected disabled value = "">Department</option>
                    <option value="1">IT</option>
                    <option value="2">Accounting</option>
                    <option value="3">HR</option>
                  </select>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4 pb-2 mb-md-0 pb-md-0">
                    </div>

                  </div>

                </div>
              </div>
              <div class="col-lg-6 bg-indigo text-white">
                <div class="p-5">
                  <h3 class="fw-normal mb-5">Employee Details</h3>

                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                      <input type="date" class="form-control form-control-lg" id="txt1"/>
                      <label for="date">Date Started</label>
                    </div>
                  </div>

                  <div class="mb-4 pb-2">
                    <div class="form-outline form-white">
                      <input type="date" class="form-control form-control-lg" id="txt2"/>
                      <label class="form-label" for="form3Examplea3">End Date</label>
                    </div>
                  </div>

                  <div class="mb-4 pb-2">
                  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="roleid3">
                    <option selected disabled value = "" >Assigned To:</option>
                    <option value="1">Fairview</option>
                    <option value="2">Caloocan</option>
                    <option value="3">Valenzuela</option>
                  </select>
                  </div>

                  <div class="mb-4">
                    <div class="form-outline form-white">
                      <input type="text" class="form-control form-control-lg" id="txt3"/>
                      <label class="form-label" for="form3Examplea9">Rate Per Day</label>
                    </div>
                  </div>

                     <button id="savemoto" type="reset" class="btn btn-light btn-lg" data-mdb-ripple-color="dark" >Save</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>       
<script>
  $("#savemoto").click(function(){
          var last = $("#lname").val();
          var fir = $("#fname").val();
          var ds = $("#txt1").val();
          var ed = $("#txt2").val();
          var rpd = $("#txt3").val();
          var rdo = $("#roleid1").val();
          var rdt = $("#roleid2").val();
          var rdtt = $("#roleid3").val();

          if(rdo == "" || rdo == null){
            alert('Pick a Position');
          }else if(last == ""){
            alert("Last Name Required");
          }else if (fir == ""){
            alert("First Name Required");
          }else if (rdt == "" || rdt == null){
            alert("Choose a Department");
          }else if(ds == ""){
            alert("Date Started Required");
          }else if(ed == ""){
            alert("End Date Required");
          }else if(rdtt == "" || rdtt == null){
            alert("Pick a Location");
          }else if(rpd == ""){
            alert("Rate per Day Required");
          }else{
            $.ajax({
                url: 'save.php',
                method: 'POST',
                data: {
                    rdo:rdo,
                    last:last,
                    fir:fir,
                    rdt:rdt,
                    ds:ds,
                    ed:ed,
                    rdtt:rdtt,
                    rpd:rpd
                },
                success: function(response){
                             alert(response);   
                             window.location = 'List.php'
                }
            })
          }
          })
</script>

</body>

</html>