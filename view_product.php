<?php
  include("db.php"); //include auth.php file on all secure pages



$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
  {
  }
?>




      <?php
        $id=$_REQUEST['p_id'];

      $query  = "SELECT * from product where p_id='".$id."'";
      $q = $conn->query($query);
      while($row = $q->fetch_assoc())
        {

          ?>

          <?php

          include ("head.php");

          ?>
          <!-- Title  -->

          <title>Enterprise Resources planning System</title>
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
          <script>
          		$(function() {

          			$("#text-one").change(function() {
          				$("#text-two").load("textdata/" + $(this).val() + ".txt");

          			});

          			$("#json-one").change(function() {

          				var $dropdown = $(this);

          				$.getJSON("jsondata/data.json", function(data) {

          					var key = $dropdown.val();
          					var vals = [];

          					switch(key) {
          						case 'Color':
          							vals = data.Color.split(",");
          							break;
          						case 'Accessories':
          							vals = data.Accessories.split(",");
          							break;
          						case 'base':
          							vals = ['Please choose from above'];
          					}

          					var $jsontwo = $("#json-two");
          					$jsontwo.empty();
          					$.each(vals, function(index, value) {
          						$jsontwo.append("<option>" + value + "</option>");


          					});
                  //  var $jsonthree = $("#json-three");
                  //  $jsonthree.empty();
                //    $.each(vals, function(index, value) {
                  //    $jsonthree.append("<option>" + value + "</option>");


                    //});



          				});
          			});

          		});
          	</script>

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
                   <li ><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><b><font color="Black">Company<b></font></p></a></li>
                   <li ><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><b><font color="Black">Company Bill<b></font></p></a></li>
                   <li><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><b><font color="Black">Employee<b></font></p></a></li>
                   <li><i class="fa fa-circle"></i><a href="home_salaryRegular.php"><p><font size="2"><b> <font color="Black">Regular Employee<b></font></p></a></li>
                   <li><i class="fa fa-circle"></i><a href="home_salaryCasual.php"><p><font size="2"><b><font color="Black">Casual Employee<b></font></p></a></li>
                   <li><i class="fa fa-circle"></i><a href="home_salaryJobOrder.php"><p><font size="2"><b><font color="Black">Job Order Employee<b></font></p></a></li>
                   <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><b><font color="Black">Payment Report<b></font></p></a></li>
                   <li class="active" ><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><b><font color="Black">Store<b></font></p></a></li>
                   <li ><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><b><font color="Black">Setting<b></font></p></a></li>
                   <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><b><font color="Black">Logout<b></font></p></a></li>
                 </ul>
            </aside>
          </div>
          <div class="col-sm-10">

                  <div id="page-wrapper">
                      <div id="page-inner">

                        <marquee>  <h1 class="page-subhead-line"><p style="font-size:x-large;"><span class="different-text-color"><font color="White">WELCOME TO-ERP @ Today is:
                         <i class="icon-calendar icon-large" ></i>


                         <?php
                         date_default_timezone_set("Asia/Dhaka");
                         echo  date(" l, F d, Y") . "<br>";

                         ?>
                          </span></p></h1> </marquee>


          <div class="row">
              <div class="col-md-12">
                  <h1 class="page-head-line"><p><font color="white">Product: <?php echo $row['p_name']; ?></p></h1>


              </div>
          </div>

              <form class="form-horizontal" action="update_product.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="p_id" type="hidden" value="<?php echo $row['p_id'];?>" />

                <div class="form-group">

                  <div class="form-group">
                    <label class="col-sm-5 control-label">Product Type :</label>
                    <div class="col-sm-4">
                      <select id="json-one" name="type" class="form-control" required>
                      <option value="<?php echo $row['p_type'];?>"><?php echo $row['p_type'];?></option>
                      <option value="Color">Color</option>
                      <option value="Accessories">Accessories</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label">Product Name :</label>
                    <div class="col-sm-4">
                      <select id="json-two" name="pname" class="form-control" required>
                      <option value="<?php echo $row['p_name'];?>"><?php echo $row['p_name'];?></option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Product Description :</label>
                    <div class="col-sm-4">
                      <input type="text" name="p_description" class="form-control" value="<?php echo $row['p_description'];?>" required="required">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label">Company  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="company" class="form-control" value="<?php echo $row['p_company'];?>" required="required">
                    </div>
                  </div>





                  <div class="form-group">
                      <label class="col-sm-5 control-label">Qunatity :</label>
                      <div class="col-sm-4">
                          <input type="text" name="quantity" class="form-control" value="<?php echo $row['p_quantity'];?>" required="required">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-5 control-label">Price  :</label>
                      <div class="col-sm-4">
                          <input type="text" name="price" class="form-control" value="<?php echo $row['price'];?>" required="required">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Update" class="btn btn-warning">
                      <a href="home_store.php" class="btn btn-danger">Cancel</a>
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

    </div>


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
