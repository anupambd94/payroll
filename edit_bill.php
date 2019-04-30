<?php
include("db.php"); //include auth.php file on all secure pages
include("add_deductionRegular.php");


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
$billsno = $_REQUEST['billsno'];
global $billsno;
global $totalBill;
global $company_name,$company_type;
global $company_group;
global $company_id;
global $bill_id;
global $paid;
global $reduced;
global $remark;
global $found;
$found = false;
$query  = "SELECT * from bill where billsno = '".$billsno."' ";
$q = $conn->query($query);
$row = $q->fetch_assoc();
$company_id = $row["company_id"];
$bill_id = $row["bill_id"];

$totalBill = 0;
$paid = 0;
$reduced = 0;

$query0  = "SELECT name,company_type from company where id = '".$company_id."'";
$q0 = $conn->query($query0);
$row0 = $q0->fetch_assoc();
$company_name = $row0["name"];
$company_type = $row0["company_type"];

$query1  = "SELECT * from companybill as cb, bill as b  where b.billsno = '".$billsno."' AND b.company_id = '".$company_id."' AND b.billsno = cb.billsno";

$q1 = $conn->query($query1);
while($row1 = $q1->fetch_assoc())
{
  $totalBill = $totalBill + $row1["bill_amount"];
  $bill_no = $row1["bill_no"];

  $paid = $paid + $row1["receive_amount"];
  $query2  = "SELECT name from company where id = '".$company_id."'";
  $q2 = $conn->query($query2);
  $row2 = $q2->fetch_assoc();
  $company_name = $row2["name"];

  $company_group_id = $row1["company_group_id"];
  $query3  = "SELECT g_name from compaygroup where g_id = '".$company_group_id."'";
  $q3 = $conn->query($query3);
  $row3 = $q3->fetch_assoc();
  $company_group = $row3["g_name"];

  $work_type = $row1["work_type"];
  $work_area = $row1["work_area"];
  $bill_date = $row1["bill_date"];
  $receive_date= $row1["receive_date"];
  $bill_amount = $row1["bill_amount"];
  $received_amount = $row1["receive_amount"];
  $remark = $row1["remark"];
  $pay_status = $row1["pay_status"];

  if($pay_status == "1"){
      $class = "paid";
      $status="Paid";
  }
  else if($pay_status == "2"){
      $class = "due";
      $status="Have Due";
  }
  else{
      $class = "notpaid";
      $status="Not Paid";
  }
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
         <li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><b><font color="white"><font color ="Black">Home</font><b></font></p></a></li>
         <li ><i class="far fa-comments"></i><a href="index_another.php"><p><font size="2"><b><font color="white"><font color ="Black">Transaction Report</font> <b></font></p></a></li>
         <li ><i class="fas fa-comment-dollar"></i><a href="home_cash.php"><p><font size="2"><b><font color="white"><font color ="Black">Credited Cash<b></font></p></a></li>
         <li ><i class="fab fa-phoenix-framework"></i><a href="home_bkash.php"><p><font size="2"><b><font color="white"><font color ="Black">Credited Bkash<b></font></p></a></li>
         <li><i class="fas fa-american-sign-language-interpreting"></i><a href="dailyTransactions.php"><p><font size="2"><b><font color="white"><font color ="Black">Debited Cash/Bkash <b></font></p></a></li>
         <li><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><b><font color="white"><font color ="Black">Company<b></font></p></a></li>
         <li  class="active"><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><b><font color="white"><font color ="Black">Company Bill<b></font></p></a></li>
         <li ><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><b><font color="white"><font color ="Black">Employee<b></font></p></a></li>
         <li><i class="fas fa-people-carry"></i><a href="home_salaryRegular.php"><p><font size="2"><b><font color="white"><font color ="Black">Payment<b></font></p></a></li>
         <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><b><font color="white"><font color ="Black">Payment Report<b></font></p></a></li>
         <li><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><b><font color="white"><font color ="Black">Store<b></font></p></a></li>
         <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><b><font color="white"><font color ="Black">Setting<b></font></p></a></li>
         <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><b><font color="white"><font color ="Black">Logout</font><b></font></p></a></li>
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
                <li><a href="home_company.php">Company</a></li>
                <li class="active"><a href="home_bill.php">Company Bill</a></li>
                <li><a href="home_payment.php">Payment Report</a></li>
                <li><a href="home_store.php">store</a></li>


                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a data-toggle="modal" href="#colins"><i class="fa fa-bicycle"></i> Admin</a></li>
                  </ul>
                  </div>
                  </nav>




                                        <style type="text/css">
                                       .different-text-color { color: green; }
                                        </style>
                                        <marquee><h1 class="page-subhead-line"> <p style="font-size:x-large;"><span class="different-text-color">Welcome to ERP<strong> Today is:
                                        <i class="icon-calendar icon-large" ></i>


                                        <?php
                                        date_default_timezone_set("Asia/Dhaka");
                                        echo  date(" l, F d, Y") . "<br>";

                                        ?>
                                       </span> </p> </h1></marquee>

              <div class="row">
                  <div class="col-md-12">
                      <h2 class="page-head-line"><?php echo "Company : ". $company_name."/". $bill_id ?></h2>

                                          <font color="black">  <?php
                                            date_default_timezone_set("Asia/Dhaka");
                                            echo  date(" l, F d, Y") . "<br>";

                                            ?>
                                    </div>
                                    </div>
                                     <br>

        <form class="form-horizontal" action="add_bill.php" method="post" name="form">



            <div class="well bs-component">
                <fieldset>

                  <div class="table-responsive">
                    <a href="home_bill.php" class="btn btn-primary"><i class="fas fa-undo-alt"></i></a>

                    <button type="button" data-toggle="modal" data-target="#addBill" class="btn btn-info"><i class="fa fa-bell"></i> Add Bill</button>

                        <a class="btn btn-primary" href="PrintBill/invoice.php?billsno=<?php echo $billsno ?>" type= "button" name="print" title="Print Bill"><em class="fas fa-print"></em></a>

                        <br><br>

                              <a><center><p><font size="2"><font color="red">***If you want to creadited ammount  please click any data in the table***   </font></p> </font></center></a>
                        <table class="table table-bordered table-hover table-condensed table-sm" id="myTable">

                            <!-- <h3><b>Ordinance</b></h3> -->
                            <thead>
                            <tr class="info">

                                <th><p align="center">Bill Date</p></th>
                                <th><p align="center">Invoice No</p></th>
                                <th><p align="center">Area</p></th>
                                <th><p align="center">Work Type</p></th>
                                <th><p align="center">Group</p></th>
                                <th><p align="center">Sft/Qty</p></th>
                                <th><p align="center">Rate</p></th>
                                <th><p align="center">Bill Amount</p></th>
                                <th><p align="center">Received Date</p></th>
                                <th><p align="center">Received Amount</p></th>
                                 <th><p align="center">Reduced</p></th>
                                <th><p align="center">Remark</p></th>
                                 <th><p align="center">Status</p></th>
                                 <th><p align="center">Action</p></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            global $sn;

                            global $s_id;
                            global $due;
                            global $remark;
                            $sn = 0;
                            $query  = "SELECT * from companybill as cb, bill as b  where b.billsno = '".$billsno."' AND b.company_id = '".$company_id."' AND b.billsno = cb.billsno";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                              $s_id = $row["s_id"];
                              $sn++;

                              $bill_no = $row["bill_no"];

                              $query1  = "SELECT * from company where id = '".$company_id."'";
                              $q1 = $conn->query($query1);
                              $row1 = $q1->fetch_assoc();
                              $company_name = $row1["name"];

                              $company_group_id = $row["company_group_id"];
                              $query2  = "SELECT g_name from compaygroup where g_id = '".$company_group_id."' AND id = '".$company_id."'";
                              $q2 = $conn->query($query2);
                              $row2 = $q2->fetch_assoc();

                              $bill_date = $row["bill_date"];
                              $bill_no = $row["bill_no"];
                              $work_area = $row["work_area"];
                               $work_type = $row["work_type"];
                              $company_group = $row2["g_name"];
                              $bill_date = $row["bill_date"];
                              $receive_date= $row["receive_date"];
                              $bill_amount = $row["bill_amount"];
                              $received_amount = $row["receive_amount"];

                              $query3  = "SELECT * from billreceived where billsno = '".$billsno."'";
                              $q3 = $conn->query($query3);
                              $row3 = $q3->fetch_assoc();

                              $reduced = $bill_amount-$received_amount;


                              $remark = $row["remark"];
                              $pay_status = $row["pay_status"];
                              $qty = $row["square_fit"];
                              $rate = $row["rate"];

                              if($pay_status == "1"){
                                  $class = "paid";
                                  $status="Paid";
                              }
                              else if($pay_status == "2"){
                                  $class = "due";
                                  $status="Have Due";
                              }
                              else{
                                  $class = "notpaid";
                                  $status="Not Paid";
                              }

                                 if($pay_status=="1"){
                                    $due_header = "Reduecd";
                                    }
                                else{
                                     $due_header = "Due";
                                    }

                                ?>
                                <tr>
                                     <td align="center"><a href="view_bill.php?bill_no=<?php echo $s_id ?>" title="Update"><?php echo $bill_date?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $s_id ?>" title="Update"><?php echo $bill_no?></td>
                                     <td align="center"><a href="view_bill.php?bill_no=<?php echo $s_id ?>" title="Update"><?php echo $work_area?></td>
                                      <td align="center"><a href="view_bill.php?bill_no=<?php echo $s_id ?>" title="Update"><?php echo $work_type?></td>
                                      <td align="center"><a href="view_bill.php?bill_no=<?php echo $s_id ?>" title="Update"><?php echo $company_group?></td>
                                      <td align="center"><a href="view_bill.php?bill_no=<?php echo $s_id ?>" title="Update"><?php echo $qty?></td>
                                      <td align="center"><a href="view_bill.php?bill_no=<?php echo $s_id ?>" title="Update"><?php echo $rate?></td>
                                      <td align="center"><a href="view_bill.php?bill_no=<?php echo $s_id ?>" title="Update"><?php echo $bill_amount?></td>
                                      <td align="center"><a href="view_bill.php?bill_no=<?php echo $s_id ?>" title="Update"><?php echo $receive_date ?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $s_id ?>" title="Update"><?php echo $received_amount ?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $s_id ?>" title="Update"><?php echo $reduced ?></td>
                                    <td align="center"><a href="view_bill.php?bill_no=<?php echo $s_id ?>" title="Update"><?php echo $remark  ?></td>
                                    <td align="center" class="<?php  echo $class ?>"><?php echo $status ?></td>


                                </tr>
                            <?php } ?>
                            </tbody>

                            <tr class="info">
                                <th><p align="center">Bill Date</p></th>
                                <th><p align="center">Invoice No</p></th>
                                <th><p align="center">Area</p></th>
                                <th><p align="center">Work Type</p></th>
                                <th><p align="center">Group</p></th>
                                <th><p align="center">Sft/Qty</p></th>
                                <th><p align="center">Rate</p></th>
                                <th><p align="center">Bill Amount</p></th>
                                <th><p align="center">Received Date</p></th>
                                <th><p align="center">Received Amount</p></th>
                                 <th><p align="center">Reduced</p></th>
                                <th><p align="center">Remark</p></th>
                                 <th><p align="center">Status</p></th>
                                 <th><p align="center">Action</p></th>
                            </tr>
                          </table>
                      </form>
                    </div>
                  </fieldset>

              </div>


    <!-- this modal is for ADDING Company Bill -->
    <div class="modal fade" id="addBill" role="dialog">
           <div class="modal-dialog">

               <!-- Modal content-->
               <div class="modal-content">
                   <div class="modal-header" style="padding:30px 60px;">

                        <h2 align="center"><b><font color="blue"><u><i>ADD BILL OF A COMAPNY<i><u> </font></b></center></h2>


                       <button type="button" class="close-btn btn-info " data-dismiss="modal" title="Close">&times;</button>



                   </div>
                   <div class="modal-body" style="padding:40px 50px;">

                       <form class="form-horizontal" action="add_bill.php" name="form" method="post">

                           <div class="form-group">
                               <label class="col-sm-4 control-label"><font color="Black">Date :</label>
                               <div class="col-sm-8">
                                   <input class="form-control" id="datepicker"

                                   value="<?php echo $thisDate;?>" name="given_date" type="text" />

                                  <script>
                                       $('#datepicker').datepicker({
                                           uiLibrary: 'bootstrap4'
                                       });


                                   </script>

                               </div>
                           </div>
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Invoice No :</label>
                             <input type="hidden" name="billsno" class="form-control" value = "<?php echo $billsno?>">
                             <div class="col-sm-8">
                                 <input type="text" name="bill_no" class="form-control" value="<?php echo uniqid(); ?>">
                             </div>
                         </div>
                         <div class="form-group">
                               <label class="col-sm-4 control-label">Area :</label>
                               <div class="col-sm-8">
                                   <input type="text" name="area" class="form-control" placeholder="Enter Working Area" required="required">
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="col-sm-4 control-label">Work Type :</label>
                               <div class="col-sm-8">
                                   <input type="text" name="work_type" class="form-control" placeholder="Enter Type of work" required="required">
                               </div>
                           </div>
                              <div class="form-group">
                               <label class="col-sm-4 control-label">Company :</label>
                               <div class="col-sm-8">
                                 <select  class="form-control" id="company" style=" height:45px;" name="company" onchange="myFunction(this.value)">
                                   <option value=''>------- Select --------</option>
                                   <?php
                                   $query1  = "SELECT id, name from company where id = '".$company_id."'";
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
                               <label class="col-sm-4 control-label">Group :</label>
                               <div class="col-sm-8">
                                   <select  name = "group" class="form-control" id="group" style=" height:45px;">

                                       <option  class="form-control"></option>

                                   </select>

                               </div>
                           </div>
                           <div class="form-group">
                               <label class="col-sm-4 control-label">Sft/Qty :</label>
                               <div class="col-sm-8">
                                   <input type="text" name="qty" class="form-control" placeholder="Enter square_fit" id="qty" required="required">
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="col-sm-4 control-label">Rate :</label>
                               <div class="col-sm-8">
                                   <input type="text" name="rate" class="form-control" placeholder="Enter Rate" required="required" id="rate">
                               </div>
                           </div>

                           <div class="form-group">
                               <label class="col-sm-4 control-label">Amount :</label>
                               <div class="col-sm-8">
                                   <input type="text" name="bill_amount" class="form-control" placeholder="Enter Amount" required="required" id ="amount">
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="col-sm-4 control-label">Remark :</label>
                               <div class="col-sm-8">
                                   <input type="text" name="remark" class="form-control" placeholder="Enter Working Remark" required="required">
                               </div>
                           </div>
                        <div class="form-group">
                               <label class="col-sm-4 control-label"></label>
                               <div class="col-sm-8">
                                   <input type="submit" name="submit" class="btn btn-success" value="Submit">
                                   <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                               <button type="button" class="close-btn btn-info " data-dismiss="modal" title="Close">&times;</button>
                               </div>
                           </div>
                       </form>

                   </div>

               </div>
           </div>
       </div>
  </div>
<br><br>
  <?php
include("footer.php")
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
<script src="assets/jquery/newbillcalculation.js"></script>
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
