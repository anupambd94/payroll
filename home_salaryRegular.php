<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("db.php");
include("add_salary.php");

?>

<?php
global $emp_id, $emp_type, $salary_rate, $bonus;
function payAll(){

  $query2  = "SELECT * from employee where emp_type = 'Regular'";

$q2 = $conn->query($query2);
while($row2 = $q2->fetch_assoc())
  {
    $emp_id         = $row2['emp_id'];
   $lname           = $row2['lname'];
   $fname           = $row2['fname'];
   $emp_type = $row2['emp_type'];
   $salary_rate = $row2['salary'];
   $bonus        = $row2['bonus'];

   date_default_timezone_set("Asia/Dhaka");
   $thisMonth = date("m");
   $thisYear = date("Y");
   $paid = False;

    $query21  = "SELECT pay_status from payment where emp_id = '$emp_id' and MONTH(pay_date) = '$thisMonth' and YEAR(pay_date) = '$thisYear' ";
    $q21 = $conn->query($query21);
    while($row21 = $q21->fetch_assoc())
      {
        if($row21['pay_status']=='1'){
          $paid = True;
        }

      }
      if(!$paid){
        pay();
      }else{
        ?>
        <script>
            alert('You have already paid in this month.');
            window.location.href='home_salaryRegular.php';
        </script>

        <?php
      }


  }



  function pay(){
    // Start

    include("calculations/regularCalculation.php");



    $query4  = "SELECT emp_type from employee where emp_id = $id";
    $q4 = $conn->query($query4);
    while($row4 = $q4->fetch_assoc()){
    if($row4['emp_type'] == "Casual" ){
    $casual = true;
    }
    }


    $id = $emp_id;
    $advanceSalary     = $advanceSalary;
    $pay_amount        = $salaryPaid;
    $due_status = $newDue_status;
    $advance_status = $newAdvance_status;

    $location = "home_salaryRegular.php";

    date_default_timezone_set("Asia/Dhaka");
    $pay_date = date("Y-m-d");
    $pay_status = "1";
    $thisMonth = date("m");
    $thisYear = date("Y");
    if($ADpay_id !=0){
    $updatePreviousPayments= $conn->query("UPDATE payment SET due_status = '0',due = '0',advance_status = '0',advance = '0' WHERE pay_id='".$ADpay_id."'");
    $updateBo= $conn->query("UPDATE employee SET bonus = '0' WHERE emp_id='".$id."'");

    }
    $addPayment = $conn->query("INSERT into payment(emp_id, pay_date,pay_amount, paid_in_cash, paid_in_bkash, due, due_status,advance, advance_status,pay_remark, pay_status)VALUES('$id','$pay_date','$pay_amount','$paid_in_cash','$paid_in_bkash','$netpay','$due_status','$advanceSalary','$advance_status','$remark','$pay_status')", MYSQLI_USE_RESULT);




    if ($sql && $addPayment)
    {
    ?>
    <script>
        alert('Account successfully updated.');
        window.location.href='<?php echo $location;?>';
    </script>

    <?php
    $deleteDeductions= $conn->query("DELETE FROM deductions WHERE emp_id='".$id."'");


    if($casual){
      $deleteWorkingDays= $conn->query("DELETE FROM works WHERE emp_id='".$id."'");
    }

    }
    else
    {
    echo "Invalid";


    }

    //end
  }


}


?>

<html>
<!-- Title  -->
<title>Enterprise Resources planning System</title>

<!-- header logo  -->
<link rel="icon" href="img/core-img/favicon.ico">
  <body>
    <body style="background-image: url(img/login4.jpg)">

    <div class="container">
      <?php

      include ("head.php");

      ?>

      <body>

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
            <li><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><b><font color="Black">Company<b></font></p></a></li>
            <li><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><b><font color="Black">Company Bill<b></font></p></a></li>
            <li><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><b><font color="Black">Employee<b></font></p></a></li>
            <li class="active"><i class="fas fa-shopping-cart"></i> <a href="home_salaryRegular.php"><p><font size="2"><b> <font color="Black">Pay Regular Employee<b></font></p></a></li>
            <li><i class="fas fa-shopping-cart"></i><a href="home_salaryCasual.php"><p><font size="2"><b><font color="Black">Pay Casual Employee<b></font></p></a></li>
            <li><i class="fas fa-shopping-cart"></i></i><a href="home_salaryJobOrder.php"><p><font size="2"><b><font color="Black">Pay Job Order Employee<b></font></p></a></li>
            <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><b><font color="Black">Payment Report<b></font></p></a></li>
            <li><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><b><font color="Black">Store<b></font></p></a></li>
            <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><b><font color="Black">Setting<b></font></p></a></li>
            <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><b><font color="Black">Logout<b></font></p></a></li>
          </ul>





      </aside>
    </div>
    <div class="col-sm-10">
      <div class="masthead">
          <nav class="navbar navbar-default">
              <div class="container-fluid">
                  <div class="navbar-header">
                      <a class="navbar-brand" href="index.php"><font color="black">ERP</font></a>
                  </div>
                  <ul class="nav navbar-nav">
                      <li><a href="index.php"><font color="black">Home</font></a></li>
                      <li class="active"><a href="home_salaryRegular.php"><font color="black">Regular Employee</font></a></li>
                      <li><a href="home_salaryCasual.php"><font color="black">Casual Employee</font></a></li>
                      <li><a href="home_salaryJobOrder.php"><font color="black">Job Order Employee</font></a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li><a data-toggle="modal" href="#colins"> <font color="black"> <i class="fa fa-bicycle"></i> Admin</font></a></li
                    </ul>
              </div>
          </nav>
      </div>
      <!--marquee Start-->
                            <h1>
                            <marquee>
                            <h2><span "background-color:red;"><p><font color="solid blue"><font size="5">@@@ WELLCOME TO ENTERPRISE RESOURCES PLANNING SYSTEM ........!!!!!!</font></font></p></span></h2>
                            </marquee>
                            </h1>
        <!--marquee Close-->

        <br>
          <div class="well bs-component">

            <form class="form-horizontal" action="add_salary.php" method="post" name="form">

                <div class="alert alert-warning" role="alert">
                    <i class="icon-calendar icon-md" ></i>

                    <?php
                    date_default_timezone_set("Asia/Dhaka");
                    echo  date("l, F d, Y") . "<br>";

                    ?>
                    <h2><center><p>Regular Employee Accounts <p><center><h2>
                </div>
              <fieldset>

                  <?php
                  global $idFound,$submitMessage;
                  $idFound = false;
                  date_default_timezone_set("Asia/Dhaka");
                  $currentMonth = date('m');
                  $currentYear = date('Y');
                  $query4  = "SELECT pay_status from payment where MONTH(pay_date) = '".$currentMonth."' AND YEAR(pay_date)  = '".$currentYear."'";
                  $q4 = $conn->query($query4);
                  while($row4 = $q4->fetch_assoc()){

                  $emp_id        = $row4['pay_status'];
                  if($emp_id=="0"){
                    $idFound = true;
                  }
                  }
                  if(!$idFound){
                  $day =  date("d");
                  if($day!="28"){
                    $submitMessage = "Note: You can submit salary calculations only once in a month.";
                    ?>
                  <input type="hidden" name="netpay"  value="<?php echo $netpay;?>">
                  <input type="hidden" name="new_advance"  value="<?php echo $advanceSalary;?>">
                  <input type="hidden" name="total_paid"  value="<?php echo $salaryPaid;?>">
                  <input type="hidden" name="paid_in_cash"  value="<?php echo $paid_in_cash;?>">
                  <input type="hidden" name="paid_in_bkash"  value="<?php echo $paid_in_bkash;?>">
                  <input type="hidden" name="due_status"  value="<?php echo $newDue_status;?>">
                  <input type="hidden" name="advance_status"  value="<?php echo $newAdvance_status;?>">
                  <input type="hidden" name="remark"  value="<?php echo $remark;?>">
                  <input type="hidden" name="emp_type"  value="<?php echo $emp_type;?>">
                  <input type="hidden" name="ADpay_id"  value="<?php echo $ADpay_id;?>">


                  <button type="submit" name="submitAll" onclick="payAll()" class="btn btn-info"><i class="fa fa-bell"></i> Pay All Employee</button>

                  <?php
                  }
                  else{
                      $submitMessage = "Note: The submit button will come on the last days of the month.";
                  }
                  }
                  else{
                    $submitMessage = "Note: You have submitted already.Check payment list.";
                    ?>
                    <script>
                        alert('You have already submitted in this month.');
                    </script>

                    <?php
                  }
                  ?>
                  <button type="button" data-toggle="modal" data-target="#addSalary" class="btn btn-info"><i class="fa fa-bell"></i> Set Bonus</button>

                  <span style="color:#000000"><?php echo $submitMessage;?><span>


                  <!--
                <p class="pull-right">Overtime rate per hour: <big><b><?php  ?>.00</b></big></p><br>
                <p class="pull-right">Salary rate: <big><b><?php  ?>.00</b></big></p>
                -->
                <p align="center"><big><b>Account</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                       <thead>
                         <tr class="info">
                             <th><p align="center">ID</p></th>
                           <th><p align="center">Name</p></th>
                             <th><p align="center">Salary</p></th>
                              <th><p align="center">Deduction</p></th>
                             <th><p align="center">Due</p></th>
                           <th><p align="center">Advance</p></th>
                           <th><p align="center">Bonus</p></th>
                           <th><p align="center">NetPay</p></th>
                             <th><p align="center">Action</p></th>
                         </tr>
                       </thead>
                       <tbody>
                         <?php
                         global $d_amount,$emp_id,$fname,$lname,$salary_rate,$emp_type,$total;

                         $paidThisMoth = false;
                           $query2  = "SELECT * from employee where emp_type = 'regular'";
                         $q2 = $conn->query($query2);
                         while($row2 = $q2->fetch_assoc())
                           {
                             $emp_id         = $row2['emp_id'];
                            $lname           = $row2['lname'];
                            $fname           = $row2['fname'];
                            $emp_type = $row2['emp_type'];
                            $salary_rate = $row2['salary'];
                            $bonus        = $row2['bonus'];
                            $salary        = $row2['salary'];

                         include("calculations/regularCalculation.php");
                         ?>
                         <tr>
                          <td align="center"><?php echo $emp_id?></td>
                          <td align="center"><b> <?php echo $fname?> <?php echo $lname?></b></td>
                           <td align="center"><?php echo $salary?></td>
                           <td align="center"><big><b><?php echo $deduction?></b></big>.00</td>
                           <td align="center"><?php echo $due?></td>
                           <td align="center"><big><b><?php echo $advance?></b></big> .00</td>
                           <td align="center"><big><b><?php echo $bonus?></b></big>.00</td>
                           <td align="center"><big><b><?php echo $netpay?></b></big>.00</td>
                            <?php
                            date_default_timezone_set("Asia/Dhaka");
                            $currentMonth = date('m');
                            $currentYear = date('Y');
                            $query4  = "SELECT pay_status from payment where emp_id = '".$emp_id."' AND MONTH(pay_date) <> '".$currentMonth."' AND YEAR(pay_date) <> '".$currentYear."'";
                            $q4 = $conn->query($query4);
                            while($row4 = $q4->fetch_assoc()){
                            $pay_status = $row4['pay_status'];
                              if($pay_status == "1"){
                            $paidThisMoth = True;
                          }else{
                            $paidThisMoth = False;
                          }
                          }
                              if(!$paidThisMoth){
                             ?>
                             <td align="center">
                                 <a class="btn btn-warning" href="edit_regularAccount.php?emp_id=<?php echo $row2["emp_id"]; ?>"><i class="fas fa-money-bill-alt"></i> Pay</a>

                             </td>
                             <?php
                                    }
                               else{
                              ?>
                              <td align="center">
                                  <a class="btn btn-success"><i class="fas fa-check"></i> Paid</a>

                              </td>
                              <?php } ?>
                         </tr>
                         <?php } ?>
                       </tbody>

                         <tr class="info">
                           <th><p align="center">Id</p></th>
                           <th><p align="center">Name</p></th>
                           <th><p align="center">Salary</p></th>
                           <th><p align="center">Deduction</p></th>
                           <th><p align="center">Due</p></th>
                           <th><p align="center">Advance</p></th>
                           <th><p align="center">Bonus</p></th>
                           <th><p align="center">NetPay</p></th>
                           <th><p align="center">Action</p></th>
                         </tr>
                     </table>
                   </form>
                 </div>
               </fieldset>
             </form>
           </div>



      <!-- this modal is for OVERTIME -->
      <div class="modal fade" id="overtime" role="dialog">
        <div class="modal-dialog modal-sm">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter the amount of <big><b>Overtime</b></big> rate per hour.</h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="update_overtime.php" name="form" method="post">
                <div class="form-group">
                    <input type="text" name="rate" class="form-control" value="<?php echo $rate; ?>" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

        <!-- this modal is for ADDING Salary -->
        <div class="modal fade" id="addSalary" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                      <div class="modal-header" style="padding:20px 50px;">
                          <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                          <h3 align="center"><b> Bonus add for Employee</b></h3>
                      </div>
                      <div class="modal-body" style="padding:40px 50px;">

                          <form class="form-horizontal" action="#" name="form" method="post">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Name & Salary :</label>
                                <div class="col-sm-8">
                                  <select  class="form-control" id="emp_id" style=" height:45px;" name="emp_id" onchange="getSalary()">
                                    <option value=''>------- Select --------</option>
                                    <option value='all'>All Regular Employee</option>
                                    <?php
                                    $query1  = "SELECT emp_id, fname,lname,salary from employee where emp_type='Regular'";
                                    $q1 = $conn->query($query1);
                                    while($row1 = $q1->fetch_assoc())



                                    {

                                    ?>
                                      <option class="form-control" value = "<?php echo $row1["emp_id"] ?>" data-salary = "<?php echo $row1["salary"] ?>"><?php echo $row1["fname"] ." ".$row1["lname"]?> / <?php echo $row1["salary"] ?></option>

                                      <?php  }?>
                                  </select>
                                </div>
                            </div>

                                <div class="form-group" id="salaryDiv">
                                 <label class="col-sm-4 control-label" id="salaryLabel">Salary  :</label>
                                 <div class="col-sm-8">

                                     <input type="text" name="salary" class="form-control" id="salary" required="required" readonly>

                                 </div>
                             </div>
                             <div class="form-group" id="bonusCategoryDiv" style="display: none ">
                                 <label class="col-sm-4 control-label" id="bonusCategoryLabel" >Bonus Category :</label>
                                 <div class="col-sm-6">
                                     <input type="radio" name="bonus_category" id="bonus_category"  value="percent" >Percentgate &nbsp;&nbsp;
                                     <input type="radio" name="bonus_category" id="bonus_category" value="intValue" >Cask Value

                                     <br><br><br>
                                 </div>
                             </div>
                            <div class="form-group" id="percentageDiv">
                                <label class="col-sm-4 control-label">Percentage :</label>
                                <div class="col-sm-8">
                                  <select  class="form-control" id="percent" style=" height:45px;" name="percent" onchange="calculateBonus()">
                                    <option value=''>------- Select --------</option>
                                    <option value='0.05'>5%</option>
                                    <option value='0.1'>10%</option>
                                    <option value='0.15'>15%</option>
                                    <option value='0.2'>20%</option>
                                    <option value='0.25'>25%</option>
                                    <option value='0.3'>30%</option>
                                    <option value='0.35'>35%</option>
                                    <option value='0.4'>40%</option>
                                    <option value='0.45'>45%</option>
                                    <option value='0.5'>50%</option>
                                  </select>
                                </div>
                                <br><br><br>
                            </div>
                              <div class="form-group" id="bonusDiv">
                                  <label class="col-sm-4 control-label">Bonus</label>
                                  <div class="col-sm-8">
                                      <input type="number" name="salary_rate" id="salary_rate" class="form-control" placeholder="Enter Bonus Amount" required="required">
                                      <input type="hidden" name="salary_type" value = "1" class="form-control" placeholder="Enter Salary" required="required">

                                  </div>
                              </div>


                              <br><br><br>
                              <div class="form-group">
                                  <label class="col-sm-4 control-label"></label>
                                  <div class="col-sm-8">
                                      <input type="submit" name="submit" class="btn btn-success" value="Submit">
                                      <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                                  <button type="button" class="close-btn btn-info btn-md" data-dismiss="modal" title="Close">&times;</button>
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
             <h3 align="center">Enter the amount of <big><b>Bonus</b></big> rate.</h3>
           </div>
           <div class="modal-body" style="padding:40px 50px;">

             <form class="form-horizontal" action="update_salary.php" name="form" method="post">
                 <div class="form-group">
                     <input type="text" name="emp_id" class="form-control" value="<?php echo $emp_id; ?>" required="required">
                 </div>
               <div class="form-group">
                   <input type="text" name="salary_rate" class="form-control" value="<?php echo $bonus; ?>" required="required">
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
     <script src="calculations/bonusCalculations.js"></script>
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
