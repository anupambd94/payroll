<?php
include("db.php"); //include auth.php file on all secure pages
include("auth.php");
include("add_deductionJoborder.php");


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
       <!-- Logo Close-->
       <ul>
         <li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><font color="Black">Home</font></p></a></li>
         <li><i class="far fa-comments"></i><a href="index_another.php"><p><font size="2"><font color="Black">Transaction Report </font></p></a></li>
         <li><i class="fas fa-comment-dollar"></i><a href="home_cash.php"><p><font size="2"><font color="Black">Credited Cash</font></p></a></li>
         <li><i class="fab fa-phoenix-framework"></i><a href="home_bkash.php"><p><font size="2"><font color ="Black">Credited Bkash </font></p></a></li>
         <li><i class="fas fa-american-sign-language-interpreting"> </i> <a href="dailyTransactions.php"><p><font size="2"><font color="Black">Debited Cash/Bkash </font></p></a></li>
         <li><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><font color="Black">Company</font></p></a></li>
         <li><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><font color="Black">Company Bill</font></p></a></li>
         <li><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><font color="Black">Employee</font></p></a></li>
         <li><i class="fas fa-shopping-cart"></i><a href="home_salaryRegular.php"><p><font size="2"> <font color="Black">Pay Regular Employee</font></p></a></li>
         <li><i class="fas fa-shopping-cart"></i><a href="home_salaryCasual.php"><p><font size="2"><font color="Black">Pay Casual Employee</font></p></a></li>
         <li class="active"><i class="fas fa-shopping-cart"></i><a href="home_salaryJobOrder.php"><p><font size="2"><font color="Black">Pay Job Order Employee</font></p></a></li>
         <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><font color="Black">Payment Report</font></p></a></li>
         <li><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><font color="Black">Store</font></p></a></li>
         <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><font color="Black">Setting</font></p></a></li>
         <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><font color="Black">Logout</font></p></a></li>
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






<?php
global $id;
$id=$_REQUEST['emp_id'];
$query2  = "SELECT * from employee where emp_id = '$id' ";
$q2 = $conn->query($query2);
while($row2 = $q2->fetch_assoc())
{

include("calculations/regularCalculation.php");

 ?>

					  <!--marquee-->
        <marquee>  <h1 class="page-subhead-line"><font size="4"><span class="different-text-color"><font color="white">WELCOME TO--ERP / job-Order Employe Information </strong> @ <font color="Blue"> Today is :
         <i class="icon-calendar icon-large" ></i>


         <?php
         date_default_timezone_set("Asia/Dhaka");
         echo  date(" l, F d, Y") . "<br>";

         ?></font>
          </span></p></h1> </marquee>

 <div class="row">
     <div class="col-md-12">
         <h1 class="page-head-line"><font size="5">  <font color ="black"> <u> Salary of: <?php echo ' '.$row2['fname']." ". $row2['lname'] ?></u></font></font></h1>




    <style type="text/css">
    .different-text-color { color: green; }
 </style>



     </div>
 </div>

 <form class="form-horizontal" action="update_regularAccount.php" method="post" name="form">


             <div class="container-fluid">
                 <div class="row">
                     <div class="col-6 bg-info">
                         <input type="hidden" name="new" value="1" />
                         <input name="id" type="hidden" value="<?php echo $id;?>" />
                         </br>


                         <div class="form-group">
                             <label class="col-sm-3 control-label">Salary  :</label>
                             <div class="col-sm-4">
                                 <input type="text" name="salary" class="form-control" value="<?php echo $salary;?>" required="required" readonly>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-3 control-label">Advance  :</label>
                             <div class="col-sm-4">
                                 <input type="readonly" name="advance" class="form-control" value="<?php echo $advanceSalary;?>" required="required" readonly>
                             </div>
                             <div class="col-sm-5">
                                 <span style="color:blue"><?php echo $message1?>  </span><br>
                                 <span style="color:red"><?php echo $message2?>  </span>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-3 control-label">Bonus  :</label>
                             <div class="col-sm-4">
                                 <input type="text" name="bonus" class="form-control" value="<?php echo $row3['bonus'];?>" required="required" readonly>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-3 control-label">Deduction Amount:</label>
                             <div class="col-sm-4">
                                 <input type="text" name="totalDeduction" class="form-control" value="<?php echo $d_amount;?>" required="required" readonly>
                             </div>
                         </div>


                         <br><br>

                         <div class="form-group">

                             <label class="col-sm-3 control-label">Net Pay  :</label>
                             <div class="col-sm-4">
                                 <?php echo $netpay;?>.00
                             </div>
                             <div class="col-sm-5">
                                 <span style="color:red"><?php echo $message3;?><span><br>
                                   <span style="color:#809fff"><?php echo $message4;?><span>
                             </div>
                         </div>
                         <div class="form-group">

                             <label class="col-sm-3 control-label">Total Paid  :</label>
                             <div class="col-sm-4">
                                 <?php echo $salaryPaid;?>
                             </div>
                             <div class="col-sm-5">
                                 <?php echo "Paid in Cash: ".$paid_in_cash;?><br>
                                 <?php echo "Paid in Bkash: ".$paid_in_bkash;?>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-5 control-label"></label>
                             <div class="col-sm-3">
                                 <?php include("php/regularSubmitButton.php"); ?>
                                 <a href="home_salaryJobOrder.php" class="btn btn-danger">Cancel</a>
                             </div>
                             <div class="col-sm-12">
                                 <span style="color:red"><?php echo $submitMessage;?><span>
                             </div>
                         </div>


                     </div>
                     <br><br>

                <!--     <div class="clo-6>
                         <form class="form-horizontal" action="#" name="form" method="post">
                         <input name="emp_id" type="hidden" value="<?php echo $id;?>" />
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Date :</label>
                             <div class="col-sm-5">
                                 <input class="form-control" id="datepicker" name="d_date" value="<?php echo $thisDate;?>" type="text" />
                                 <script>
                                     $('#datepicker').datepicker({
                                         uiLibrary: 'bootstrap4'
                                     });
                                 </script>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Cause :</label>
                             <div class="col-sm-5">
                                 <input type="text" name="d_cause" class="form-control" placeholder="Enter Deduction Cause" required="required">
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Amount :</label>
                             <div class="col-sm-5">
                                 <input type="number" name="d_amount" class="form-control" placeholder="Enter Amount" required="required">
                             </div>


                             </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Payment method :</label>
                             <div class="col-sm-4">
                                 <input type="radio" name="pay_method"  value="cash" required="required">Cash &nbsp;&nbsp;
                                 <input type="radio" name="pay_method" value="bkash" required="required">Bkash


                             </div>
                         </div>
                             <div class="form-group">
                             <label class="col-sm-4 control-label">Remark :</label>
                             <div class="col-sm-5">
                                 <input type="text" name="remark" class="form-control" placeholder="Enter Remark">
                             </div>
                            </div>



                         <div class="form-group">
                             <label class="col-sm-4 control-label"></label>
                             <div class="col-sm-8">
                                 <input type="submit" name="submitd" class="btn btn-success" value="Submit">
                                 <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                             </div>
                         </div>
                     </form>

                   </div> -->

                     <div class="row">
                         <div class="col-md-12">
                             <h1 class="page-subhead-line"><font color="#ffeaea">Desuction List</font></strong>


                         </div>
                     </div>

                     <div class="well bs-component">
                       <form class="form-horizontal">
                         <fieldset>

                           <div class="table-responsive">
                             <form method="post" action="" >
                         <button type="button" data-toggle="modal" data-target="#addDeduction"  class="btn btn-info"><font color="Black"><i class="fas fa-university"></i> Add Deduction</button>
                         </br></br>
                         <table class="table table-bordered table-hover table-condensed" id="myTable">

                             <!-- <h3><b>Ordinance</b></h3> -->
                             <thead>
                             <tr class="info">
                                 <th><p align="center">Date</p></th>
                                 <th><p align="center">Cause</p></th>
                                 <th><p align="center">Amount</p></th>
                                 <th><p align="center">Method</p></th>
                                 <th><p align="center">Remark</p></th>
                                 <th><p align="center">Action</p></th>
                             </tr>
                             </thead>
                             <tbody>
                             <?php
                             $id=$_REQUEST['emp_id'];

                             $query5  = "SELECT * from deductions where emp_id = '$id'";
                             $q5 = $conn->query($query5);
                             while($row5 = $q5->fetch_assoc()) {
                               date_default_timezone_set("Asia/Dhaka");
                                 $thisMonth =  date("m-Y");
                                 $dMonth = date('m-Y', strtotime($row5['d_date']));
                                 if($thisMonth == $dMonth){

                                 $d_date = $row5['d_date'];
                                 $d_Cause = $row5['d_cause'];
                                 $d_amount = $row5['d_amount'];
                                  $d_method = $row5['d_method'];
                                  $remark = $row5['remark'];



                                 ?>
                                <tr>
                                     <td align="center"><?php echo $d_date?></td>
                                     <td align="center"><?php echo $d_Cause?></td>
                                     <td align="center"><big><b><?php echo $d_amount?></b></big>.00</td>
                                      <td align="center"><big><b><?php echo $d_method?></b></big></td>
                                       <td align="center"><big><b><?php echo $remark?></b></big></td>
                                     <td align="center">

                                         <a class="btn btn-primary" href="edit_regularDeduction.php?deduction_id=<?php echo $row5["deduction_id"]; ?>"><i class="fas fa-user-edit"></i> Edit</a>

                                     </td>
                                 </tr>
                             <?php }} ?>

                             </tbody>

                             <tr class="info">
                                 <th><p align="center">Date</p></th>
                                 <th><p align="center">Cause</p></th>
                                 <th><p align="center">Amount</p></th>
                                  <th><p align="center">Method</p></th>
                                  <th><p align="center">Remark</p></th>
                                 <th><p align="center">Action</p></th>

                             </tr>
                         </table>
                       </div>

         </div>
     </fieldset>
   </form>
   </div>

           </form>
           <?php
       }
       ?>

     <!-- this modal is for ADDING Salary -->
     <div class="modal fade" id="addDeduction" role="dialog">
         <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
                 <div class="modal-header" style="padding:20px 50px;">
                     <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                     <h3 align="center"><b>Add Deduction for an Employee</b></h3>
                 </div>
                 <div class="modal-body" style="padding:40px 50px;">

                     <form class="form-horizontal" action="add_deductionJoborder.php" name="form" method="post">
                         <div class="form-group">
                             <?php
                             $id=$_REQUEST['emp_id'];

                             ?>

                             <label class="col-sm-4 control-label">ID :</label>
                             <div class="col-sm-8">
                                 <input type="text" name="emp_id" class="form-control"  value="<?php echo $id; ?>">
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Date :</label>
                             <div class="col-sm-8">
                                 <input class="form-control" id="datepicker" name="d_date" value="<?php echo $thisDate;?>" type="text" />
                                 <script>
                                     $('#datepicker').datepicker({
                                         uiLibrary: 'bootstrap4'
                                     });
                                 </script>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Cause :</label>
                             <div class="col-sm-8">
                                 <input type="text" name="d_cause" class="form-control" placeholder="Enter Deduction Cause" required="required">
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Amount :</label>
                             <div class="col-sm-8">
                                 <input type="text" name="d_amount" class="form-control" placeholder="Enter Amount" required="required">
                             </div>


                             </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Payment method :</label>
                             <div class="col-sm-4">
                                 <input type="radio" name="pay_method"  value="cash" required="required">Cash &nbsp;&nbsp;
                                 <input type="radio" name="pay_method" value="bkash" required="required">Bkash


                             </div>
                         </div>
                             <div class="form-group">
                             <label class="col-sm-4 control-label">Remark :</label>
                             <div class="col-sm-8">
                                 <input type="text" name="remark" class="form-control" placeholder="Enter Remark">
                             </div>
                            </div>



                         <div class="form-group">
                             <label class="col-sm-4 control-label"></label>
                             <div class="col-sm-8">
                                 <input type="submit" name="submit" class="btn btn-success" value="Submit">
                                 <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                             </div>
                         </div>
                     </form>

                 </div>
             </div>
         </div>
     </div>

     <?php

     include ("footer.php");

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
</br>
