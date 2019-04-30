<?php
  include("auth.php"); //include auth.php file on all secure pages

include("db.php");
include("add_employee.php");
$setAutoId = $conn->query("SET @autoid :=0");
$updateId = $conn->query("UPDATE employee SET emp_id = @autoid := (@autoid+1)");
$reset = $conn->query("ALTER TABLE employee AUTO_INCREMENT = '1'");



$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
  {

  }
?>

<?php

include ("head.php");

?>
<!-- Title  -->
<title>Enterprise Resources planning System</title>

<!-- header logo  -->
<link rel="icon" href="img/core-img/favicon.ico">
<link rel="stylesheet" href="css/core-style.css">
<!--<link rel="stylesheet" href="style.css">-->





  <body>

<body style="background-image: url(img/login4.jpg)">

    <div class="container">
      <div class="wrapper">
        <div class="col-sm-2">
      <aside class="main_sidebar">
        <!-- Logo -->
       <div class="logo">
           <a href="https://www.bubt.edu.bd/"> <center><img src="img/core-img/BUBT-Logo.png" alt=""><h2><font color="#FBB710">@ERP@</h2></center></a>
           <!-- Logo Close-->
           <ul>
             <li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><font color="Black">Home</font></p></a></li>
             <li><i class="far fa-comments"></i><a href="index_another.php"><p><font size="2"><font color="Black">Transaction Report </font></p></a></li>
             <li><i class="fas fa-comment-dollar"></i><a href="home_cash.php"><p><font size="2"><font color="Black">Credited Cash</font></p></a></li>
             <li><i class="fab fa-phoenix-framework"></i><a href="home_bkash.php"><p><font size="2"><font color ="Black">Credited Bkash</font></p></a></li>
             <li><i class="fas fa-american-sign-language-interpreting"> </i> <a href="dailyTransactions.php"><p><font size="2"><font color="Black">Debited Cash/Bkash </font></p></a></li>
             <li><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><font color="white"><font color ="Black">Company</font></p></a></li>
             <li><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><font color="white"><font color ="Black">Company Bill</font></p></a></li>
             <li class="active"><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><font color="white"><font color ="Black">Employee</font></p></a></li>
             <li><i class="fas fa-people-carry"></i><a href="home_salaryRegular.php"><p><font size="2"><font color="white"><font color ="Black">Payment</font></p></a></li>
             <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><font color="white"><font color ="Black">Payment Report</font></p></a></li>
             <li><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><font color="white"><font color ="Black">Store</font></p></a></li>
             <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><font color="white"><font color ="Black">Setting</font></p></a></li>
             <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><font color="white"><font color ="Black">Logout</font></font></p></a></li>
           </ul>
      </aside>
    </div>
    <div class="col-sm-10">
      <div class="masthead">



      <!--  <?php

        //include ("navbar.php");<i class="far fa-comments"></i>
        ?>-->
       <br><br>

          <h1>
            <marquee>

      <h4><span "background-color:red;"><p><font color="solid blue"><font size="4">@@@ WELLCOME TO ENTERPRISE RESOURCES PLANNING SYSTEM ........!!!!!!</font></font></p></span></h4>
   </marquee> </h1>

      </div>


                      <i class="icon-calendar icon-large" ></i>
                      <div class="alert alert-success" >
                    <font color="black">  <?php
                      date_default_timezone_set("Asia/Dhaka");
                      echo  date("l, F d, Y") . "<br>";
                      ?>
                      <h2><center><p> Employee Information </p></center></h2>




                <br>
                  <div class="well bs-component">

                    <form class="form-horizontal">

                      <fieldset>

                          <button type="button" data-toggle="modal" data-target="#addEmployee" class="btn btn-info btn-lg"><i class="fas fa-people-carry"></i> New Employee</font></button>

                          <!--<a class="btn btn-primary btn-lg" href="PrintBill/invoice_emp.php?emp_id=<?php echo $emp_id ?>" type= "button" name="print" title="Print Bill"><em class="fas fa-print"></em></a>-->
                    </div>

                  <p align="center"><big><b>List of Employees</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                          <th><p align="center"><font color ="red"><font size ="3">ID</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">Name/Cell</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">Gender</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">Type</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">Dept</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">BS</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">MA</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">HR</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">TA</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">Total</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">Operation</font></p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php


                       global $emp_id;

                         $query = "select * from employee ORDER BY emp_id asc";
                       $q = $conn->query($query);
                       while($row = $q->fetch_assoc())
                         {
                           $emp_id    =$row['emp_id'];
                          // $emp_id = $id;
                           $lname  =$row['lname'];
                           $mobileNo   =$row['mobileNo'];
                           $fname  =$row['fname'];
                           $emp_type   =$row['emp_type'];
                           $BS  =$row['BS'];
                           $MA  =$row['MA'];
                           $HR  =$row['HR'];
                           $TA  =$row['TA'];
                           $salary  =$row['salary'];




                       ?>

                       <tr id="<?php echo $row["emp_id"] ?>">
                           <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['emp_id'] ?></a></td>
                         <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['fname'] ?>  <?php echo $row['lname'] ?></br><?php echo $row['mobileNo'] ?></a></td>
                         <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['gender'] ?></a></td>
                         <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['emp_type'] ?></a></td>
                         <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['division'] ?></a></td>
                         <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['BS'] ?></a></td>
                         <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['MA'] ?></a></td>
                         <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['HR'] ?></a></td>
                         <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['TA'] ?></a></td>
                         <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['salary'] ?></a></td>

                          <td align="center">

                    <!--      <a class="btn btn-primary" href="view_account.php?emp_id= <?php echo $row["emp_id"]; ?>">Account</a> -->

                            <a class="btn btn-primary" href="PrintBill/invoice_emp.php?emp_id=<?php echo $row["emp_id"]; ?>"> <em class="fas fa-print"></em></a>
                            <a class="btn btn-danger" href="delete.php?emp_id=<?php echo $row["emp_id"]; ?>">Delete</a>

                          </td>
                        </tr>

                        <?php } ?>
                      </tbody>

                        <tr class="info">
                          <th><p align="center"><font color ="red"><font size ="3">ID</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">Name/Cell</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">Gender</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">Type</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">Dept</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">BS</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">MA</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">HR</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">TA</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">Total</font></p></th>
                          <th><p align="center"><font color ="red"><font size ="3">Operation</font></p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for ADDING an EMPLOYEE -->
      <div class="modal fade" id="addEmployee" role="dialog">
        <div class="modal-dialog">

          <!-- Add Employee start-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
           <div align="right">
              <h1><b><font color="blue"><right>@ EMPLOYEE ADD @ </right></font></b></h1>
            </div>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
                <div class="form-group">

            <!--      <div class="form-group">
                      <label class="col-sm-4 control-label"><font color="Black"> Appoint Date :</label>
                      <div class="col-sm-8">
                          <input class="form-control" id="datepicker"

                          value="<?php echo $thisDate;?>" name="given_date" type="text" />

                         <script>
                              $('#datepicker').datepicker({
                                  uiLibrary: 'bootstrap4'
                              });


                          </script>

                      </div>
                  </div>
                <div class="form-group">

                  <label class="col-sm-4 control-label">Expaire Date :</label>
                  <div class="col-sm-8">
                    <input type="text" name="lname" class="form-control btn-lg" placeholder="Lastname" required="required">
                  </div>
                </div>-->
			  <div class="form-group">
                  <label class="col-sm-4 control-label"> <font color="#9c51b6">Firstname :</label>
                  <div class="col-sm-8">
                    <input type="text" name="fname" class="form-control btn-lg" placeholder="Firstname" required="required">
                  </div>
                </div>
                <div class="form-group">

                  <label class="col-sm-4 control-label">Lastname :</label>
                  <div class="col-sm-8">
                    <input type="text" name="lname" class="form-control btn-lg" placeholder="Lastname" required="required">
                  </div>
                </div>

                  <div class="form-group">
                      <label class="col-sm-4 control-label">Mobile No :</label>
                      <div class="col-sm-8">
                          <input type="text" name="mobileNo" class="form-control btn-lg" placeholder="Mobile No" required="required">
                      </div>
                  </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Gender :</label>
                  <div class="col-sm-8">
                    <select name="gender" class="form-control btn-lg" style=" height: 45px;" placeholder=" Gender" required>
                      <option value="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"> Type :</label>
                  <div class="col-sm-8">
                    <select name="emp_type" class="form-control btn-lg" style=" height:45px;" placeholder="Employee Type" required>
                      <option value="">Select employee Type</option>
                      <option value="Job Order">Job Order</option>
                      <option value="Regular">Regular</option>
                      <option value="Casual">Casual</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"> Division :</label>
                  <div class="col-sm-8">
                    <select name="division" class="form-control btn-lg" style=" height:45px;" placeholder="Division" required>
                      <option value="">Select Division</option>
                      <option value="Admin">Admin</option>
                      <option value="Human Resource">Human Resource</option>
                      <option value="Accounting">Accounting</option>
                      <option value="Engineering">Engineering</option>
                      <option value="MIS">MIS</option>
                      <option value="Supply">Supply</option>
                      <option value="Maintenance">Maintenance</option>
                      <option value="Control">Control</option>
					              <option value="Control">other</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">BS :</label>
                    <div class="col-sm-8">
                        <input type="text" id="first" name="BS" class="form-control btn-lg" placeholder=" Basic Salary"  required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">MA :</label>
                    <div class="col-sm-8">
                        <input type="text" id="second" name="MA" class="form-control btn-lg" placeholder=" Medical Allowance"  required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">HR :</label>
                    <div class="col-sm-8">
                        <input type="text" id="third" name="HR" class="form-control btn-lg" placeholder=" Home Rent"  required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">TA :</label>
                    <div class="col-sm-8">
                        <input type="text" id="fourth" name="TA" class="form-control btn-lg" placeholder="Transport Allowance"  required="required">
                    </div>
                </div>
              <!--  <div class="form-group">
                  <label class="col-sm-4 control-label">MA :</label>
                  <div class="col-sm-8">
                    <select name="MA" id="second" class="form-control btn-lg" style=" height: 45px;" placeholder=" Medical Allowance"  >
                      <option value="">Select Medical Allowance</option>
                      <option value="200">200</option>
                      <option value="300">300</option>
                      <option value="500">500</option>
                      <option value="600">600</option>
                      <option value="700">700</option>
                      <option value="800">800</option>
                      <option value="900">900</option>
                      <option value="1000">1000</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">HR :</label>
                  <div class="col-sm-8">
                    <select name="HR" id="third" class="form-control btn-lg" style=" height: 45px;" placeholder=" House Rent" >
                      <option value="">Select House Rent</option>
                      <option value="200">200</option>
                      <option value="300">300</option>
                      <option value="500">500</option>
                      <option value="600">600</option>
                      <option value="700">700</option>
                      <option value="800">800</option>
                      <option value="900">900</option>
                      <option value="1000">1000</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label">TA :</label>
                  <div class="col-sm-8">
                    <select name="TA" id="fourth" class="form-control btn-lg" style=" height: 45px;" placeholder=" Transport Allowance">
                      <option value="">Select Transport Allowance</option>
                      <option value="200">200</option>
                      <option value="300">300</option>
                      <option value="500">500</option>
                      <option value="600">600</option>
                      <option value="700">700</option>
                      <option value="800">800</option>
                      <option value="900">900</option>
                      <option value="1000">1000</option>
                    </select>
                  </div>
                </div>-->
                <!--
                <div class="form-group">
                  <label class="col-sm-4 control-label"><font color ="red">Total Salary :</label>
                  <div class="col-sm-8">
                      <input type="text" id="result" name="total" class="form-control btn-lg" placeholder="Total">
                    <h2 name="total" id="result" ></h2>
                  </div>
              </div>-->

              <div class="form-group">
                  <label class="col-sm-4 control-label"><font color ="red">Total Amount :</font></label>
                  <div class="col-sm-8">
                      <input type="text" name="salary" class="form-control btn-lg" placeholder=" total ammount" required="required" id="result"readonly>
                  </div>
                </div>

                <br>


                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit">

                    <input type="reset" name="" class="btn btn-info btn-lg" value="Clear Fields">
                    <button type="button" class="close-btn btn-info btn-lg" data-dismiss="modal" title="Close">&times;</button>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
      <!--start Allowance
      <script>
      var first = document.getElementById('first');
      var second = document.getElementById('second');
      var third = document.getElementById('third');
      var fourth = document.getElementById('fourth');
      var result = document.getElementById('result');

      first.addEventListener("input", sum);
      second.addEventListener("input", sum);
      third.addEventListener("input", sum);
      fourth.addEventListener("input", sum);


      function sum() {

       var one = parseFloat(first.value) || 0;
      var two = parseFloat(second.value) || 0;
      var three = parseFloat(third.value) || 0;
      var four = parseFloat(fourth.value) || 0;

      var add = one+two+three+four;

      result.innerHTML = + add;

      }
      </script>
      -->
      <script>
      $(function () {

      $("#first,#second").click(function () {

            $("#first, #second,#third, #fourth").on("keydown keyup", add);

            function add() {
            $("#result").val(Number($("#first").val()) + Number($("#second").val()) + Number($("#third").val())+ Number($("#fourth").val()));
            }


      });
      });
      </script>

  <!--close Allowance-->


      <!-- this modal is for DELETING PRODUCT -->
 <div class="modal fade" id="deleteEmployee" role="dialog">
     <div class="modal-dialog">

         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header" style="padding:20px 50px;">
                 <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                 <h3 align="center"><b>Delete Employee</b></h3>
             </div>
             <div class="modal-body" style="padding:40px 50px;">

                 <form class="form-horizontal" action="delete.php" name="form" method="post">
                     <input type="hidden" name="emp_id" class="form-control" value="<?php echo $emp_id; ?>" required="required" readonly>

                  <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
                     <div class="form-group">
                         <label class="col-sm-4 control-label"></label>
                         <div class="col-sm-4">
                             <button type="submit" name ="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Yes</button>
                             <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
                         </div>

                     </div>
                 </form>
               </div>
         </div>
     </div>
 </div>
</div>

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>



    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>
    <script type="text/javascript">
            $(document).ready( function() {
                $('.btn-danger').click( function() {
                    var id = $(this).attr("id");
                    if(confirm("Are you sure you want to delete this Data?")){
                        $.ajax({
                            type: "POST",
                            url: "delete.php",
                            data: ({id: id}),
                            cache: false,
                            success: function(html){
                            $(".del"+id).fadeOut('slow');
                            }
                        });
                    }else{
                        return false;}
                });
            });
        </script>

  </body>
</html>
