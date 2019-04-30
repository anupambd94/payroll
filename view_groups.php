<?php
  include("db.php"); //include auth.php file on all secure pages



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
         <li class="active"><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><b><font color="Black">Company<b></font></p></a></li>
         <li><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><b><font color="Black">Company Bill<b></font></p></a></li>
         <li><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><b><font color="Black">Employee<b></font></p></a></li>
         <li ><i class="fa fa-circle"></i><a href="home_salaryRegular.php"><p><font size="2"><b> <font color="Black">Pay Regular Employee<b></font></p></a></li>
         <li ><i class="fa fa-circle"></i><a href="home_salaryCasual.php"><p><font size="2"><b><font color="Black">Pay Casual Employee<b></font></p></a></li>
         <li><i class="fa fa-circle"></i><a href="home_salaryJobOrder.php"><p><font size="2"><b><font color="Black">Pay Job Order Employee<b></font></p></a></li>
         <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><b><font color="Black">Payment Report<b></font></p></a></li>
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
                <li class="active"><a href="home_company.php">Company</a></li>
                <li ><a href="home_payment.php">Payment Report</a></li>
                <li><a href="home_store.php">store</a></li>


                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a data-toggle="modal" href="#colins"><i class="fa fa-bicycle"></i> Admin</a></li>
                  </ul>
                  </div>
                  </nav>




      <?php
        $s_id=$_REQUEST['s_id'];

        $id =


      $query  = "SELECT * from compaygroup where s_id='".$s_id."'";
      $q = $conn->query($query);
      while($row = $q->fetch_assoc())
        {

          ?>
          <div class="row">
              <div class="col-md-12">
                <?php
                $company_id = $row["id"];
                $query0  = "SELECT name from company where id = '".$company_id."'";
                $q0 = $conn->query($query0);
                $row0 = $q0->fetch_assoc();
                $company_name = $row0["name"];
                ?>

                <marquee>  <h1 class="page-subhead-line"><font size="5"><span class="different-text-color"><font color="white">WELCOME TO ENTERPRISE RESOURCES PLANNING  SYSTEM </strong> @@@ Today is:
                  <?php
                  date_default_timezone_set("Asia/Dhaka");
                  echo  date(" l, F d, Y") . "<br>";

                  ?>
                 <i class="icon-calendar icon-large" ></i> </font>  </marquee>

                  <h1 class="page-head-line"><font color="Black"><u>Company: <?php echo ' '. $company_name ?> </h1>

                  <?php
                  date_default_timezone_set("Asia/Dhaka");
                  echo  date(" l, F d, Y") . "<br>";

                  ?>
                  </font>
                </u>

              </div>
          </div>

              <form class="form-horizontal" action="update_group.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="s_id" type="hidden" value="<?php echo $s_id?>" />
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>

                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label"><font color="Black">Group ID :</label>
                    <div class="col-sm-4">
                      <input type="text" name="g_id" class="form-control" value="<?php echo $row['g_id'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Group Name  :</label>
                      <div class="col-sm-4">
                          <input type="text" name="g_name" class="form-control" value="<?php echo $row['g_name'];?>" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label"> Address  :</label>
                      <div class="col-sm-4">
                          <input type="text" name="address" class="form-control" value="<?php echo $row['address'];?>" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Contact Number  :</label>
                      <div class="col-sm-4">
                          <input type="text" name="contact" class="form-control" value="<?php echo $row['contact'];?>" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Details  :</label>
                      <div class="col-sm-4">
                          <input type="text" name="detail" class="form-control" value="<?php echo $row['detail'];?>" required="required">
                      </div>
                  </div>
                  <br><br>

                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Update" class="btn btn-danger">
                      <a href="view_groupList.php" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>
                </div>

              </form>
              <br><br><br><br>


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
