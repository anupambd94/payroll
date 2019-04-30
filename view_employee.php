<?php
  include("db.php"); //include auth.php file on all secure pages
  include("auth.php");


$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
  {
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <!-- Title  -->
    <title>Enterprise Resources planning System</title>

    <!-- header logo  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <script>
      <!--
        var ScrollMsg= "Enterprise Resources planning System - "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      // -->
    </script>

    <link href="assets/must.png" rel="shortcut icon">
    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body>


    <div class="container">
      <?php

      include ("head.php");

      ?>
      <body>
        <body style="background-image: url(img/login4.jpg)">

      <div class="container">
        <div class="wrapper">
          <div class="col-sm-2">
        <aside class="main_sidebar">
          <!-- Logo -->
          <div class="logo">
              <a href="https://www.bubt.edu.bd/"> <center><img src="img/core-img/BUBT-Logo.png" alt=""><h2><font color="Black">@ERP@</h2></center></a>
              <!-- Logo Close-->
             <ul>
               <li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><b><font color="Black">Home<b></font></p></a></li>
               <li><i class="far fa-comments"></i><a href="index_another.php"><p><font size="2"><b><font color="Black">Transaction Report <b></font></p></a></li>
               <li><i class="fas fa-comment-dollar"></i><a href="home_cash.php"><p><font size="2"><b><font color="Black">Credited Cash<b></font></p></a></li>
               <li><i class="fab fa-phoenix-framework"></i><a href="home_bkash.php"><p><font size="2"><b><font color ="Black">Credited Bkash<b></font></p></a></li>
               <li><i class="fas fa-american-sign-language-interpreting"> </i> <a href="dailyTransactions.php"><p><font size="2"><b><font color="Black">Debited Cash/Bkash <b></font></p></a></li>
               <li ><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><font color="Black">Company</font></p></a></li>
               <li ><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><font color="Black">Company Bill</font></p></a></li>
               <li class="active"><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><font color="Black">Employee</font></p></a></li>
               <li><i class="fa fa-circle"></i><a href="home_salaryRegular.php"><p><font size="2"> <font color="Black">Regular Employee</font></p></a></li>
               <li><i class="fa fa-circle"></i><a href="home_salaryCasual.php"><p><font size="2"><font color="Black">Casual Employee</font></p></a></li>
               <li><i class="fa fa-circle"></i><a href="home_salaryJobOrder.php"><p><font size="2"><font color="Black">Job Order Employee</font></p></a></li>
               <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><font color="Black">Payment Report</font></p></a></li>
               <li ><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><font color="Black">Store</font></p></a></li>
               <li ><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><font color="Black">Setting</font></p></a></li>
               <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><font color="Black">Logout</font></p></a></li>
             </ul>
        </aside>
      </div>
      <div class="col-sm-10">

      <div class="masthead">
        <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">@@@ ERP.....</a>
                    </div>
                    <!--Sidebar Close-->
              <!--navbar Start-->
                    <ul class="nav navbar-nav">


                    <li><a href="index.php" >Home</a></li>
                    <li class="active"><a href="home_employee.php">Employee</a></li>
                    <li ><a href="home_company.php">Company</a></li>
  				          <li ><a href="home_payment.php">Payment Report</a></li>
                    <li><a href="home_store.php">store</a></li>


                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a data-toggle="modal" href="#colins"><i class="fa fa-bicycle"></i> Admin</a></li>
                      </ul>
                      </div>
                      </nav>
      </div><br><br>

      <?php
        $id=$_REQUEST['emp_id'];

      $query  = "SELECT * from employee where emp_id='".$id."'";
      $q = $conn->query($query);
      while($row = $q->fetch_assoc())
        {

          ?>

              <form class="form-horizontal" action="update_employee.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $row['emp_id'];?>" />
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <h2><?php echo $row['fname']; ?>, <?php echo $row['lname']; ?></h2>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label"><p><font color="white"> Firstname  :</p></label>
                    <div class="col-sm-4">
                      <input type="text" name="fname" class="form-control" value="<?php echo $row['fname'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Lasttname  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="lname" class="form-control" value="<?php echo $row['lname'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Mobile No  :</label>
                      <div class="col-sm-4">
                          <input type="text" name="mobileNo" class="form-control" value="<?php echo $row['mobileNo'];?>" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Gender  :</label>
                    <div class="col-sm-4">
                    <select name="gender" class="form-control" required>
                      <option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Employee Type  :</label>
                    <div class="col-sm-4">
                      <select name="emp_type" class="form-control" required>
                        <option value="<?php echo $row['emp_type'];?>"><?php echo $row['emp_type'];?></option>
                        <option value="Job Order">Job Order</option>
                        <option value="Regular">Regular</option>
                        <option value="Casual">Casual</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Department  :</label>
                    <div class="col-sm-4">
                      <select name="division" class="form-control" placeholder="Division" required>
                        <option value="<?php echo $row['division'];?>"><?php echo $row['division'];?></option>
                        <option value="Admin">Admin</option>
                        <option value="Human Resource">Human Resource</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Engineering">Engineering</option>
                        <option value="MIS">MIS</option>
                        <option value="Supply">Supply</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Control">Control</option>
						            <option value="Control">Other</option>
                      </select>
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-5 control-label">BS  :</label>
                      <div class="col-sm-4">
                          <input type="text" id="first" name="BS" class="form-control" value="<?php echo $row['BS'];?>" required="required">
                      </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-5 control-label"> MA :</label>
                          <div class="col-sm-4">
                              <input type="text" id="second" name="MA" class="form-control" value="<?php echo $row['MA'];?>" >
                          </div>

                            </div>
                            <div class="form-group">
                              <label class="col-sm-5 control-label">HR  :</label>
                              <div class="col-sm-4">
                                  <input type="text" id="third "name="HR" class="form-control" value="<?php echo $row['HR'];?>" >
                              </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-5 control-label">TA :</label>
                                  <div class="col-sm-4">
                                      <input type="text" id="fourth" name="TA" class="form-control" value="<?php echo $row['TA'];?>">
                                  </div>
                                    </div>
                      <!--  <div class="form-group">
                          <label class="col-sm-5 control-label">Medical Allowance :</label>
                          <div class="col-sm-4">
                          <select name="MA" class="form-control" required>
                            <option value="<?php echo $row['MA'];?>"><?php echo $row['MA'];?></option>
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
                          <label class="col-sm-5 control-label">House Rent :</label>
                          <div class="col-sm-4">
                          <select name="HR" class="form-control" required>
                            <option value="<?php echo $row['HR'];?>"><?php echo $row['HR'];?></option>
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
                          <label class="col-sm-5 control-label">Transaction Allowance :</label>
                          <div class="col-sm-4">
                          <select name="TA" class="form-control" required>
                            <option value="<?php echo $row['TA'];?>"><?php echo $row['TA'];?></option>
                            <option value="500">500</option>
                            <option value="600">600</option>
                            <option value="700">700</option>
                            <option value="800">800</option>
                            <option value="900">900</option>
                            <option value="1000">1000</option>
                          </select>
                        </div>
                      </div>-->
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Total Salary :</label>
                            <div class="col-sm-4">
                                <input type="text" id="result" name="salary" class="form-control" value="<?php echo $row['salary'];?>" required="required">

                            </div>
                        </div>

                  </div><br><br>

                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Update" class="btn btn-danger">
                      <a href="home_employee.php" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>
                </div>
                </div>

              </form>
              <br><br><br><br>



            </div>

            <?php
          }
        ?>



        <!--close Allowance-->


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
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>
    <!--start Allowance-->
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

  </body>
</html>
