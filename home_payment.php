<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("payment_regular.php");
include("db.php");
?>
<?php

include ("head.php");

?>

<!-- Title  -->
<title>Enterprise Resources planning System</title>

<!-- header logo  -->
<link rel="icon" href="img/core-img/favicon.ico">
<body>
  <body style="background-image: url(img/login4.jpg)">

<div class="container">
  <div class="wrapper">
    <div class="col-sm-2">
  <aside class="main_sidebar">
    <!-- Logo -->
   <div class="logo">
       <a href="https://www.bubt.edu.bd/"> <center><img src="img/core-img/BUBT-Logo.png" alt=""><h2><font color ="Blue">@ERP@</h2></center></a>
       <!-- Logo Close-->
       <!-- Logo Close-->
       <ul>
         <li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><b><font color="Black">Home<b></font></p></a></li>
         <li><i class="far fa-comments"></i><a href="index_another.php"><p><font size="2"><b><font color="Black">Transaction Report <b></font></p></a></li>
         <li><i class="fas fa-comment-dollar"></i><a href="home_cash.php"><p><font size="2"><b><font color="Black">Credited Cash<b></font></p></a></li>
         <li><i class="fab fa-phoenix-framework"></i><a href="home_bkash.php"><p><font size="2"><b><font color ="Black">Credited Bkash<b></font></p></a></li>
         <li><i class="fas fa-american-sign-language-interpreting"> </i> <a href="dailyTransactions.php"><p><font size="2"><b><font color="Black">Debited Cash/Bkash <b></font></p></a></li>
         <li><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><b><font color="Black">Company<b></font></p></a></li>
         <li><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><b><font color="Black">Company Bill<b></font></p></a></li>
         <li><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><b><font color="Black">Employee<b></font></p></a></li>
         <li ><i class="fas fa-shopping-cart"></i><a href="home_salaryRegular.php"><p><font size="2"><b> <font color="Black">Pay Regular Employee<b></font></p></a></li>
         <li ><i class="fas fa-shopping-cart"></i><a href="home_salaryCasual.php"><p><font size="2"><b><font color="Black">Pay Casual Employee<b></font></p></a></li>
         <li ><i class="fas fa-shopping-cart"></i><a href="home_salaryJobOrder.php"><p><font size="2"><b><font color="Black">Pay Job Order Employee<b></font></p></a></li>
         <li class="active"><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><b><font color="Black">Payment Report<b></font></p></a></li>
         <li><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><b><font color="Black">Store<b></font></p></a></li>
         <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><b><font color="Black">Setting<b></font></p></a></li>
         <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><b><font color="Black">Logout<b></font></p></a></li>
       </ul>
  </aside>
</div>
<div class="col-sm-10">
<div id="page-wrapper">
    <div id="page-inner">
      <nav class="navbar navbar-default">
          <div class="container-fluid">
              <div class="navbar-header">
                  <a class="navbar-brand" href="#">@@@ ERP.....</a>
              </div>
              <!--Sidebar Close-->
        <!--navbar Start-->
              <ul class="nav navbar-nav">


              <li><a href="index.php" >Home</a></li>
          <li><a href="home_employee.php">Employee</a></li>
          <li ><a href="home_company.php">Company</a></li>
          <li  ><a href="home_salaryRegular.php">Payment</a></li>
          <li class="active"><a href="home_payment.php">Payment Report</a></li>
          <li><a href="home_store.php">store</a></li>


              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li><a data-toggle="modal" href="#colins"><i class="fa fa-bicycle"></i> Admin</a></li>
                </ul>
                </div>
                </nav>


            					  <!--marquee-->
                    <marquee>  <h1 class="page-subhead-line"><font size="4"><span class="different-text-color"><font color="white">WELCOME TO--ERP / Payment Report  </strong> @ <font color="Blue"> Today is :
                     <i class="icon-calendar icon-large" ></i>


                     <?php
                     date_default_timezone_set("Asia/Dhaka");
                     echo  date(" l, F d, Y") . "<br>";

                     ?></font>
                      </span></p></h1> </marquee></font>
<div class="row">
<div class="col-sm-8">
<h1 class="page-head-line"><font color="Black">Payment</h1>
<?php
date_default_timezone_set("Asia/Dhaka");
echo  date(" l, F d, Y") . "<br>";

?>
<br></font>

<style type="text/css">
.different-text-color { color: green; }
</style>


</div>
</div>
<div class="col-sm-16">

<div class="well bs-component">
  <form class="form-horizontal">
      <fieldset>

          <div class="table-responsive">
              <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                      <tr class="info">
                        <th><p align="center"><font color="red">ID/Name</font></p></th>
                        <th><p align="center"><font color="red">Type</font></p></th>
                        <th><p align="center"> <font color="red">Total Paid</font></p></th>
                        <th><p align="center"><font color="red"> Advance/Due</font></p></th>
                        <th><p align="center"><font color="red">Paid in cash</font></p></th>
                        <th><p align="center"><font color="red">Paid in Bkash</font></p></th>
                        <th><p align="center"><font color="red">Payment Date</font></p></th>
                        <th><p align="center"><font color="red">Remark</font></p></th>
                        <th><p align="center"><font color="red">Payment Status</font></p></th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php
                      global $AD,$currentAD;
                      $AD = "";
                      $currentAD = 0;
                      $query2  = "SELECT * from payment ORDER BY pay_date ";
                      $q2 = $conn->query($query2);
                      while($row2 = $q2->fetch_assoc())
                      {
                        if($row2["due_status"]==1){
                          $currentAD = $row2["due"];
                          $AD = "Due: ";
                        }
                        else if($row2["advance_status"]==1){
                          $currentAD = $row2["advance"];
                          $AD = "Advance: ";
                        }else{
                          $currentAD = "";
                          $AD = "All Paid ";
                        }
                        $query  = "SELECT * from employee where emp_id='".$row2["emp_id"]."' ";
                        $q = $conn->query($query);
                        $row = $q->fetch_assoc();


                          if($row2["pay_status"]==1){
                              $class = "paid";
                              $remark="Paid";
                          }

                          else{
                              $class = "notpaid";
                              $remark="Not Paid";
                          }


                          ?>
                          <tr>
                              <td align="center">(<?php echo $row["emp_id"]?>)<?php echo $row["fname"]?> <?php echo $row["lname"]?></td>
                              <td align="center"><?php echo $row["emp_type"]?></td>
                              <td align="center"><big><b><?php echo $row2["pay_amount"]?>.00 </b></big></td>
                              <td align="center"><big><b><?php echo $AD.$currentAD?> </b></big></td>
                              <td align="center"><big><b><?php echo $row2["paid_in_cash"]?></b></big>.00</td>
                              <td align="center"><big><b><?php echo $row2["paid_in_bkash"]?></b></big></td>
                              <td align="center"><big><b><?php echo $row2["pay_date"]?></b></big></td>
                              <td align="center"><big><b><?php echo $row2["pay_remark"]?></b></big></td>
                              <td align="center"class = "<?php echo $class?>"><big><b><?php echo $remark?></b></big> </td>
                          </tr>
                      <?php } ?>
                      </tbody>

                      <tr class="info">
                        <th><p align="center"><font color="red">ID/Name</font></p></th>
                        <th><p align="center"><font color="red">Type</font></p></th>
                        <th><p align="center"> <font color="red">Total Paid</font></p></th>
                        <th><p align="center"><font color="red"> Advance/Due</font></p></th>
                        <th><p align="center"><font color="red">Paid in cash</font></p></th>
                        <th><p align="center"><font color="red">Paid in Bkash</font></p></th>
                        <th><p align="center"><font color="red">Payment Date</font></p></th>
                        <th><p align="center"><font color="red">Remark</font></p></th>
                        <th><p align="center"><font color="red">Payment Status</font></p></th>
                      </tr>
                  </table>
              </form>
          </div>
      </fieldset>
  </form>
</div>

<!-- this modal is for OVERTIME -->
<div class="modal fade" id="overtime" role="dialog">
  <div class="modal-dialog modal-sm">

      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter the amount of <big><b>Overtime</b></big> rate per hour.</h3>
          </div>
          <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="update_overtime.php" name="form" method="post">
                  <div class="form-group">
                      <input type="text" name="rate" class="form-control" value="<?php echo $rate; ?>" required="required">
                  </div>

                  <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-success" value="Submit">
                  </div>
              </form>

          </div>
      </div>
  </div>
</div>

<!-- this modal is for ADDING Salary -->
<div class="modal fade" id="addSalary" role="dialog">
  <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add Salary for and Employee</b></h3>
          </div>
          <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
                  <div class="form-group">
                      <label class="col-sm-4 control-label">ID</label>
                      <div class="col-sm-8">
                          <input type="text" name="emp_id" class="form-control" placeholder="Employee ID" required="required">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-4 control-label">Salary Rate</label>
                      <div class="col-sm-8">
                          <input type="text" name="salary_rate" class="form-control" placeholder="Enter Salary" required="required">
                      </div>
                  </div>





                  <div class="form-group">
                      <label class="col-sm-4 control-label"></label>
                      <div class="col-sm-8">
                          <input type="submit" name="submit" class="btn btn-success" value="Submit">
                          <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                      </div>
                  </div>
              </form>

          </div>
      </div>
  </div>
</div>


<!-- this modal is for SALARY -->
<div class="modal fade" id="salary" role="dialog">
  <div class="modal-dialog modal-sm">

      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter the amount of <big><b>Salary</b></big> rate.</h3>
          </div>
          <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="update_salary.php" name="form" method="post">
                  <div class="form-group">
                      <input type="text" name="emp_id" class="form-control" value="<?php echo $emp_id; ?>" required="required">
                  </div>
                  <div class="form-group">
                      <input type="text" name="salary_rate" class="form-control" value="<?php echo $salary; ?>" required="required">
                  </div>

                  <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-success" value="Submit">
                  </div>
              </form>

          </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
<?php
include("footer.php");
?>
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
