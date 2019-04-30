<?php
 include("auth.php"); //include auth.php file on all secure pages
 include("add_employee.php");
 include("db.php");
?>

<?php

include ("head.php");

?>
<!-- Title  -->
<title>Enterprise Resources planning System</title>

<!-- header logo  -->
<link rel="icon" href="img/core-img/favicon.ico">
<!-- Title  -->
<title>Enterprise Resources planning System</title>

<!-- header logo  -->
<link rel="icon" href="img/core-img/favicon.ico">
  <body>




    <div class="container-fluid">
      <div class="wrapper">

    <div class="row">
      <div class="col-sm-3">
        <aside class="main_sidebar">
          <!-- Logo -->
         <div class="logo">
             <a href="https://www.bubt.edu.bd/"> <center><img src="img/core-img/BUBT-Logo.png" alt=""><h2><font color ="Black">@ERP@</h2></center></a>
             <!-- Logo Close-->
            <ul>
              <li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><b><font color="white"><font color ="Black">Home</font><b></font></p></a></li>
              <li class="active"><i class="far fa-comments"></i><a href="index_another.php"><p><font size="2"><b><font color="white"><font color ="Black"> Transaction Report</font> <b></font></p></a></li>
              <li><i class="fas fa-comment-dollar"></i><a href="home_cash.php"><p><font size="2"><b><font color="white"><font color ="Black">Credited Cash <b></font></p></a></li>
              <li><i class="fab fa-phoenix-framework"></i><a href="home_bkash.php"><p><font size="2"><b><font color="white"><font color ="Black">Credited Bkash <b></font></p></a></li>
              <li><i class="fas fa-american-sign-language-interpreting"></i><a href="dailyTransactions.php"><p><font size="2"><b><font color="white"><font color ="Black">Debited Cash/Bkash  <b></font></p></a></li>
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
      <div class="col-sm-8">

                  <div class="mian">

                      <h1>
                        <marquee>

                  <h4><span "background-color:red;"><p><font color="#FBB710">@@@ WELLCOME TO ENTERPRISE RESOURCES PLANNING SYSTEM ........!!!!!!</font></p></span></h4>
               </marquee> </h1>
                </div>

                      <div class="masthead">
                    <!-- Jumbotron -->
                    <div class="jumbotron bg-light">

                        <div class="alert alert-warning" role="alert" >
                            <i class="icon-calendar icon-medium" ></i>


                            <?php
                            date_default_timezone_set("Asia/Dhaka");
                            echo  date("l, F d, Y") . "<br>";
                            ?>


                            <h2><p> <center> Company All Transactions Report  </center> </p></h2>

                        </div>

                        <!-- /. ROW  -->


                      <!--  <div align="left" style="">
                       <a class="btn btn-info btn-sm " href="home_cash.php"><font size="3"> <i class="fas fa-bell"></i>Credited Cash </a>
                         <a class="btn btn-info" href="home_bkash.php"><font size="3"> <i class="fas fa-bell"></i> Credited Bkash </a>
                       <a class="btn btn-info" href="dailyTransactions.php"><font size="3"> <i class="fas fa-bell"></i> Debited Cash/Bkash </a>
                         <br><br>
                       <a class="btn btn-info" href="home_payment.php"><font size="3"> <i class="fas fa-bell"></i> Payment Report</a>
                         <a class="btn btn-info" href="home_company.php"><font size="3"> <i class="fas fa-bell"></i> Company  </a>
                       <a class="btn btn-info" href="home_employee.php"><font size="3"> <i class="fas fa-bell"></i>Employee </a>
                       <a class="btn btn-info" href="home_store.php"><font size="3"> <i class="fas fa-bell"></i> Store</a>
                      </div>
                    </div>-->

              <?php

              include ("main.php");

              ?>



                        <!-- /. ROW
            <h1>OOP 2</h1>
            <p class="lead">The Payroll and Management System was created through the use of HTML5, BOOTSTRAP, JQUERY, CSS, and PHP which was a server-side programming language.</p>
            <p><a data-toggle="modal" class="btn btn-lg btn-success" href="#instructor" role="button">Contact to:</a></p>
          </div>




          <div class="modal fade" id="instructor" role="dialog">
            <div class="modal-dialog modal-sm">


              <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                  <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                  <h3 align="center"><b>Creator</b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                  <br align="center">
                      <a href="https://www.facebook.com/riyajulislam.abir" target="_blank" title="My Instructor in OOP2"><big><b>Md Ahamed Abir</b></big></a>
                  </div>
                </div>
              </div>
            </div>


    -->

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
</div>

<?php
include ("footer.php");

?>

</div>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


  </body>
</html>
