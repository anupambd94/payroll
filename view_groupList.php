<?php
include("db.php"); //include auth.php file on all secure pages
include("auth.php");
include("add_companyGroup.php");


// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
global $billsno;

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if (empty($_POST["payMethod"])) {
    $genderErr = "Select a Payment Method to pay";
  } else {
    $gender = test_input($_POST["payMethod"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
global $id;
$id = $_REQUEST['id'];



  $query0  = "SELECT name from company where id = '".$id."'";
  $q0 = $conn->query($query0);
  $row0 = $q0->fetch_assoc();
  $company_name = $row0["name"];

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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 4 DatePicker</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link href="assets/css/remark.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <script src="assets/jquery/billCalculation.js" type="text/javascript"></script>
    <script src="assets/js/ajax.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <title></title>

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
    <script src="assets/jquery/groupidCheck.js" type="text/javascript"></script>

</head>
<?php

include ("head.php");

?>
<!-- Title  -->
<title>Enterprise Resources planning System</title>

<!-- header logo  -->
<link rel="icon" href="img/core-img/favicon.ico">

<body>
  <body style="background-image: url(img/login4.jpg)">
  <link rel="stylesheet" href="css/core-style.css">
   <link rel="stylesheet" href="style.css">

<div class="container">


  <div class="container">
    <div class="wrapper">
        <div class="col-sm-2">
    <aside class="main_sidebar">
      <!-- Logo -->
      <div class="logo">
          <a href="https://www.bubt.edu.bd/"> <center><img src="img/core-img/BUBT-Logo.png" alt=""><h2><font color="Black">@ERP@</h2></center></a>
          <!-- Logo Close-->
          <ul>
            <li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><font color="Black">Home</font></p></a></li>
            <li><i class="far fa-comments"></i><a href="index_another.php"><p><font size="2"><font color="Black">Transaction Report </font></p></a></li>
            <li><i class="fas fa-comment-dollar"></i><a href="home_cash.php"><p><font size="2"><font color="Black">Credited Cash</font></p></a></li>
            <li><i class="fab fa-phoenix-framework"></i><a href="home_bkash.php"><p><font size="2"><font color ="Black">Credited Bkash</font></p></a></li>
            <li><i class="fas fa-american-sign-language-interpreting"> </i> <a href="dailyTransactions.php"><p><font size="2"><font color="Black">Debited Cash/Bkash </font></p></a></li>
            <li  class="active"><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><font color="Black">Company</font></p></a></li>
            <li><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><font color="Black">Company Bill</font></p></a></li>
            <li><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><font color="Black">Employee</font></p></a></li>
            <li ><i class="fa fa-circle"></i><a href="home_salaryRegular.php"><p><font size="2"> <font color="Black">Pay Regular Employee</font></p></a></li>
            <li ><i class="fa fa-circle"></i><a href="home_salaryCasual.php"><p><font size="2"><font color="Black">Pay Casual Employee</font></p></a></li>
            <li><i class="fa fa-circle"></i><a href="home_salaryJobOrder.php"><p><font size="2"><font color="Black">Pay Job Order Employee</font></p></a></li>
            <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><font color="Black">Payment Report</font></p></a></li>
            <li><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><font color="Black">Store</font></p></a></li>
            <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><font color="Black">Setting</font></p></a></li>
            <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><font color="Black">Logout</font></p></a></li>
          </ul>
    </aside>
  </div>
    <div class="col-sm-10">
    <div class="masthead">
      <h2>
        <b><a href="index.php"><font color ="White"><u><i><font size="5">ERP</font></i></u></a></b>
          <a data-toggle="modal" href="#colins" class="pull-right"><b><font color ="White "><font size="3"><i class="fa fa-bicycle"></i> Admin</b></a>
       </h2>
            <h3>
               <marquee>

              <h2><span "background-color:blue;"><p><font color="#FBB710">@@@ WELLCOME TO ENTERPRISE RESOURCES PLANNING SYSTEM ........!!!!!!</font></p></span></h2>
              </marquee>
            </h3>

        </h3>
    </div>



        <form class="form-horizontal" action="add_companyGroup.php" method="post" name="form">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-12 bg-info">
                      <div class="alert alert-success" >
                          <i class="icon-calendar icon-large" ></i>


                          <?php
                          date_default_timezone_set("Asia/Dhaka");
                          echo  date("l, F d, Y") . "<br>";

                          ?>
                          <h2><p><center> Company Group Information  </center></p></h2>
                      </div>
                      <div class= form-info>
                          <label class="col12 control-label"></label>

                            <button type="button" data-toggle="modal" data-target="#addCompanyGroup" class="p-4 mb-1 btn btn-primary text-white btn-sm"></i><font size="2"> <font color="000066"><i class="far fa-comments"></i>  ADD GROUP</button>


                          <a class="p-3 mb-1 btn btn-primary text-white btn-md" href="home_company.php"><font size="2"> <i class="fas fa-undo-alt"></i>  Back</a>

                              <br><br>

                          <div class="col-sm-12">

                              <h2><?php echo "Company : ". $company_name ?></h2>
                          </div>
                      </div>


                          <div class="table-responsive">
                              <form method="post" action="" >

                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <!-- <h3><b>Ordinance</b></h3> -->
                            <thead>
                            <tr class="info">
                              <th><p align="center"><font color="black">SN </p></th>
                              <th><p align="center"><font color="black">Group ID</p></th>
                              <th><p align="center"><font color="black">Name</p></th>
                              <th><p align="center"><font color="black">Address</p></th>
                              <th><p align="center"><font color="black">Contact</p></th>
                              <th><p align="center"><font color="black">Details</p></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            global $sn;
                            $sn = 0;
                            $query  = "SELECT * from compaygroup where id = '".$id."'";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                              $s_id = $row["s_id"];
                              $sn++;

                              $g_id = $row["g_id"];
                              $g_name = $row["g_name"];
                              $address = $row["address"];
                              $contact= $row["contact"];
                              $detail = $row["detail"];




                                ?>
                                <tr>
                                    <td align="center"><a href="view_groups.php?s_id=<?php echo $s_id ?>" title="Update"><?php echo $sn?></td>
                                    <td align="center"><a href="view_groups.php?s_id=<?php echo $s_id ?>" title="Update"><?php echo $g_id?></td>
                                    <td align="center"><a href="view_groups.php?s_id=<?php echo $s_id ?>" title="Update"><?php echo $g_name?></td>
                                    <td align="center"><a href="view_groups.php?s_id=<?php echo $s_id ?>" title="Update"><?php echo $address?></td>
                                    <td align="center"><a href="view_groups.php?s_id=<?php echo $s_id ?>" title="Update"><?php echo $contact?></td>
                                    <td align="center"><a href="view_groups.php?s_id=<?php echo $s_id ?>" title="Update"><?php echo $detail?></td>



                                </tr>
                            <?php } ?>
                            </tbody>

                            <tr class="info">
                              <th><p align="center"><font color="black">SN </p></th>
                              <th><p align="center"><font color="black">Group ID</p></th>
                              <th><p align="center"><font color="black">Name</p></th>
                              <th><p align="center"><font color="black">Address</p></th>
                              <th><p align="center"><font color="black">Contact Number</p></th>
                              <th><p align="center"><font color="black">Details</p></th>
                            </tr>
                        </table>
                      </form>
                  </div>



          </fieldset>
        </form>
  </div>
        <!-- this modal is for ADDING an Company Group -->
        <div class="modal fade" id="addCompanyGroup" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:20px 60px;">
                        <h1 align="center"><font color="Blue">Add Company Group</font></h1>
                    </div>
                    <div class="modal-body" style="padding:40px 50px;">

                        <form class="form-horizontal" action="#" name="form" method="post">
                          <div class="form-group">
                           <label class="col-sm-4 control-label" for="g_id"><font color="Black">Group ID :</font></label>
                              <div class="col-sm-8">
                                  <input type="text" name="g_id" class="form-control"  value="<?php echo  $sn?>">
                                  <input type="hidden" name="type" value="1"></span>





                              </div>
                          </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label"><font color="black">Company :</label>
                                <div class="col-sm-8">
                                  <select  class="form-control btn-lg" id="company" style=" height:45px;" name="company" onchange="myFunction(this.value)">
                                    <option value=''>------- Select --------</option>
                                    <?php
                                    $query1  = "SELECT id, name from company where id='".$id."'";
                                    $q1 = $conn->query($query1);
                                    while($row1 = $q1->fetch_assoc())
                                    {
                                    ?>
                                      <option class="form-control" value = "<?php echo $row1["id"] ?>"><?php echo $row1["name"] ?></option>
                                      <?php  }?>
                                  </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label">Group Name :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="g_name" class="form-control btn-lg" placeholder="Enter New Group Name" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Address :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="address" class="form-control btn-lg" placeholder="Enter  Group Address" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Contact Number :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="contact" class="form-control btn-lg" placeholder="01*********" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Details :</label>
                                <div class="col-sm-8">
                                    <input type="text" name="detail" class="form-control btn-lg" placeholder="Enter Company Details" required="required">
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-4 control-label"></label>
                                <div class="col-sm-8">
                                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit">
                                    <input type="reset" name="" class="btn btn-danger btn-lg" value="Clear Fields">
                                    <button type="button" class="close-btn btn-info btn-lg" data-dismiss="modal" title="Close">&times;</button>
                                </div>
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
</br>


</body>
</html>
