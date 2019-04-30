<?php
include("db.php"); //include auth.php file on all secure pages
include("auth.php");
include("add_deductionRegular.php");


// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <script src="assets/jquery/paymentCalcualtion.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- Title  -->
    <title>Enterprise Resources planning System</title>

    <!-- header logo  -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <script>
        <!--
        var ScrollMsg= " "
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
<?php

include("head.php");
?>


  <body>
    <body style="background-image: url(img/login4.jpg)">

  <div class="container">
    <div class="wrapper">
    <aside class="main_sidebar">
      <!-- LogBlack-->
     <div class="logo">
         <a href="https://www.bubt.edu.bd/"> <center><img src="img/core-img/BUBT-Logo.png" alt=""><h2><font color="Black">@ERP@</h2></center></a>
         <!-- Logo Close-->
        <ul>
          <li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><b><font color="Black">Home<b></font></p></a></li>
          <li><i class="fas fa-home"></i><a href="index_another.php"><p><font size="2"><b><font color="Black">Transaction Report <b></font></p></a></li>
          <li><i class="fas fa-home"></i><a href="home_cash.php"><p><font size="2"><b><font color="Black">Cash Arrival<b></font></p></a></li>
          <li><i class="fas fa-home"></i><a href="dailyTransactions.php"><p><font size="2"><b><font color="Black">Cash/Bkash Transaction<b></font></p></a></li>
          <li><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><b><p><font size="4"><b><font color="Black">Company<b></font></p></a></li>
          <li><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><b><font color="Black">Regular Company Bill<b></font></p></a></li>
          <li><i class="fa fa-bell"></i><a href="home_billThirdparty.php"><p><font size="2"><b><font color="Black">Casual Company Bill<b></font></p></a></li>
          <li><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><b><font color="Black">Employee<b></font></p></a></li>
          <li><i class="fa fa-circle"></i><a href="home_salaryRegular.php"><p><font size="2"><b><font color="Black">Payment<b></font></p></a></li>
          <li class="active"><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><b><font color="Black">Payment Report<b></font></p></a></li>
          <li><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><b><font color="Black">Store<b></font></p></a></li>
          <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><b><font color="Black">Setting<b></font></p></a></li>
          <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><b><font color="Black">Logout<b></font></p></a></li>
        </ul>
    </aside>
    <div class="masthead">
        <h3>
            <b><a href="index.php">Enterprise Resources planning System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b>Admin</b></a>
        </h3>
    </div>

    <?php
    $emp_id = $_REQUEST['emp_id'];
    global $days;
    global $deduction;
    global $paid;
    global $due;
    $deduction = 0;
    $query2  = "SELECT * from employee where emp_id ='".$emp_id."' ";
    $q2 = $conn->query($query2);
    while($row2 = $q2->fetch_assoc())
    {

        $deduction = 0;
        $days    = 0;
        $paid = 0;
        $due = 0;

        $emp_id         = $row2['emp_id'];
        $lname           = $row2['lname'];
        $fname           = $row2['fname'];
        $type           = $row2['emp_type'];

        $query4  = "SELECT d_amount from deductions where emp_id ='".$emp_id."'";
        $q4 = $conn->query($query4);
        while($row4 = $q4->fetch_assoc()){
            $deduction = $deduction + $row4['d_amount'];
        }



        $query3  = "SELECT * from salary where emp_id ='".$emp_id."'";
        $q3 = $conn->query($query3);
        $row3 = $q3->fetch_assoc();
        $bonus           = $row3['bonus'];
        $salary_rate   = $row3['salary_rate'];
        $advance  = $row3['advance'];

        $query6  = "SELECT count(w_date) as days from works where emp_id='".$emp_id."'";
        $q6 = $conn->query($query6);
        $row6 = $q6->fetch_assoc();
        $days = $row6["days"];

        if($type == "Casual"){
            $salary = $salary_rate * $days;
        }
        else{
            $salary = $salary_rate;
        }

        $query7  = "SELECT * from payment where emp_id ='".$emp_id."'";
        $q7 = $conn->query($query7);
        while($row7 = $q7->fetch_assoc()){

            date_default_timezone_set("Asia/Dhaka");
            $thisMonth =  date("m");
            $payiedMonth = date('m', strtotime($row7['pay_date']));
            $due = $row7['due'];

            if($payiedMonth == $thisMonth){
                $paid = $paid + $row7['pay_amount'];

            }
            $due1 = $row7["due"];
            if($due1 > 0){
                $dueDate = date('m/d/Y', strtotime($row7['pay_date']));
            }

        }

        $advance = $advance + $paid;

        $income   = $due + $bonus + $salary;
        $netpay   = $income - ($advance + $deduction);


        ?>

        <form class="form-horizontal" action="add_payment.php" method="post" name="form">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 bg-success">
                        <input type="hidden" name="new" value="1" />
                        <input name="id" type="hidden" value="<?php echo $emp_id?>" />
                        </br>
                        <div class="alert alert-success" >
                            <i class="icon-calendar icon-large" ></i>


                            <?php
                            date_default_timezone_set("Asia/Dhaka");
                            echo  date("l, F d, Y") . "<br>";

                            ?>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label"></label>
                            <div class="col-sm-10">
                                <h2><?php echo $row2['lname']; ?>, <?php echo $row2['fname']; ?></h2>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">Net Pay  :</label>
                            <div class="col-sm-7">
                                <input type="text" name="salary" class="form-control" value="<?php echo $netpay;?>" required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">Pay Amount  :</label>
                            <div class="col-sm-7">
                                <input type="readonly" id="pay" name="pay" class="form-control" value="" placeholder="Enter Amount" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Due :</label>
                            <div class="col-sm-7">
                                <input type="text"  name="due" class="form-control" value="" required="required" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label">Payment method :</label>
                            <div class="col-sm-7">
                                <input type="radio" name="pay_method"  value=" cash ">Cash &nbsp;&nbsp;
                                <input type="radio" name="pay_method" value=" bkash ">Bkash
                                <input name="due_date" type="hidden" value="<?php echo $dueDate?>" />
                                <br><br>

                            </div>
                        </div>

                        <br><br>

                        <div class="form-group">
                            <label class="col-sm-5 control-label"></label>
                            <div class="col-sm-7">
                                <input type="submit" name="submit" value="Pay" class="btn btn-success">
                                <a href="home_payment.php" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 bg-info">
                        <label class="col-sm-5 control-label">Payment List :</label>
                        </br></br>
                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <!-- <h3><b>Ordinance</b></h3> -->
                            <thead>
                            <tr class="info">
                                <th><p align="center">Date</p></th>
                                <th><p align="center">amount</p></th>
                                <th><p align="center">method</p></th>
                                <th><p align="center">Due</p></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $id=$_REQUEST['emp_id'];

                            $query5  = "SELECT * from payment where emp_id = '$id'";
                            $q5 = $conn->query($query5);
                            while($row5 = $q5->fetch_assoc()) {


                                $pay_date = $row5['pay_date'];
                                $pay_dateFull =  date('D,', strtotime($row5['pay_date'])).
                                 date(' d-', strtotime($row5['pay_date'])).
                                    date(' F, ', strtotime($row5['pay_date'])).
                                 date(' Y', strtotime($row5['pay_date']));

                                $pay_method = $row5['pay_method'];
                                $pay_amount = $row5['pay_amount'];
                                $due = $row5['due'];



                                ?>
                                <tr>
                                    <td align="center"><?php echo $pay_dateFull?></td>
                                    <td align="center"><?php echo $pay_amount?>.00</td>
                                    <td align="center"><big><b><?php echo $pay_method?></b></big></td>
                                    <td align="center"><?php echo $due?>.00</td>

                                </tr>
                            <?php } ?>

                            </tbody>

                            <tr class="info">
                                <th><p align="center">Date</p></th>
                                <th><p align="center">Amount</p></th>
                                <th><p align="center">Method</p></th>
                                <th><p align="center">Due</p></th>
                            </tr>
                        </table>
                    </div>
                </div>
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

                    <form class="form-horizontal" action="#" name="form" method="post">
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
                                <input class="form-control" id="datepicker" name="d_date" type="text" />
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
</br>


</body>
</html>
