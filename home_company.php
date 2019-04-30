<?php
include("auth.php"); //include auth.php file on all secure pages

include("db.php");
include("add_company.php");

$setAutoId = $conn->query("SET @autoid :=0");
$updateId = $conn->query("UPDATE company SET id = @autoid := (@autoid+1)");
$reset = $conn->query("ALTER TABLE employee AUTO_INCREMENT = '1'");



?>
<?php

include ("head.php");

?>
<link rel="stylesheet" href="css/core-style.css">
<link rel="stylesheet" href="style.css">

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
       <a href="https://www.bubt.edu.bd/"> <center><img src="img/core-img/BUBT-Logo.png" alt=""><h2><font color="#FBB710"><font color ="Black">@ERP@</font></h2></center></a>
       <!-- Logo Close-->
       <ul>
         <li><i class="fas fa-home"></i><a href="index.php"><p><font size="2"><font color="Black">Home</font></p></a></li>
         <li><i class="far fa-comments"></i><a href="index_another.php"><p><font size="2"><font color="Black">Transaction Report </font></p></a></li>
         <li><i class="fas fa-comment-dollar"></i><a href="home_cash.php"><p><font size="2"><font color="Black">Credited Cash</font></p></a></li>
         <li><i class="fab fa-phoenix-framework"></i><a href="home_bkash.php"><p><font size="2"><font color ="Black">Credited Bkash</font></p></a></li>
         <li><i class="fas fa-american-sign-language-interpreting"> </i> <a href="dailyTransactions.php"><p><font size="2"><font color="Black">Debited Cash/Bkash </font></p></a></li>
         <li class="active"><i class="fa fa-battery-2"></i><a href="home_company.php"><p><font size="2"><font color="white"><font color ="Black">Company</font></p></a></li>
         <li><i class="fa fa-bell"></i><a href="home_bill.php"><p><font size="2"><font color="white"><font color ="Black">Company Bill</font></p></a></li>
         <li ><i class="fa fa-bicycle"></i><a href="home_employee.php"><p><font size="2"><font color="white"><font color ="Black">Employee</font></p></a></li>
         <li><i class="fas fa-people-carry"></i><a href="home_salaryRegular.php"><p><font size="2"><font color="white"><font color ="Black">Payment</font></p></a></li>
         <li><i class="fa fa-crosshairs"></i><a href="home_payment.php"><p><font size="2"><font color="white"><font color ="Black">Payment Report</font></p></a></li>
         <li><i class="fa fa-deaf"></i><a href="home_store.php"><p><font size="2"><font color="white"><font color ="Black">Store</font></p></a></li>
         <li><i class="fa fa-desktop"></i><a href="setting.php"><p><font size="2"><font color="white"><font color ="Black">Setting</font></p></a></li>
         <li><i class="fa fa-dot-circle-o"></i><a href="logout.php"><p><font size="2"><font color="white"><font color ="Black">Logout</font></font></p></a></li>
       </ul>
  </aside>
</div>
<div class="col-sm-10">
    <div class="masthead">

                <h1>
            <font color ="blue"><i><u> </u></i> </font>
                </h1>
                 </div>


    <div class="well bs-component">

        <form class="form-horizontal">

            <fieldset>
                <div class="alert alert-success" >
                    <i class="icon-calendar icon-large" ></i>


                    <?php
                    date_default_timezone_set("Asia/Dhaka");
                    echo  date("l, F d, Y") . "<br>";

                    ?>
                    <br><br>
                    <h5>
                       <marquee>

                      <h3><span "background-color:red;"><p><font color="#FBB710">@@@ WELLCOME TO ENTERPRISE RESOURCES PLANNING SYSTEM ........!!!!!!</font></p></span></h3>
                      </marquee>
                    </h5>
                          <h2> <p> <center> Company Information </center> </p></h2>
        <font color ="Black">
        <form class="form-horizontal">
            <fieldset>

                <button type="button" data-toggle="modal" data-target="#addCompany" class="p-3 mb-2 btn btn-info text-white"><font size="2"> <i class="fas fa-bell"></i> COMPANY ADD</button></font>
                <p align="center"><big><b>List of Companies</b></big></p>
                <div class="table-responsive">
                    <form method="post" action="" >

                        <table class="table table-bordered table-hover table-condensed" id="myTable">
                            <!-- <h3><b>Ordinance</b></h3> -->
                            <thead>
                            <tr class="info">
                                <th><p align="center"><font color="black">id</font></p></th>
                                <th><p align="center"><font color="black">Name/Number</font></p></th>
                                <th><p align="center"><font color="black">Company_type</font></p></th>
                                <th><p align="center"><font color="black">Address</font></p></th>
                                <th><p align="center"><font color="black">details</font></p></th>
                                <th><p align="center"><font color="black">Action</font></p></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            $query = "SELECT * from company WHERE delete_status ='0'";
                            global $id,$deleting_id;
                            $q = $conn->query($query);
                            while($row = $q->fetch_assoc())
                            {
                                $id     =$row['id'];
                                $name  =$row['name'];
                                $mobile   =$row['mobile'];
                                $company_type  =$row['company_type'];
                                $address  =$row['address'];
                                $details   =$row['details'];
                                ?>

                                    <tr id="<?php echo $row["emp_id"] ?>">
                                    <td align="center"><a href="view_company.php?id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['id'] ?></a></td>
                                    <td align="center"><a href="view_company.php?id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['name'] ?></br><?php echo $row['mobile'] ?></a></td>
                                    <td align="center"><a href="view_company.php?id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['company_type'] ?></a></td>
                                    <td align="center"><a href="view_company.php?id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['address'] ?></a></td>
                                    <td align="center"><a href="view_company.php?id=<?php echo $row["id"]; ?>" title="Update"><?php echo $row['details'] ?></a></td>
                                    <td align="center" width="200">
                                        <a class="btn btn-primary" href="view_groupList.php?id=<?php echo $row["id"]; ?>" title="List of company groups"><em class="fas fa-list-ul"></em></a>

                                           <a class="btn btn-danger" href="deletecompany.php?id=<?php echo $row["id"]; ?>">Delete</a>
                                        <!--
                                        <button type="button" data-toggle="modal" data-target="#deleteCompany" class="btn btn-danger btn-sm remove"><em class="fas fa-trash"></em></button>
                                           <button type="button" data-toggle="modal" data-target="#deleteCompany" class="btn btn-danger btn-sm remove"><em class="fas fa-trash"></em></button>
                                        -->
                                    </td>
                                </tr>

                            <?php } ?>
                            </tbody>

                            <tr class="info">
                              <th><p align="center"><font color="black">id</font></p></th>
                              <th><p align="center"><font color="black">Name/Number</font></p></th>
                              <th><p align="center"><font color="black">Company_type</font></p></th>
                              <th><p align="center"><font color="black">Address</font></p></th>
                              <th><p align="center"><font color="black">details</font></p></th>
                              <th><p align="center"><font color="black">Action</font></p></th>
                            </tr>
                        </table>
                    </form>
                </div>
            </fieldset>
        </form>
    </div>

    <!-- this modal is for ADDING an Company -->
    <div class="modal fade" id="addCompany" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">


                    <div class="modal-header" style="padding:20px 50px;">
                      <h1 align="center"><b><font color="blue">ADD COMAPNY INFORMATION</font></b></center></h1>


                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="#" name="form" method="post">
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><font color ="#a65959">Company Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control btn-lg" placeholder="Company name" required="required">

                            </div>
                        </div>
                        <div class="form-group">
                  <label class="col-sm-4 control-label">Type</label>
                  <div class="col-sm-8">
                    <select name="company_type" class="form-control btn-lg" style=" height:45px;" placeholder="Company Type" required>

                      <option value="">Company Type</option>
                      <option value="Regular">Regular</option>
                      <option value="Casual">Casual</option>
                    </select>
                  </div>
                </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Address</label>
                            <div class="col-sm-8">
                                <input type="textarea" rows="4" cols="50" name="address" class="form-control btn-lg" placeholder="Address" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Mobile</label>
                            <div class="col-sm-8">
                                <input type="text" name="mobile" class="form-control btn-lg" placeholder="Enter Mobile No." >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Details</label></font>
                            <div class="col-sm-8">
                                <input type="textarea" rows="4" cols="30" name="details" class="form-control btn-lg" placeholder="Company Details" required="required">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-4 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit">
                                <input type="reset" name="" class="btn btn-info btn-lg" value="Clear Fields">
                                <button type="button" class="close-btn btn-info btn-lg" data-dismiss="modal" title="Close">&times;</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- this modal is for DELETING COMPANY -->
        <div class="modal fade" id="deleteCompany" role="dialog">
            <div class="modal-dialog">



              <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                    <h3 align="center"><b>Delete Company</b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">

                    <form class="form-horizontal" action="deletecompany.php" name="form" method="post">


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
        <!--    <div class="modal-content">
                <div class="modal-header" style="padding:20px 50px;">
                    <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                    <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                    <div align="center">
                        <a href="logout.php" class="btn btn-block btn-danger">Logout</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<div class="col-sm-3">
</div>
<div class="col-sm-7">
    <?php

    include ("footer.php");

    ?>
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
<script type="text/javascript">
        $(document).ready( function() {
            $('.btn-danger').click( function() {
                var id = $(this).attr("id");
                if(confirm("Are you sure you want to delete this Data?")){
                    $.ajax({
                        type: "POST",
                        url: "deletecompany.php",
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

</body>
</html>
