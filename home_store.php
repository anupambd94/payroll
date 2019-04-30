<?php
include("auth.php");
include("db.php");
include("add_product.php");

global $p_id,$sn;
$setAutoSN = $conn->query("SET @autosn :=0");
$updateSN = $conn->query("UPDATE product SET sn = @autosn := (@autosn+1)");
$reset = $conn->query("ALTER TABLE product AUTO_INCREMENT = '1'");

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
    <div class="row">
  <div class="col-sm-2">
    <aside class="main_sidebar">
      <!-- Logo -->
      <div class="logo">
          <a href="https://www.bubt.edu.bd/"> <center><img src="img/core-img/BUBT-Logo.png" alt=""><h2><font color="Black">@ERP@</h2></center></a>
          <!-- Logo Close-->
          <ul>
            <!--<li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><b><font color="Black">Home<b></font></p></a></li>
            <li><i class="far fa-comments"></i><a href="index_another.php"><p><font size="2"><b><font color="Black">Transaction Report <b></font></p></a></li>
            <li><i class="fas fa-comment-dollar"></i><a href="home_cash.php"><p><font size="2"><b><font color="Black">Credited Cash<b></font></p></a></li>
            <li><i class="fab fa-phoenix-framework"></i><a href="home_bkash.php"><p><font size="2"><b><font color ="Black">Credited Bkash<b></font></p></a></li>
            <li><i class="fas fa-american-sign-language-interpreting"> </i> <a href="dailyTransactions.php"><p><font size="2"><b><font color="Black">Debited Cash/Bkash <b></font></p></a></li>
            <li><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><b><font color ="Black">Company<b></font></p></a></li>
            <li><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><b><font color ="Black">Company Bill<b></font></p></a></li>
            <li ><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><b><font color ="Black">Employee<b></font></p></a></li>
            <li><i class="fas fa-people-carry"></i><a href="home_salaryRegular.php"><p><font size="2"><b><font color ="Black"> Payment<b></font></p></a></li>
            <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><b><font color ="Black"> Payment Report<b></font></p></a></li>-->
            <li  class="active"><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><b><font color ="Black">Store<b></font></p></a></li>
            <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><b><font color ="Black">Setting<b></font></p></a></li>
            <li><i class="fab fa-phoenix-framework"></i><a href="help.php"><p><font size="2"><b><font color ="Black">Help?<b></font></p></a></li>
            <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><b><font color ="Black">Logout</font><b></font></p></a></li>
          </ul>
    </aside>
  </div>


  <div class="col-sm-10">
    <!--marquee-->
<marquee>  <h1 class="page-subhead-line"><font size="4"><span class="different-text-color"><font color="white">@@@ WELCOME TO--ERP / STORE  </strong> @ <font color="yellow"> Today is :
<i class="icon-calendar icon-large" ></i>
<?php
date_default_timezone_set("Asia/Dhaka");
echo  date(" l, F d, Y") . "<br>";

?>
</font>
</span></p></h1> </marquee>

    <nav class="navbar navbar-default">
          <div class="container-fluid">
              <div class="navbar-header">
                  <a class="navbar-brand" href="index.php">@@@ ERP.....</a>
              </div>
              <ul class="nav navbar-nav">
              <li><a href="" >Home</a></li>
          <li><a href="">Employee</a></li>
          <li ><a href="">Company</a></li>
          <li ><a href="">Payment</a></li>
          <li ><a href="">Payment Report</a></li>
          <li class="active" ><a href="">store</a></li>


              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li><a data-toggle="modal" href="#colins"><i class="fa fa-bicycle"></i> Admin</a></li>
                </ul>
                </div>
                </nav>




  <div class="row">
      <div class="col-md-12">
          <h1 class="page-head-line"><font color="black">My Store </h1>
          <?php
          date_default_timezone_set("Asia/Dhaka");
          echo  date(" l, F d, Y") . "<br>";

          ?>
        </br></font>
       <style type="text/css">
            .different-text-color { color: green; }
            </style>


        </div>
    </div>

              <div class="well bs-component">
                <form class="form-horizontal">
                  <fieldset>

                    <button type="button" data-toggle="modal" data-target="#addProduct" class="btn btn-info"><i class="fas fa-store"></i> Add New Product</button>
                    <br><br>
                    <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                              <th><p align="center"><font color="red">SN</font></p></th>
                              <th><p align="center"><font color="red">Code/P_Type</font></p></th>
                              <th><p align="center"><font color="red">Name</font></p></th>
                              <th><p align="center"><font color="red">Description</font></p></th>
                              <th><p align="center"><font color="red">Company</font></p></th>
                              <th><p align="center"><font color="red">Quantity</font></p></th>
                                <th><p align="center"><font color="red">Price</font></p></th>
                                <th><p align="center"><font color="red">Stock</font></p></th>
                               <th><p align="center"><font color="red">Action</font></p></th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php

                            global $p_id,$sn;

                            $query = "select * from product  ORDER BY p_id asc ";
                             $q = $conn->query($query);
                              while($row = $q->fetch_assoc())
                              {



                                $sn     =$row['sn'];
                                $p_id     =$row['p_id'];
                                $type   =$row['p_type'];
                                $p_name  =$row['p_name'];
                                $company =$row['p_company'];
                                $p_description =$row['p_description'];
                                $quantity  =$row['p_quantity'];
                                $price  =$row['price'];
                                $stock = $row['stock'];

                            ?>



                            <tr  >
                              <td align="center"><a href="view_product.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><font color="Black"><?php echo $sn?></a></td>
                              <td align="center"><a href="view_product.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><font color="Black">(<?php echo $p_id?>) <?php echo $type?></a></td>
                              <td align="center"><a href="view_product.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><font color="Black"> <?php echo $p_name ?></a></td>
                              <td align="center"><a href="view_product.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><font color="Black"><?php echo $p_description?></a></td>
                              <td align="center"><a href="view_product.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><font color="Black"><?php echo $company ?></a></td>
                              <td align="center"><a href="view_product.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><font color="Black"><?php echo $quantity?></a></td>
                              <td align="center"><a href="view_product.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><font color="Black"><?php echo $price ?></a></td>
                              <td align="center"><a href="manage_product_quantity.php?p_id=<?php echo $row["p_id"]; ?>" title="Update"><font color="Black"><?php echo $stock ?></a></td>

                                 <td>
                                   <a class="btn btn-warning" href="manage_product_quantity.php?p_id=<?php echo $row["p_id"]; ?>"><em class="fas fa-edit"></em></a>

                                 <a class="btn btn-danger" href="delete_product.php?p_id=<?php echo $row["p_id"]; ?>">Delete</a>

                                </td>



                            </tr>

                            <?php } ?>
                          </tbody>
                          <tr class="info">
                            <th><p align="center"><font color="red">SN</font></p></th>
                            <th><p align="center"><font color="red">Code /P_Type</font></p></th>
                            <th><p align="center"><font color="red">Name</font></p></th>
                            <th><p align="center"><font color="red">Description</font></p></th>
                            <th><p align="center"><font color="red">Company</font></p></th>
                            <th><p align="center"><font color="red">Quantity</font></p></th>
                              <th><p align="center"><font color="red">Price</font></p></th>
                              <th><p align="center"><font color="red">Stock</font></p></th>
                             <th><p align="center"><font color="red">Action</font></p></th>
                          </tr>


                        </table>
                      </form>
                    </div>
                  </fieldset>
                </form>
              </div>

          <!-- this modal is for ADDING an Product -->
          <div class="modal fade" id="addProduct" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                  <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>

                    <input type="hidden" name="p_id" value="<?php echo $p_id; ?>" class="form-control" >
                  <h3 align="center"><b>Add Product</b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                  <form class="form-horizontal" action="#" name="form" method="post">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Product Type :</label>
                      <div class="col-sm-8">


                        <select id="json-one" input type="text" name="type" class="form-control" placeholder="Enter product type" required="required">
                          <option selected value="base">Please Select</option>
			                    <option value="Color">Color</option>
			                    <option value="Accessories">Accessories</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Product Name :</label>
                      <div class="col-sm-8">
                        <select id="json-two" input type="text" name="pname" class="form-control" placeholder="Enter product type" required="required">
                          <option value="">Enter product name</option>


                        </select>
                      </div>
                    </div>

                    <!--<div class="form-group">
                        <label class="col-sm-4 control-label">Product Description :</label>
                        <div class="col-sm-8">
                          <select id="json-three" input type="text" name="p_description" class="form-control" placeholder="Enter product description">
                            <option value="">Enter product description</option>


                          </select>
                        </div>
                      </div>-->
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Product Description :</label>
                        <div class="col-sm-8">
                          <input type="text" name="p_description" class="form-control" placeholder="Enter product description" >
                        </div>
                      </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Company :</label>
                      <div class="col-sm-8">
                        <input type="text" name="company" class="form-control" placeholder="Enter company name" required="required">
                      </div>
                    </div>



                      <div class="form-group">
                          <label class="col-sm-4 control-label">Container Size :</label>
                          <div class="col-sm-8">
                              <input type="text" name="quantity" class="form-control" placeholder="Enter Container Size" required="required">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Price :</label>
                          <div class="col-sm-8">
                              <input type="number" name="price" class="form-control" placeholder="Enter product price" required="required">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-sm-4 control-label">Stock :</label>
                          <div class="col-sm-8">
                              <input type="text" name="stock" class="form-control" placeholder="Enter stock Quantity" required="required">
                          </div>
                      </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label"></label>
                      <div class="col-sm-8">
                        <input type="submit" name="submit" class="btn btn-success" value="Submit">
                        <input type="reset" name="" class="btn btn-info" value="Clear Fields">
                          <button type="button" class="close-btn btn-info btn-sm" data-dismiss="modal" title="Close">&times;</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>


</div>

<!-- this modal is for ADDING an Company -->
    <div class="modal fade" id="deleteProduct" role="dialog">
        <div class="modal-dialog">


            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                    <h3 align="center"><b>Delete Product</b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="delete_product.php" name="form" method="post">
                        <input type="hidden" name="p_id" class="form-control" value="<?php echo $p_id; ?>" required="required" readonly>

                     <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-4">
                                <button type="submit" name ="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
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




    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>


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

    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>
    <!--Delete notify-->
    <script type="text/javascript">
            $(document).ready( function() {
                $('.btn-danger').click( function() {
                    var id = $(this).attr("id");
                    if(confirm("Are you sure you want to delete this Data?")){
                        $.ajax({
                            type: "POST",
                            url: "delete_product.php",
                            data: ({id: id}),
                            cache: false,
                            success: function(html){
                            $(".del"+id).fadeOut('slow');
                            }
                        });
                    }else{
                        return false;}
                });
            });
        </script>
<!--Delete notify-->
    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
