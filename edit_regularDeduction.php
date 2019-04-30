<?php
  include("db.php"); //include auth.php file on all secure pages

global $name,$emp_id,$t;

  $id=$_REQUEST['deduction_id'];

  $query  = "SELECT emp_id from deductions where deduction_id='".$id."'";
  $q = $conn->query($query);
while($row = $q->fetch_assoc())
  {
    $emp_id = $row['emp_id'];
  }

  $query1  = "SELECT * from employee where emp_id='".$emp_id."'";
  $q1 = $conn->query($query1);
while($row1 = $q1->fetch_assoc())
  {
    $name = $row1['fname'].' ' .$row1['lname'];

    if($row1["emp_type"]=="Regular"){
        $t="1";
    }
    else if($row1["emp_type"]=="Casual"){
        $t="2";
    }
    else if($row1["emp_type"]=="Job Order"){
        $t="3";
    }
    else{$t=4;}
  }
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
       <a href="https://www.bubt.edu.bd/"> <center><img src="img/core-img/BUBT-Logo.png"" alt=""><h2><font color="Black">@ERP@</h2></center></a>
       <!-- Logo Close-->
       <ul>
         <li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><font color="Black">Home</font></p></a></li>
         <li><i class="far fa-comments"></i><a href="index_another.php"><p><font size="2"><font color="Black"> Transaction Report </font></p></a></li>
         <li><i class="fas fa-comment-dollar"></i><a href="home_cash.php"><p><font size="2"><font color="Black">Credited Cash </font></p></a></li>
         <li><i class="fab fa-phoenix-framework"></i><a href="home_bkash.php"><p><font size="2"><font color ="Black">Credited Bkash </font></p></a></li>
         <li><i class="fas fa-american-sign-language-interpreting"> </i> <a href="dailyTransactions.php"><p><font size="2"><font color="Black">Debited Cash/Bkash </font></p></a></li>
         <li><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><b><font color ="Black">Company<b></font></p></a></li>
         <li ><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><b><font color ="Black">Company Bill<b></font></p></a></li>
         <li ><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><b><font color ="Black">Employee<b></font></p></a></li>
         <li class="active"><i class="fas fa-people-carry"></i><a href="home_salaryRegular.php"><p><font size="2"><b><font color ="Black"> Payment<b></font></p></a></li>
         <li ><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><b><font color ="Black"> Payment Report<b></font></p></a></li>
         <li><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><b><font color ="Black">Store<b></font></p></a></li>
         <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><b><font color ="Black">Setting<b></font></p></a></li>
         <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><b><font color ="Black">Logout</font><b></font></p></a></li>
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
            <li class="active" ><a href="home_salaryRegular.php">Payment</a></li>
            <li ><a href="home_payment.php">Payment Report</a></li>
            <li><a href="home_store.php">store</a></li>


                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a data-toggle="modal" href="#colins"><i class="fa fa-bicycle"></i> Admin</a></li>

                  </ul>
                  </div>
                  </nav>

                                    <h1>
                                    <marquee>
                                  <h2><span "background-color:red;"><p><font color="white"><font size="3">@@@ WELLCOME TO ENTERPRISE RESOURCES PLANNING SYSTEM ........!!!!!!</font></font></p></span></h2>
                                    </marquee>
                                    </h1>

                                        <font color="black"> <u>  <h1 class="page-head-line"><?php echo $name; ?></h1> </u>

                                           <u><i class="icon-calendar icon-large" ></i>

                                            <?php
                                            date_default_timezone_set("Asia/Dhaka");
                                            echo  date(" l, F d, Y") . "<br>";

                                            ?>
                                            </u>
                                            </h1></font>



<div class="row">
    <div class="col-md-10">


      <?php
        $id=$_REQUEST['deduction_id'];

      $query  = "SELECT * from deductions where deduction_id='".$id."'";
      $q = $conn->query($query);
      while($row = $q->fetch_assoc())
        {

          ?>

              <form class="form-horizontal" action="update_deduction.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $id;?>" />
                <input name="emp_id" type="hidden" value="<?php echo $emp_id;?>" />
                 <input name="type" type="hidden" value="<?php echo $t;?>" />


                  <div class="form-group">
                    <label class="col-sm-5 control-label"><font color="White">Employee  Name:</label>
                    <div class="col-sm-4">
                      <input type="text" name="lname" class="form-control" value="<?php echo $name;?>" required="required" readonly>

                    </div>
                  </div>
                  <div class="form-group">
                            <label class="col-sm-5 control-label">Deduction Date :</label>
                            <div class="col-sm-4">

                                <input class="form-control" id="datepicker" name="d_date" value="<?php echo $thisDate;?>" type="text" />
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Cause:</label>
                    <div class="col-sm-4">
                      <input type="text" name="d_cause" class="form-control" value="<?php echo $row["d_cause"];?>" required="required" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Amount:</label>
                    <div class="col-sm-4">
                      <input type="text" name="d_amount" class="form-control" value="<?php echo $row["d_amount"];?>" required="required" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Remark:</label>
                    <div class="col-sm-4">
                      <input type="text" name="remark" class="form-control" value="<?php echo $row["remark"];?>">
                    </div>
                  </div></font>


                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Update" class="btn btn-danger">
                      <a href="edit_regularAccount.php?emp_id=<?php echo $emp_id;?>" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>
                </div>

              </form>
            <?php
          }
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
