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
        var ScrollMsg= "ERP - "
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

    <div class="container">

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
              <a href="https://www.bubt.edu.bd/"> <center><img src="img/core-img/BUBT-Logo.png" alt=""><h2><font color="Black">@ERP@</h2></center></a>
              <!-- Logo Close-->
             <ul>
               <li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><b><font color="Black">Home<b></font></p></a></li>
               <li><i class="far fa-comments"></i><a href="index_another.php"><p><font size="2"><b><font color="Black">Transaction Report <b></font></p></a></li>
               <li><i class="fas fa-comment-dollar"></i><a href="home_cash.php"><p><font size="2"><b><font color="Black">Credited Cash<b></font></p></a></li>
               <li><i class="fab fa-phoenix-framework"></i><a href="home_bkash.php"><p><font size="2"><b><font color ="Black">Credited Bkash<b></font></p></a></li>
               <li><i class="fas fa-american-sign-language-interpreting"> </i> <a href="dailyTransactions.php"><p><font size="2"><b><font color="Black">Debited Cash/Bkash <b></font></p></a></li>
               <li class="active"><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><b><font color="Black">Company<b></font></p></a></li>
               <li ><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><b><font color="Black">Company Bill<b></font></p></a></li>
               <li><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><b><font color="Black">Employee<b></font></p></a></li>
               <li><i class="fa fa-circle"></i><a href="home_salaryRegular.php"><p><font size="2"><b> <font color="Black">Regular Employee<b></font></p></a></li>
               <li><i class="fa fa-circle"></i><a href="home_salaryCasual.php"><p><font size="2"><b><font color="Black">Casual Employee<b></font></p></a></li>
               <li><i class="fa fa-circle"></i><a href="home_salaryJobOrder.php"><p><font size="2"><b><font color="Black">Job Order Employee<b></font></p></a></li>
               <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><b><font color="Black">Payment Report<b></font></p></a></li>
               <li ><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><b><font color="Black">Store<b></font></p></a></li>
               <li ><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><b><font color="Black">Setting<b></font></p></a></li>
               <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><b><font color="Black">Logout<b></font></p></a></li>
             </ul>
        </aside>
      </div>
      </div>
        <div class="col-sm-10">

      <div class="masthead">
        <h3>
          <b><a href="index.php"><font color ="White"><font size ="5">Enterprise Resources planning System</font></a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b><font color ="White"><font size ="4"><i class="fa fa-bicycle"></i> Admin</font></b></a>
        </h3>
        <br><br>
        <h5>
           <marquee>

          <h4><span "background-color:red;"><p><font color="#FBB710">@@@ WELLCOME TO ENTERPRISE RESOURCES PLANNING SYSTEM ........!!!!!!</font></p></span></h4>
          </marquee>
        </h5>

        <nav>
            <ul class="nav nav-justified">
                <li ><a href="index.php" >Home</a></li>
                <li class="active"><a href="home_company.php" >Company</a></li>
                <li><a href="home_bill.php">Company Bill</a></li>
                <li><a href="home_employee.ph">Employe</a></li>
                <li><a href="home_payment.php">Payment Report</a></li>
                <li><a href="home_store.php">Store</a></li>



            </ul>
        </nav>
      </div><br><br>

      <?php
        $id=$_REQUEST['id'];

      $query  = "SELECT * from company where id='".$id."'";
      $q = $conn->query($query);
      while($row = $q->fetch_assoc())
        {

          ?>

          <<form class="form-horizontal" action="update_company.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $row['id'];?>" />

                  <div class="form-group">
                    <label class="col-sm-5 control-label"><font color="#FBB710">Company  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Company Type  :</label>
                    <div class="col-sm-4">
                      <select name="company_type" class="form-control" required>
                        <option value="<?php echo $row['company_type'];?>"><?php echo $row['company_type'];?></option>
                        <option value="Regular">Regular</option>
                        <option value="Casual">Casual</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Address  :</label>
                      <div class="col-sm-4">
                          <input type="text" name="address" class="form-control" value="<?php echo $row['address'];?>" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Mobile  :</label>
                      <div class="col-sm-4">
                          <input type="text" name="mobile" class="form-control" value="<?php echo $row['mobile'];?>" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Details  :</font></label>
                      <div class="col-sm-4">
                          <input type="text" name="details" class="form-control" value="<?php echo $row['details'];?>" required="required">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Update" class="btn btn-danger">
                      <a href="home_company.php" class="btn btn-primary">Cancel</a>
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

    </div

    <?php
    //include ("footer.php");
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

  </body>
</html>
