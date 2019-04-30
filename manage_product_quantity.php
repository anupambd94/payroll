<?php
  include("db.php"); //include auth.php file on all secure pages



$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
  {
  }
?>




      <?php
      global $id;
        $id=$_REQUEST['p_id'];

      $query  = "SELECT * from product where p_id='".$id."'";
      $q = $conn->query($query);
      while($row = $q->fetch_assoc())
        {

          $quantity = $row["stock"];

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
                   <li><i class="fa fa-circle"></i><a href="home_salaryRegular.php"><p><font size="2"><b> <font color="Black">Regular Employee<b></font></p></a></li>
                   <li><i class="fa fa-circle"></i><a href="home_salaryCasual.php"><p><font size="2"><b><font color="Black">Casual Employee<b></font></p></a></li>
                   <li><i class="fa fa-circle"></i><a href="home_salaryJobOrder.php"><p><font size="2"><b><font color="Black">Job Order Employee<b></font></p></a></li>
                   <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><b><font color="Black">Payment Report<b></font></p></a></li>
                   <li class="active"><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><b><font color="Black">Store<b></font></p></a></li>
                   <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><b><font color="Black">Setting<b></font></p></a></li>
                   <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><b><font color="Black">Logout<b></font></p></a></li>
                 </ul>
            </aside>
          </div>
          <div class="col-sm-10">

                  <div id="page-wrapper">
                      <div id="page-inner">


          <div class="row">
              <div class="col-md-12">

                  <style type="text/css">
        .different-text-color { color: green; }
        </style>

       <marquee>  <h1 class="page-subhead-line"><p style="font-size:x-large;"><font color="#9c51b6">WELCOME TO--PRODUCT / Today is:
        <i class="icon-calendar icon-large" ></i></font>


        <?php
        date_default_timezone_set("Asia/Dhaka");
        echo  date(" l, F d, Y") . "<br>";

        ?>
         </span></p></h1> </marquee>

              </div>
          </div>

         <h1 class="page-head-line"><p><font color ="Black">Product: <?php echo $row['p_name']; ?> / <?php echo $row['p_description']; ?></p></h1>
<br></br>
              <form class="form-horizontal" action="update_quantity.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="p_id" type="hidden" value="<?php echo $row['p_id'];?>" />

                <div class="form-group"><font size="3">
                            <label class="col-sm-5 control-label">Date :</label>
                            <div class="col-sm-4">

                                <input class="form-control" id="datepicker" name="date" value="<?php echo $thisDate;?>" type="text" />
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label">Product Name  :</label>
                  <div class="col-sm-4">
                    <input type="text" name="p_name" class="form-control" value="<?php echo $row['p_name'];?>" required="required" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label">Product Description  :</label>
                  <div class="col-sm-4">
                    <input type="text" name="p_description" class="form-control" value="<?php echo $row['p_description'];?>" required="required" readonly>
                  </div>
                </div>



                  <div class="form-group">
                      <label class="col-sm-5 control-label">Qunatity :</label>
                      <div class="col-sm-4">
                          <input type="number" id="stock_quantity" name="quantity" class="form-control" value="<?php echo $quantity;?>" required="required" readonly >
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Select Operation:</label>
                      <div class="col-sm-4">
                          <input type="radio" id="Operation" name="stock_operation"  value="add" required="required">Add &nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="radio" id="Operation" name="stock_operation" value="sub" required="required">Substract


                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Value :</label>
                      <div class="col-sm-4">
                          <input type="number" id="operation_value" name="operation_value" class="form-control" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Result :</label>
                      <div class="col-sm-4">
                          <input type="number" id="result" name="output" class="form-control" readonly>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Remark :</label>
                      <div class="col-sm-4">
                          <input type="text"  name="remark" class="form-control" >
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Done" class="btn btn-success">
                      <a href="home_store.php" class="btn btn-danger"><em class="fas fa-window-close"></em></a>
                    </div>
                  </div>


              </form>
            <?php
          }
        ?>

        <div class="well bs-component">
                <fieldset>

                  <div class="table-responsive">
                      <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">History List</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                      <a href="home_store.php" class="btn btn-sm btn-primary btn-create">Back to sotre</a>
                  </div>
                </div>
              </div>


                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <!-- <h3><b>Ordinance</b></h3> -->
                            <thead>
                            <tr class="info">
                                <th><p align="center">SN</p></th>
                                <th><p align="center">Date</p></th>
                                <th><p align="center">Previous Quantity</p></th>
                                <th><p align="center">Operation</p></th>
                                <th><p align="center">Operation Value</p></th>
                                <th><p align="center">Result</p></th>
                                <th><p align="center">Remark</p></th>
                                <th><p align="center">Action</p></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            global $sn,$sno;
                            $sn = 0;
                            $query  = "SELECT * from product_operation_history where pid = '".$id."'";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {

                              $sn++;
                              $sno = $row["sno"];
                              $date = $row["date"];
                              $quantity = $row["quantity"];
                              $operation = $row["operation"];
                              $result = $row["result"];
                              $remark = $row["remark"];
                              $value= $row["value"];
                              $edited = $row["edit_status"];

                              if($edited=='1'){
                                  $class = "text-warning";

                              }
                              else{
                                  $class = "text-secondary";
                              }


                                ?>
                                <tr>
                                    <td align="center" class="<?php  echo $class ?>"><?php echo $sn; ?></td>
                                     <td align="center" class="<?php  echo $class ?>"><?php echo $date; ?></td>
                                     <td align="center" class="<?php  echo $class ?>"><?php echo $quantity; ?></td>
                                     <td align="center" class="<?php  echo $class ?>"><?php echo $operation; ?></td>
                                     <td align="center" class="<?php  echo $class ?>"><?php echo $value; ?></td>
                                    <td align="center" class="<?php  echo $class ?>"><?php echo $result ?></td>
                                     <td align="center" class="<?php  echo $class ?>"><?php echo $remark; ?></td>
                                     <td align="center">
                                          <a class="btn btn-warning btn-sm" href="view_product_history.php?sno=<?php echo $sno; ?>"><em class="fas fa-edit"></em></a>
                                      </td>


                                </tr>
                            <?php } ?>
                            </tbody>

                            <tr class="info">
                                <th><p align="center">SN</p></th>
                                <th><p align="center">Date</p></th>
                                <th><p align="center">Previous Quantity</p></th>
                                <th><p align="center">Operation</p></th>
                                <th><p align="center">Operation Value</p></th>
                                <th><p align="center">Result</p></th>
                                <th><p align="center">Remark</p></th>
                                <th><p align="center">Action</p></th>

                            </tr>
                        </table>
                      </form>
                    </div>
                  </div>
                  </fieldset>

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
  </font>


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
    <script src="assets/jquery/stockOperation.js" type="text/javascript"></script>
