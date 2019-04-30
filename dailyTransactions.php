<?php

include("db.php");
include("add_dailyTransaction.php");


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
  <link rel="stylesheet" href="style.css">
  <body>
    <body style="background-image: url(img/login4.jpg)">

  <div class="container">
    <div class="wrapper">
        <!--sidebar start-->
        <div class="col-sm-2">
    <aside class="main_sidebar">
      <!-- Logo -->
     <div class="logo">
         <a href="index.php"> <center><img src="img/core-img/BUBT-Logo.png" alt=""><h2><font color="Black">@ERP@</h2></center></a>
         <!-- Logo Close-->
         <ul>
           <li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><b><font color="white"><font color ="Black">Home</font><b></font></p></a></li>
           <li ><i class="far fa-comments"></i><a href="index_another.php"><p><font size="2"><b><font color="white"><font color ="Black"> Transaction Report</font> <b></font></p></a></li>
           <li ><i class="fas fa-comment-dollar"></i><a href="home_cash.php"><p><font size="2"><b><font color="white"><font color ="Black">Credited Cash <b></font></p></a></li>
           <li ><i class="fab fa-phoenix-framework"></i><a href="home_bkash.php"><p><font size="2"><b><font color="white"><font color ="Black">Credited Bkash<b></font></p></a></li>
           <li class="active"><i class="fas fa-american-sign-language-interpreting"></i><a href="dailyTransactions.php"><p><font size="2"><b><font color="white"><font color ="Black">Debited Cash/Bkash <b></font></p></a></li>
           <li><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><b><font color="white"><font color ="Black">Company<b></font></p></a></li>
           <li><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><b><font color="white"><font color ="Black">Company Bill<b></font></p></a></li>
           <li ><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><b><font color="white"><font color ="Black">Employee<b></font></p></a></li>
           <li><i class="fas fa-people-carry"></i><a href="home_salaryRegular.php"><p><font size="2"><b><font color="white"><font color ="Black">Payment<b></font></p></a></li>
           <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><b><font color="white"><font color ="Black">Payment Report<b></font></p></a></li>
           <li><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><b><font color="white"><font color ="Black">Store<b></font></p></a></li>
           <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><b><font color="white"><font color ="Black">Setting<b></font></p></a></li>
           <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><b><font color="white"><font color ="Black">Logout</font><b></font></p></a></li>
         </ul>
    </aside>
  </div>
    <!--sidebar close-->
<div class="col-sm-10">
        <div id="page-wrapper">
          <h3>
        <b><a href="index.php"><font color="White">ERP</a></b>
          <a data-toggle="modal" href="#colins" class="pull-right"><b><font size="4"><font color="white"> <i class="fa fa-bicycle"></i> Admin</font></b></a>
      </h3>

            <div id="page-inner">
              <!--marquee-->
              <h5>
                 <marquee>

                  <h4><span "background-color:blue;"><p><font color="#FBB710">@@@ WELLCOME TO ENTERPRISE RESOURCES PLANNING SYSTEM ........!!!!!!</font></p></span></h4>
                </marquee>
             </h5>
               <!--marquee close-->
<div class="row">
    <div class="col-md-12">
        <h1 class="page-head-line"> <p><font color ="#FBB710"><font size ="6"> Debited Cash/Bkash </font> </p></h1>


           <style type="text/css">
           .different-text-color { color: green; }
        </style>

  <div>

        <?php
        date_default_timezone_set("Asia/Dhaka");
        echo  date(" l, F d, Y") . "<br>";

        ?>
      </font>
     </div>

    </div>
</div>


            <div>

                <div class="well bs-component">

                    <form class="form-horizontal" action="#" name="form" method="post">
                       <div class="form-group">
                                  <label class="col-sm-4 control-label"><font size ="2.8"><font color="blue">Date :</label>
                                  <div class="col-sm-5">

                                      <input class="form-control" id="datepicker" name="t_date" type="text" value = "<?php echo $thisDate; ?>" />
                                      <script>
                                          $('#datepicker').datepicker({
                                              uiLibrary: 'bootstrap4'
                                          });
                                      </script>
                                  </div>
                              </div>

                <div class="form-group">
                    <label class="col-sm-4 control-label">Debited Cause :</label>
                    <div class="col-sm-5">
                        <input type="text" name="cause" class="form-control" placeholder="enter debited cause" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label"> Debited Amount :</label>
                    <div class="col-sm-5">
                        <input type="text" name="amount" class="form-control" placeholder="enter debited amount = 1000/-" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Debited Method :</label>
                    <div class="col-sm-5">
                        <input type="radio" name="method"  value="cash" required="required">Cash &nbsp;&nbsp;
                        <input type="radio" name="method" value="bkash" required="required">Bkash


                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Remark :</font></font></label>
                    <div class="col-sm-5">
                        <input type="text" name="remark" class="form-control" placeholder="Enter remark">
                    </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-5">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                    <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                    <button class="btn btn-danger" onclick="myFunction()">Reload page</button>

                     <script>
                    function myFunction() {
                     location.reload();
                    }
                   </script>
                  </div>
                </div>
              </form>
              <br><br>
            <form class="form-horizontal">

              <fieldset>

                <br><br>
                <div class="table-responsive" >
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">

                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info" color="black">
                          <th><p align="center"><font color="black"><font size="3">Serial No</p></th>
                          <th><p align="center"><font color="black"><font size="3">Date</p></th>
                          <th><p align="center"><font color="black"><font size="3">Cause</p></th>
                          <th><p align="center"><font color="black"><font size="3">Amount</p></th>
                            <th><p align="center"><font color="black"><font size="3">Method</p></th>
                            <th><p align="center"><font color="black"><font size="3">Remark</p></th>
                        </tr>
                      </thead>
                      <tr class="info">
                          <th><p align="center"><font color="black"><font size="3">Serial No</p></th>
                          <th><p align="center"><font color="black"><font size="3">Date</p></th>
                          <th><p align="center"><font color="black"><font size="3">Cause</p></th>
                          <th><p align="center"><font color="black"><font size="3">Amount</p></th>
                            <th><p align="center"><font color="black"><font size="3">Method</p></th>
                            <th><p align="center"><font color="black"><font size="3">Remark</p></th>
                        </tr>
                      <tbody>

                        <?php
                          $query = "select * from transaction where delete_status = '0' ORDER BY sno asc ";
                        $q = $conn->query($query);
                        $serial = 0;
                        while($row = $q->fetch_assoc())
                          {

                            $serial++;
                            $sno     =$row['sno'];
                            $date = date('d/m/Y', strtotime($row['t_date']));
                            $cause   =$row['cause'];
                            $amount  =$row['amount'];
                            $method  =$row['method'];
                            $remark  =$row['remark'];



                        ?>

                        <tr>

                          <td align="center" scope="row"><a href="view_transection.php?sno=<?php echo $row["sno"]; ?>" title="Update">  <?php echo $serial ?></a></td>
                          <td align="center" ><a  href="view_transection.php?sno=<?php echo $row["sno"]; ?>" title="Update"><?php echo $date ?></a></td>
                          <td align="center"><a  href="view_transection.php?sno=<?php echo $row["sno"]; ?>" title="Update"><?php echo $cause?></a></td>
                          <td align="center"><a  href="view_transection.php?sno=<?php echo $row["sno"]; ?>" title="Update"><?php echo $amount?>/- Tk</a></td>

                            <td align="center"><a  href="view_transection.php?sno=<?php echo $row["sno"]; ?>" title="Update"><?php echo $method ?></a></td>
                            <td align="center"><a  href="view_transection.php?sno=<?php echo $row["sno"]; ?>" title="Update"><?php echo $remark ?></a></td>

                        </tr>

                        <?php } ?>
                      </tbody>
                      <tr class="info">
                          <th><p align="center"><font color="black"><font size="3">Serial No</p></th>
                          <th><p align="center"><font color="black"><font size="3">Date</p></th>
                          <th><p align="center"><font color="black"><font size="3">Cause</p></th>
                          <th><p align="center"><font color="black"><font size="3">Amount</p></th>
                            <th><p align="center"><font color="black"><font size="3">Method</p></th>
                            <th><p align="center"><font color="black"><font size="3">Remark</p></th>
                        </tr>

                    </table>

                  </form>
                </div>
              </fieldset>
            </form>


          </div>
        </div>
        <?php include("footer.php")
        ?>

      <!-- this modal is for Deleting Transaction -->



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

<!--datetime pricker start-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
<!--datetime pricker Close-->

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
    <script src="assets/js/jquery.min.js" ></script>
   <script src="assets/js/ddtf.js" ></script>

    <script>

        $("#myTable").ddTableFilter();
    </script>
  </script>
