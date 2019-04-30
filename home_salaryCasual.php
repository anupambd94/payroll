<?php
include("auth.php"); //include auth.php file on all secure pages
include("db.php");
include("add_salary.php");

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
         <li class="active"><i class="fas fa-shopping-cart"></i><a href="home_salaryCasual.php"><p><font size="2"><b><font color="Black">Pay Casual Employee<b></font></p></a></li>
         <li><i class="fas fa-shopping-cart"></i><a href="home_salaryJobOrder.php"><p><font size="2"><b><font color="Black">Pay Job Order Employee<b></font></p></a></li>
         <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><b><font color="Black">Payment Report<b></font></p></a></li>
         <li><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><b><font color="Black">Store<b></font></p></a></li>
         <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><b><font color="Black">Setting<b></font></p></a></li>
         <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><b><font color="Black">Logout<b></font></p></a></li>
       </ul>
  </aside>
</div>
<div class="col-sm-10">

<?php
$query  = "SELECT * from overtime";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    @$rate           = $row['rate'];
}

$query  = "SELECT * from salary";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
{
    @$emp_id           = $row['emp_id'];
    @$salary           = $row['salary_rate'];
}
$netpay = 0;
?>


        <div id="page-wrapper">
            <div id="page-inner">



  <div class="masthead">
    <div class="col-sm-15">
      <div class="masthead">
          <nav class="navbar navbar-default">
              <div class="container-fluid">
                  <div class="navbar-header">
                      <a class="navbar-brand" href="index.php">ERP</a>
                  </div>
                  <ul class="nav navbar-nav">
                      <li><a href="index.php">Home</a></li>
                      <li class="active"><a href="home_salaryRegular.php">Regular Employee</a></li>
                      <li><a href="home_salaryCasual.php">Casual Employee</a></li>
                      <li><a href="home_salaryJobOrder.php">Job Order Employee</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li><a data-toggle="modal" href="#colins"><i class="fa fa-bicycle"></i> Admin</a></li
                    </ul>
              </div>
          </nav>
      </div>
    </div>
    <marquee>  <h1 class="page-subhead-line"><p style="font-size:x-large;"><font color="White">WELCOME TO--CASUAL EMPLOYEE @ </strong> @@@ Today is:
     <i class="icon-calendar icon-large" ></i>


     <?php
     date_default_timezone_set("Asia/Dhaka");
     echo  date(" l, F d, Y") . "<br>";

     ?>
      </span></p></h1> </marquee>
  <div class="row">
      <div class="col-md-12">
          <h2 class="page-head-line"><font color="black">Payment Casual Employee </h2>
          <?php
          date_default_timezone_set("Asia/Dhaka");
          echo  date(" l, F d, Y") . "<br>";

          ?>
        </br></font>



           <style type="text/css">
           .different-text-color { color: green; }
        </style>



      </div>
  </div>

    <div class="well bs-component">
        <form class="form-horizontal">

            <fieldset>
                <button type="button" data-toggle="modal" data-target="#addSalary" class="btn btn-info"><font color="#FDE9B7"> <i class="fab fa-accusoft"></i> Set Bonus</font></button>
                <br><br>
                <div class="table-responsive">
                    <form method="post" action="" >
                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <!-- <h3><b>Ordinance</b></h3> -->
                            <thead>
                            <tr class="info">

                                <th><p align="center"><font color ="red">ID</font></p></th>
                                <th><p align="center"><font color ="red">Name</font></p></th>
                                <th><p align="center"><font color ="red">Salary rate</font></p></th>
                                <th><p align="center"><font color ="red">Works</font></p></th>
                                <th><p align="center"><font color ="red">Deduction</font></p></th>
                                <th><p align="center"><font color ="red">Due</font></p></th>
                                <th><p align="center"><font color ="red">Advance</font></p></th>
                                <th><p align="center"><font color ="red">Bonus</font></p></th>
                                <th><p align="center"><font color ="red">NetPay</font></p></th>
                                <th><p align="center"><font color ="red">Action</font></p></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            global $d_amount,$total;






                            $query2  = "SELECT * from employee where emp_type = 'Casual'";
                            $q2 = $conn->query($query2);
                            while($row2 = $q2->fetch_assoc())
                            {

                            include("calculations/regularCalculation.php");


                                ?>


                                <tr>
                                    <td  align="center"><?php echo $emp_id?></td>
                                    <td align="center"><?php echo $fname?> <?php echo $lname?></td>
                                    <td align="center"><big><b><?php echo $salary_rate?></b></big>.00/day</td>
                                    <td align="center"><big><b><?php echo $days?></b></big> days</td>
                                    <td align="center"><big><b><?php echo $deduction?></b></big>.00</td>
                                    <td align="center"><big><b><?php echo $due?></b></big> .00</td>
                                    <td align="center"><big><b><?php echo $advance?></b></big> .00</td>
                                    <td align="center"><big><b><?php echo $bonus?></b></big>.00</td>
                                    <td align="center"><big><b><?php echo $netpay?></b></big>.00</td>
                                    <td align="center">
                                    <a class="btn btn-warning" href="edit_casualAccount.php?emp_id=<?php echo $row2["emp_id"]; ?>"><i class="fas fa-money-bill-alt"></i> Pay</a>
                                    </td>

                                </tr>


                            <?php } ?>
                            </tbody>

                            <tr class="info">
                              <th><p align="center"><font color ="red">ID</font></p></th>
                              <th><p align="center"><font color ="red">Name</font></p></th>
                              <th><p align="center"><font color ="red">Salary rate</font></p></th>
                              <th><p align="center"><font color ="red">Works</font></p></th>
                              <th><p align="center"><font color ="red">Deduction</font></p></th>
                              <th><p align="center"><font color ="red">Due</font></p></th>
                              <th><p align="center"><font color ="red">Advance</font></p></th>
                              <th><p align="center"><font color ="red">Bonus</font></p></th>
                              <th><p align="center"><font color ="red">NetPay</font></p></th>
                              <th><p align="center"><font color ="red">Action</font></p></th>
                          </tr>
                            </tr>

                        </table>
                    </form>
                </div>
            </fieldset>
        </form>
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
                          <label class="col-sm-4 control-label">Name & Salary :</label>
                          <div class="col-sm-8">
                            <select  class="form-control" id="emp_id" style=" height:45px;" name="emp_id" onchange="myFunction(this.value)">
                              <option value=''>------- Select --------</option>
                              <option value='all'>All Casual Employee</option>
                              <?php
                              $query1  = "SELECT emp_id, fname,lname,salary from employee where emp_type='Casual'";
                              $q1 = $conn->query($query1);
                              while($row1 = $q1->fetch_assoc())
                              {
                              ?>
                                <option class="form-control" value = "<?php echo $row1["emp_id"] ?>"><?php echo $row1["fname"] ." ".$row1["lname"]?> / <?php echo $row1["salary"] ?></option>
                                <?php  }?>
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                           <label class="col-sm-4 control-label">Salary  :</label>
                           <div class="col-sm-8">

                               <input type="text" name="salary" class="form-control" value="<?php echo $row1["salary"]?>" required="required" readonly>

                           </div>
                       </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Percentage :</label>
                          <div class="col-sm-8">
                            <select  class="form-control" id="" style=" height:45px;" name="" onchange="myFunction(this.value)">
                              <option value=''>------- Select --------</option>
                              <option value='5'>5%</option>
                              <option value=''>10%</option>
                              <option value=''>15%</option>
                              <option value=''>20%</option>
                              <option value=''>25%</option>
                              <option value=''>30%</option>
                              <option value=''>35%</option>
                              <option value=''>40%</option>
                              <option value=''>45%</option>
                              <option value=''>50%</option>
                            </select>
                          </div>
                      </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Bonus</label>
                            <div class="col-sm-8">
                                <input type="text" name="salary_rate" class="form-control" placeholder="Enter Bonus Amount" required="required">
                                <input type="hidden" name="salary_type" value = "2" class="form-control" placeholder="Enter Salary" required="required">

                            </div>
                        </div>





                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" name="submit" class="btn btn-success" value="Submit">
                                <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                                  <button type="button" class="close-btn btn-info btn-sm" data-dismiss="modal" title="Close">&times;</button>
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


    <br><br>
  </div>

    <?php

    include ("footer.php");

    ?>

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
