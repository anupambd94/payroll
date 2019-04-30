<?php
  include("db.php"); //include auth.php file on all secure pages


?>




      <?php
        $sno=$_REQUEST['sno'];

      $query  = "SELECT * from transaction where sno='".$sno."'";
      $q = $conn->query($query);
      while($row = $q->fetch_assoc())
        {

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
                    <li><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><b><font color ="Black">Company<b></font></p></a></li>
                    <li><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><b><font color ="Black">Company Bill<b></font></p></a></li>
                    <li ><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><b><font color ="Black">Employee<b></font></p></a></li>
                    <li><i class="fas fa-people-carry"></i><a href="home_salaryRegular.php"><p><font size="2"><b><font color ="Black"> Payment<b></font></p></a></li>
                    <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><b><font color ="Black"> Payment Report<b></font></p></a></li>
                    <li ><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><b><font color ="Black">Store<b></font></p></a></li>
                    <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><b><font color ="Black">Setting<b></font></p></a></li>
                    <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><b><font color ="Black">Logout</font><b></font></p></a></li>
                  </ul>
            </aside>


                  <div id="page-wrapper">
                      <div id="page-inner">


                  <!--marquee start-->


                        <marquee>  <h1 class="page-subhead-line"><p style="font-size:x-large;"><span class="different-text-color"><font color="White">WELCOME TO-ERP @ Today is:
                         <i class="icon-calendar icon-large" ></i>


                         <?php
                         date_default_timezone_set("Asia/Dhaka");
                         echo  date(" l, F d, Y") . "<br>";

                         ?>
                          </span></p></h1> </marquee>


                          <!--marquee close-->




          <div class="row">
              <div class="col-md-12">
                  <h1 class="page-head-line"><p><font color="white">Product: <!--</p><?php echo $row['p_name']; ?>--></h1>


              </div>
          </div>

              <form class="form-horizontal" action="update_transaction.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="sno" type="hidden" value="<?php echo $sno;?>" />

                <div class="form-group">
                            <label class="col-sm-5 control-label">Date :</label>
                            <div class="col-sm-4">
                                <input class="form-control" id="datepicker" name="d_date" type="text" value = "<?php echo $row['t_date'];?>"/>
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label">Amount  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="amount" class="form-control" value="<?php echo $row['amount'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Cause  :</label>
                      <div class="col-sm-4">
                          <input type="text" name="cause" class="form-control" value="<?php echo $row['cause'];?>" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Remark  :</label>
                      <div class="col-sm-4">
                          <input type="text" name="remark" class="form-control" value="<?php echo $row['remark'];?>" >
                      </div>
                  </div>



                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Update" class="btn btn-warning">
                      <a href="dailyTransactions.php" class="btn btn-danger">Cancel</a>
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
