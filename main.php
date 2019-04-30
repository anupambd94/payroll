

<div class="row">
    <div class="col-md-12">
    <body style="background-image: url(img/login4.jpg)">


    </div>
  </div>

<div class="col-md-10">

       <div class="panel-body" style=" height: 1100px; width: 950px; border: 1px ; margin-top:50px;margin-right:800px; border:solid 3px #white;">
         <!--background-image: url(img/car.jpg); height: 1100px; width: 950px; border: 1px solid black; margin-top:50px;margin-right:800px; border:solid 3px #white;-->
            <div class="" role="alert">
                <div class="panel-heading">

                    <!--<span class="pull-left clickable"><i class="glyphicon glyphicon-minus"></i></span>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>-->

                </div>
                <div align="left">
                <h3 class="page-subhead-line"><font color="white">
                    <u>Cash Transactions Report</u></h3>
                  </div>
                <div class="panel-body">
                  <div class="main-box ">

                    <div class="row">

                          <div class="col-sm-5 ">
                            <?php
                            global $deduction, $total_cost;
                            $deduction = 0;
                            $total_cash = 0;
                            $query  = "SELECT amount from cash";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                              $total_cash = $total_cash + $row["amount"];
                            }

                             ?>
                            <a class="btn btn-large btn-block btn-danger " align="center" href="home_cash.php" style={pading:2px;}><strong> <font size="4">@ Cash(Cr)  : </strong> <?php echo $total_cash; ?> tk </a>

                          </div>
                          <div class="span3">


                          <div class="col-sm-5 ">
                            <?php
                            $total_cost = 0;
                            $total_salary = 0;
                            $query  = "SELECT amount from transaction where delete_status='0' and method='cash'";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                              $total_cost = $total_cost + $row["amount"];

                            }
                            $query  = "SELECT paid_in_cash from payment where delete_status='0'";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                              $total_cost = $total_cost + $row["paid_in_cash"];
                              $total_salary = $total_salary + $row["paid_in_cash"];
                            }
                            $query  = "SELECT d_amount from deductions where d_method='cash'";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                              $total_cost = $total_cost + $row["d_amount"];
                              $deduction = $deduction + $row["d_amount"];

                            }
                             ?>
                            <a class="btn btn-large btn-block btn-danger w-600" align="center" href="dailyTransactions.php"><strong><font size="4">@ Cash(Dr) : </strong><?php echo $total_cost?> tk</a>
                             <br>
                        </div>
                          <div class="col-sm-5 ">
                            <?php
                             ?>
                            <a class="btn btn-large btn-block btn-info " align="center" href="home_payment.php"><strong><font size="4">@ Monthly salary(Dr) : </strong><?php echo $total_salary."+".$deduction; ?> tk</a>

                            <div>
                                                                              <p><font size="2"><font color="red">Monthly salary & Deduction</font></p>
                            </div>
                            <br>
                          </div>
                          <div class="col-sm-5">
                            <a class="btn btn-large btn-block btn-info w-600" align="center" href="#"><strong><font size="4">@ Balance : </strong> <?php echo $total_cash - $total_cost; ?> tk</a>

                          </div>


                    </div>

                    </div>
                </div>
            </div>
        </div>





<div class="col-md-12">
              <div class="" role="alert">
                <div class="panel-heading">

                  <!--  <span class="pull-left clickable"><i class="glyphicon glyphicon-minus"></i></span>
                    <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>-->
                </div>

                <div class="panel-body">

                  <div class="main-box ">


                    <div class="row">
                      <div align="left">
                      <h3 class="page-subhead-line">
                            <left><font color="white"><u> Bkash Transactions Report</font></u></left></h3>
                          </div>
                      <div class="col-sm-12 ">
                        <div class="row">
                          <div class="col-sm-5  ">

                            <?php
                            $deduction = 0;
                            $total_cash = 0;
                            $query  = "SELECT amount from bkash";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                              $total_cash = $total_cash + $row["amount"];
                            }

                             ?>
                            <a class="btn btn-sm btn-block btn-danger w-600 " align="center" href="home_bkash.php"><strong><font size="4">@ Bkash (Cr) : </strong> <?php echo $total_cash; ?> tk</a>

                          </div>

                          <div class="col-sm-5 ">
                            <?php
                            $total_cost = 0;
                            $total_salary = 0;
                            $query  = "SELECT amount from transaction where delete_status='0' and method='bkash'";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                              $total_cost = $total_cost + $row["amount"];

                            }
                            $query  = "SELECT paid_in_bkash from payment where delete_status='0'";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                              $total_cost = $total_cost + $row["paid_in_bkash"];
                              $total_salary = $total_salary + $row["paid_in_bkash"];
                            }
                            $query  = "SELECT d_amount from deductions where d_method='bkash'";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                              $total_cost = $total_cost + $row["d_amount"];
                              $deduction = $deduction + $row["d_amount"];

                            }
                            ?>
                           <a class="btn btn-large btn-block btn-danger w-600" align="center" href="dailyTransactions.php"><strong><font size="4">@ Bkash (Dr) : </strong><?php echo $total_cost?> tk</a>
                                <br>
                           </div>
                           <div class="col-sm-5 ">
                           <?php
                            ?>
                           <a class="btn btn-large btn-block btn-info " align="center" href="home_payment.php"><strong><font size="4">@ Salary (Dr) : </strong><?php echo $total_salary."+".$deduction; ?> tk</a>

                           <div>
                                                                             <p><font size="2"><font color="red">Monthly salary & Deduction</font></p>
                           </div>
                           <br>
                           </div>
                           <div class="col-sm-5">
                           <a class="btn btn-large btn-block btn-info w-600" align="center" href="#"><strong><font size="4">@ Balance : </strong> <?php echo $total_cash - $total_cost; ?> tk</a>

                           </div>

                        </div>
                      </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row">
          <div class="col-md-12">
              <h3 class="page-subhead-line"><strong><p align="left"><u><font color="black">Monthly Report </font></u></p></strong></h3>
          </div>

          <div class="col-10">
            <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                            <font color="blue">Total Salary Paid</h2>

                                <!--  <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>-->
                            </div>
                            <div class="panel-body">
                              <div class="main-box bg-info">
                              <h3>
                              <?php
                              global  $thisMonth, $thisYear;
                              date_default_timezone_set("Asia/Dhaka");
                              $thisMonth =  date("m");
                              $thisYear =  date("Y");
                              $total_paid = 0;
                              $deduction = 0;
                              $query  = "SELECT * from payment where MONTH(pay_date) = '".$thisMonth."' and YEAR(pay_date) = '".$thisYear."' ";
                              $q = $conn->query($query);
                              while($row = $q->fetch_assoc())
                              {

                                $total_paid = $total_paid + $row["pay_amount"];
                              }
                              $query  = "SELECT d_amount from deductions";
                                    $q = $conn->query($query);
                                    while($row = $q->fetch_assoc())
                                    {
                                      $total_cost = $total_cost + $row["d_amount"];
                                      $deduction = $deduction + $row["d_amount"];

                                    }
                              echo $total_paid+$deduction;
                               ?>
                                tk paid
                              </h3>
                              </div>
                              </div>

                        </div>
                    </div>


                    <div class="col-md-4">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h2 class="panel-title">
                                      <font color="blue">Total Received Bill</h2>

                                        <!--<span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>-->
                                    </div>
                                    <div class="panel-body">
                                      <div class="main-box bg-info">
                                      <h3>
                                      <?php

                                      $total_received = 0;
                                      $query  = "SELECT * from companybill where MONTH(receive_date) = '".$thisMonth."' and YEAR(receive_date) = '".$thisYear."' ";
                                      $q = $conn->query($query);
                                      while($row = $q->fetch_assoc())
                                      {
                                        $total_received = $total_received + $row["receive_amount"];
                                      }
                                      echo $total_received;
                                       ?>
                                        tk received
                                      </font>
                                      </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    Total Income</h3>

                                                  <!--<span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>-->
                                            </div>
                                            <div class="panel-body">
                                              <div class="main-box bg-info">
                                              <h3>
                                              <?php

                                              echo $total_received - $total_paid;
                                               ?>
                                                tk
                                              </font>
                                              </h3>
                                              </div>
                                            </div>
                                        </div>
                                    </div>








<div class="row">
  <div class="col-md-12">
      <h3 class="page-subhead-line"><strong><p align="left"><font color="black"><u>Yearly other Report</u></font></p></strong></h3>
  </div>

  <div class="col-10">
    <div class="col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2 class="panel-title">
                        <font color="blue">Total Salary Paid</h2>
                        <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
                    </div>
                  <font color="blue">
                    <div class="panel-body">
                      <div class="main-box ">
                      <h3>
                      <?php
                      $total_paid = 0;
                      $deduction = 0;
                      $query  = "SELECT * from payment";
                      $q = $conn->query($query);
                      while($row = $q->fetch_assoc())
                      {
                        $total_paid = $total_paid + $row["pay_amount"];
                      }
                      $query  = "SELECT d_amount from deductions";
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                              $total_cost = $total_cost + $row["d_amount"];
                              $deduction = $deduction + $row["d_amount"];

                            }
                      echo $total_paid+$deduction;
                       ?>
                        tk paid
                      </h3>
                      </div>
                      </div>

                </div>
            </div>


            <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h2 class="panel-title">
                                  <font color="blue">Total Received Bill</h2>
                                <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
                            </div>
                            <div class="panel-body">
                              <div class="main-box ">
                              <h3>
                              <?php
                              $total_received = 0;
                              $query  = "SELECT * from companybill";
                              $q = $conn->query($query);
                              while($row = $q->fetch_assoc())
                              {
                                $total_received = $total_received + $row["receive_amount"];
                              }
                              echo $total_received;
                               ?>
                                tk received
                              </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <font color="blue">Total Income</h3>
                                        <span class="pull-right clickable"><i class="glyphicon glyphicon-minus"></i></span>
                                    </div>
                                    <div class="panel-body">
                                      <div class="main-box ">
                                      <h3>
                                      <?php

                                      echo $total_received - $total_paid;
                                       ?>
                                        tk
                                      </h3>
                                      </div>
                                    </div>
                                </div>



  </div>


</div>
<script>
$(document).on('click', '.panel-heading span.clickable', function (e) {
  var $this = $(this);
  if (!$this.hasClass('panel-collapsed')) {
      $this.parents('.panel').find('.panel-body').slideUp();
      $this.addClass('panel-collapsed');
      $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
  } else {
      $this.parents('.panel').find('.panel-body').slideDown();
      $this.removeClass('panel-collapsed');
      $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
  }
});
$(document).on('click', '.panel div.clickable', function (e) {
  var $this = $(this);
  if (!$this.hasClass('panel-collapsed')) {
      $this.parents('.panel').find('.panel-body').slideUp();
      $this.addClass('panel-collapsed');
      $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
  } else {
      $this.parents('.panel').find('.panel-body').slideDown();
      $this.removeClass('panel-collapsed');
      $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
  }
});
$(document).ready(function () {
  $('.panel-heading span.clickable').click();
  $('.panel div.clickable').click();
});
</script>


  </body>
