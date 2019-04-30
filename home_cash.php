<?php
  include("db.php"); //include auth.php file on all secure pages
  include("payment_regular.php");

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
      <div class="col-sm-2">
  <aside class="main_sidebar">
    <!-- Logo -->
   <div class="logo">
       <a href="https://www.bubt.edu.bd/"> <center><img src="img/core-img/BUBT-Logo.png" alt=""><h2><font color ="Blue">@ERP@</h2></center></a>
       <!-- Logo Close-->
       <ul>
         <li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><font color="white"><font color ="Black">Home</font></font></p></a></li>
         <li ><i class="far fa-comments"></i><a href="index_another.php"><p><font size="2"><font color="white"><font color ="Black"> Transaction Report</font></font></p></a></li>
         <li class="active"><i class="fas fa-comment-dollar"></i><a href="home_cash.php"><p><font size="2"><font color="white"><font color ="Black">Credited Cash</font></p></a></li>
         <li><i class="fab fa-phoenix-framework"></i><a href="home_bkash.php"><p><font size="2"><font color="white"><font color ="Black">Credited Bkash</font></p></a></li>
         <li><i class="fas fa-american-sign-language-interpreting"></i><a href="dailyTransactions.php"><p><font size="2"><font color="white"><font color ="Black">Debited Cash/Bkash </font></p></a></li>
         <li><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><font color="white"><font color ="Black">Company</font></p></a></li>
         <li><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><font color="white"><font color ="Black">Company Bill</font></p></a></li>
         <li ><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><font color="white"><font color ="Black">Employee</font></p></a></li>
         <li><i class="fas fa-people-carry"></i><a href="home_salaryRegular.php"><p><font size="2"><font color="white"><font color ="Black">Payment</font></p></a></li>
         <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><font color="white"><font color ="Black">Payment Report</font></p></a></li>
         <li><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><font color="white"><font color ="Black">Store</font></p></a></li>
         <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><font color="white"><font color ="Black">Setting</font></p></a></li>
         <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><font color="white"><font color ="Black">Logout</font></font></p></a></li>
       </ul>
  </aside>
</div>
<div class="col-sm-10">
        <div id="page-wrapper">
            <div id="page-inner">


              <div class="masthead">
                <h3>
                  <b><a href=""><font color="white"><font size="5"><u><i>Enterprise Resources planning System</i></u></font></a></b>
                    <a data-toggle="modal" href="#colins" class="pull-right"><b><font color="White"><i class="fa fa-bicycle"></i> Admin</b></a>
                </h3>

              </div><br><br>

<style type="text/css">
.different-text-color { color: green; }
</style>
<h5>
   <marquee>

  <h3><span "background-color:red;"><p><font color="#FBB710">@@@ WELLCOME TO ENTERPRISE RESOURCES PLANNING SYSTEM ........!!!!!!</font></p></span></h3>
  </marquee>
</h5>

              <div class="row">
                  <div class="col-md-12">
                      <h1 class="page-head-line"><p><font color ="Black"><font size ="6">Cash Deporsit </font></p></h1>





                      <?php
                      date_default_timezone_set("Asia/Dhaka");
                      echo  date(" l, F d, Y") . "<br>";

                      ?>
                     </span></p></h1> </marquee>

                  </div>
              </div>

      <div class="container">
        <div class="well bs-component">
            <form class="form-horizontal">
                <fieldset>
                  <button type="button" data-toggle="modal" data-target="#addcash" class="btn btn-info btn-lg"><font size="2"><i class="fa fa-bell"></i> Cr Cash</font></button>


                    <p align="center"><big><b><font color="Black">Balance Sheet</b></big></p>
                    <div class="table-responsive">
                        <form method="post" action="" >
                            <table class="table table-bordered table-hover table-condensed" id="myTable">
                                <!-- <h3><b>Ordinance</b></h3> -->
                                <thead>
                                <tr class="info">
                                    <th><p align="center"><font color="black">SN </font></p></th>
                                    <th><p align="center"><font color="black">Given Date</font></p></th>
                                    <th><p align="center"><font color="black">Amount</font></p></th>
                                    <th><p align="center"><font color="black">remark</font></p></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                global $sn;
                                global $company_name;
                                global $totalCash;
                                global $paid;
                                global $billsno;

                                $sn = 0;

                                $query1  = "SELECT * from cash";
                                $q1 = $conn->query($query1);
                                while($row1 = $q1->fetch_assoc())
                                {
                                  $sn++;
                                  $c_id = $row1["c_id"];
                                  date_default_timezone_set("Asia/Dhaka");
                                  $GivenDate = date('D , d-M , Y', strtotime($row1["given_date"]));
                                  $amount =  $row1["amount"];
                                  $remark= $row1["remark"];




                                    ?>
                                    <tr>
                                        <td align="center"><?php echo $sn?></td>
                                        <td align="center"><?php echo $GivenDate ?></td>
                                        <td align="center"><?php echo $amount  ?>.00</td>
                                        <td align="center"><?php echo $remark  ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>

                                <tr class="info">
                                  <th><p align="center"><font color="black">SN </font></p></th>
                                  <th><p align="center"><font color="black">Given Date</font></p></th>
                                  <th><p align="center"><font color="black">Amount</font></p></th>
                                  <th><p align="center"><font color="black">remark</font></p></th>
                                </tr>
                            </table>
                        </form>
                    </div>
                </fieldset>
            </form>
        </div>

      </div>


      <!-- this modal is for ADDING cash-->
      <div class="modal fade" id="addcash" role="dialog">
          <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                  <h1 align="center"><b><font color="blue">ADD CASH</font></b></center></h1>
                  </div>
                  <div class="modal-body" style="padding:40px 50px;">

                      <form class="form-horizontal" action="add_cash.php" name="form" method="post">
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><p><font color="blue">  Date :</p></label>
                            <div class="col-sm-8">
                                <input class="form-control btn-lg" id="datepicker"

                                value="<?php echo $thisDate;?>" name="given_date" type="text" />




                               <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });


                                </script>





                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Amount :</label>
                            <div class="col-sm-8">
                                <input type="number" name="amount" class="form-control btn-lg" placeholder="Enter cash amount" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Remark :</label>
                            <div class="col-sm-8">
                                <input type="text" name="remark" class="form-control btn-lg" placeholder="Remark for given cash">
                            </div>
                        </div>



                          <div class="form-group">
                              <label class="col-sm-4 control-label"></label>
                              <div class="col-sm-8">
                                  <input type="submit" name="submitcash" class="btn btn-success btn-lg" value="Submit">
                                  <input type="reset" name="" class="btn btn-danger btn-lg " value="Clear Fields">
                                <button type="button" class="close-btn btn-info btn-lg" data-dismiss="modal" title="Close">&times;</button>
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

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
          <div class="modal-dialog modal-sm">

              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header" style="padding:20px 50px;">
                      <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                  <!--    <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>-->


                  </div>
                  <div class="modal-body" style="padding:40px 50px;">
                      <div align="center">
                          <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>


      <?php

      include ("footer.php");

      ?>

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
