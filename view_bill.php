<?php
  include("db.php"); //include auth.php file on all secure pages
  include("auth.php");



$query  = "SELECT * from deductions WHERE deduction_id='1'";
$q = $conn->query($query);
while($row = $q->fetch_assoc())
  {
  }
?>



    <!-- Meta, title, CSS, favicons, etc.
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <!-- Title  -->
    <title>Enterprise Resources planning System</title>

    <!-- header logo  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <script>
      <!-
        var ScrollMsg= "  "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      //
    </script>



  <body>

    <div class="container">
      <?php

      include ("head.php");

      ?>

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
      <div class="masthead">
        <h3>
          <b><a href="index.php"><font color ="blue"><u><i>ERP</i></u></a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b><font color ="black "><font size="3"><i class="fa fa-bicycle"></i> Admin</b></a>
        </h3>
        <nav>
            <ul class="nav nav-justified">
              <li><a href="index.php" >Home</a></li>
              <li><a href="home_company.php" >Company</a></li>
              <li class="active"><a href="home_bill.php">Company Bill</a></li>
              <li><a href="home_employee.ph">Employe</a></li>
              <li><a href="home_payment.php">Payment Report</a></li>
              <li><a href="home_store.php">Store</a></li>

            </ul>
        </nav>
      </div><br><br>

      <?php
           global $company_id;
           global $bill_id,$s_id;
           global $company_group_id;
           global $company_group;
           global $billsno,$reduced;
           global $bill_no,$s_id;
             $s_id = $_REQUEST['bill_no'];

           $query  = "SELECT * from companybill where s_id = '".$s_id."'";
           $q = $conn->query($query);
           while($row = $q->fetch_assoc())
             {
               $billsno = $row["billsno"];
               $bill_no = $row["bill_no"];
               $query11  = "SELECT * from bill where billsno = '".$billsno."'";
               $q11 = $conn->query($query11);
               $row11 = $q11->fetch_assoc();
               $company_id = $row11["company_id"];
               $bill_id = $row11["bill_id"];
               $query1  = "SELECT * from company where id = '".$company_id."'";
               $q1 = $conn->query($query1);
               $row1 = $q1->fetch_assoc();
               $company_name = $row1["name"];

               $company_group_id = $row["company_group_id"];
               $query2  = "SELECT g_name from compaygroup where g_id = '".$company_group_id."' AND id = '".$company_id."'";
               $q2 = $conn->query($query2);
               $row2 = $q2->fetch_assoc();
               $company_group = $row2["g_name"];

               $work_type = $row["work_type"];
               $work_area = $row["work_area"];
               $bill_date = date('d-m-Y', strtotime($row["bill_date"]));
               $receive_date= $row["receive_date"];
               $bill_amount = $row["bill_amount"];
               $received_amount = $row["receive_amount"];
               $reduced = $bill_amount - $received_amount;
               $remark = $row["remark"];
               $pay_status = $row["pay_status"];
               if($pay_status=="1"){
                   $due_header = "Reduecd";
               }
               else{
                   $due_header = "Due";
               }
               }
               ?>


                        <div id="page-wrapper">
                             <div id="page-inner">

                         <div class="row">
                             <div class="col-md-12">
                           <h2 class="page-head-line"><font color="Black"><?php echo "Company : ". $company_name."/". $bill_id ?></font></h2>
                         </div>
                       </div>



               <form class="form-horizontal" action="update_bill.php" method="post" name="form">
                 <input type="hidden" name="new" value="1" />
                 <input name="s_id" type="hidden" value="<?php echo $s_id?>" />
                 <div class="form-group">
                     <label class="col-sm-4 control-label"><font color="#FBB710">Bill No :<font></label>
                     <div class="col-sm-4">
                         <input type="text" name="bill_no" value="<?php echo $bill_no?>" class="form-control" placeholder="Enter Bill No" required="required" readonly>
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="col-sm-4 control-label">Company :</label>
                     <div class="col-sm-4">
                         <input type="text" name="company_name" value="<?php echo $company_name?>" class="form-control" placeholder="Enter Amount" required="required" readonly >
                     </div>
                 </div>
                 <div class="form-group">
                     <label class="col-sm-4 control-label">Group :</label>
                     <div class="col-sm-4">
                         <input type="text" name="company_group" value="<?php echo $company_group?>" class="form-control" placeholder="company_group" required="required " readonly>
                     </div>
                 </div>

                   <div class="form-group">
                       <label class="col-sm-4 control-label">Work Type :</label>
                       <div class="col-sm-4">
                           <input type="text" name="work_type" value="<?php echo $work_type?>" class="form-control" placeholder="Enter Amount" required="required" >
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-4 control-label">Area :</label>
                       <div class="col-sm-4">
                           <input type="text" name="area" value="<?php echo $work_area?>" class="form-control" placeholder="Enter Amount" required="required" >
                       </div>
                   </div>

                   <div class="form-group">
                       <label class="col-sm-4 control-label">Bill Date :</label>
                       <div class="col-sm-4">
                           <input class="form-control" id="datepicker" value="<?php echo $bill_date?>" name="bill_date" type="text"readonly>
                           <script>
                               $('#datepicker').datepicker({
                                   uiLibrary: 'bootstrap4'
                               });
                           </script>





                       </div>
                   </div>

                   <div class="form-group">
                       <label class="col-sm-4 control-label">Amount :</label>
                       <div class="col-sm-4">
                           <input type="text" name="bill_amount" value="<?php echo $bill_amount?>" class="form-control" placeholder="Enter Amount" required="required" readonly>
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-4 control-label">Receive Date :</label>
                       <div class="col-sm-4">
                           <input class="form-control" id="datepicker1" value="<?php echo $receive_date?>" name="received_date" type="text"readonly>
                           <script>
                               $('#datepicker1').datepicker({
                                   uiLibrary: 'bootstrap4'
                               });
                           </script>
                       </div>
                   </div>

                   <div class="form-group">
                       <label class="col-sm-4 control-label"> Receive Amount :</label>
                       <div class="col-sm-4">
                           <input type="text" name="received_amount" value="<?php echo $received_amount?>" class="form-control" placeholder="Enter Amount" required="required"readonly>
                       </div>
                   </div>
                   <div class="form-group">
                       <label class="col-sm-4 control-label"> <?php echo $due_header?> :</label>
                       <div class="col-sm-4">
                           <input type="text" name="due" value="<?php echo $reduced?>" class="form-control" placeholder="Enter Amount" required="required"readonly>
                       </div>
                   </div>
 <br><br>

                   <div class="form-group">
                     <label class="col-sm-5 control-label"></label>
                     <div class="col-sm-4">
                         <button type="button" title="Set As Paid"data-toggle="modal" data-target="#setAsPaid" class="btn btn-success"><em class="fas fa-check"></em></button>
                       <input type="submit" name="submitBillUpdate" value="Update" class="btn btn-danger">
                       <a class="btn btn-info " href="edit_bill.php?billsno=<?php echo $billsno ?>">Cancel</a>
                     </div>
                   </div>

               </form>
     <div class="well bs-component">
                 <fieldset>

                   <div class="table-responsive">


                         <button type="button" data-toggle="modal" data-target="#addBill" class="btn btn-info "><i class="fa fa-bell"></i> New received Amount</button>
                         <br><br>


                         <table class="table table-bordered table-hover table-condensed" id="myTable">
                             <!-- <h3><b>Ordinance</b></h3> -->
                             <thead>
                             <tr class="info">
                                 <th><p align="center">SN</p></th>
                                 <th><p align="center">Bill received Date</p></th>
                                 <th><p align="center">Bill Amount</p></th>
                                 <th><p align="center">Remark</p></th>
                             </tr>
                             </thead>
                             <tbody>
                             <?php

                             global $sn;
                             global $s_id;
                             global $due;
                             global $remark;
                             $sn = 0;
                             $query  = "SELECT * from receivedbill where s_id = '".$s_id."'";
                             $q = $conn->query($query);
                             while($row = $q->fetch_assoc())
                             {
                               $s_id = $row["s_id"];
                               $sn++;



                               $bill_date = $row["bill_date"];
                               $bill_amount = $row["amount"];
                               $remark = $row["remark"];


                                 ?>
                                 <tr>
                                     <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $sn?></td>
                                      <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $bill_date?></td>
                                     <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $bill_amount?></td>
                                      <td align="center"><a href="view_bill.php?bill_no=<?php echo $bill_no ?>" title="Update"><?php echo $remark?></td>


                                 </tr>
                             <?php } ?>
                             </tbody>

                             <tr class="info">
                                 <th><p align="center">SN</p></th>
                                 <th><p align="center">Bill received Date</p></th>
                                 <th><p align="center">Bill Amount</p></th>
                                 <th><p align="center">Remark</p></th>

                             </tr>
                         </table>
                       </form>
                     </div>
                   </fieldset>

               </div>

               <!-- this modal is for ADDING Company received bill Bill -->
     <div class="modal fade" id="addBill" role="dialog">
         <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
                 <div class="modal-header" style="padding:30px 60px;">

                     <h3 align="center"><b>Add Bill of a Company</b></h3>
                     <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>


                 </div>
                 <div class="modal-body" style="padding:40px 50px;">

                     <form class="form-horizontal" action="add_bill.php" name="form" method="post">

                         <div class="form-group">
                           <label class="col-sm-4 control-label">Bill No :</label>
                           <input type="hidden" name="s_id" class="form-control" value = "<?php echo $s_id?>">
                           <input type="hidden" name="due" class="form-control" value = "<?php echo $reduced?>">
                           <div class="col-sm-8">
                               <input type="text" name="billno" class="form-control" placeholder="Enter Bill No" required="required" value = "<?php echo $bill_no?>">
                           </div>
                       </div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label">Date :</label>
                             <div class="col-sm-8">
                                 <input class="form-control" id="datepicker"

                                 value="<?php echo $thisDate;?>" name="received_date" type="text" />

                                <script>
                                     $('#datepicker').datepicker({
                                         uiLibrary: 'bootstrap4'
                                     });


                                 </script>

                             </div>
                         </div>

                       <div class="form-group">
                             <label class="col-sm-4 control-label">Amount :</label>
                             <div class="col-sm-8">
                                 <input type="text" name="received_amount" class="form-control" placeholder="Enter Received Amount" required="required">
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-4 control-label">Remark :</label>
                             <div class="col-sm-8">
                                 <input type="text" name="remark" class="form-control" placeholder="Remark">
                             </div>
                         </div>


                      <div class="form-group">
                             <label class="col-sm-4 control-label"></label>
                             <div class="col-sm-8">
                                 <input type="submit" name="submitnew" class="btn btn-success" value="Submit">
                                 <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                             </div>
                         </div>
                     </form>

                 </div>

             </div>
         </div>
     </div>

     <!-- this modal is for ADDING an Company -->
     <div class="modal fade" id="setAsPaid" role="dialog">
         <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
                 <div class="modal-header" style="padding:20px 50px;">
                     <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
                     <h3 align="center"><b>Close Compnay Bill Calculation</b></h3>
                 </div>
                 <div class="modal-body" style="padding:40px 50px;">

                     <form class="form-horizontal" action="update_bill.php" name="form" method="post">
                         <input type="hidden" name="s_id" class="form-control" value="<?php echo $s_id; ?>" required="required" readonly>

                      <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span><p align="center">Are you sure, you want to set this bill as paid!</p><p align="center">Press No if you do not want to do this.</p></div>

                         <div class="form-group">
                             <label class="col-sm-4 control-label"></label>
                             <div class="col-sm-4">
                                 <button type="submit" name ="set" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Yes</button>
                                 <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
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

  </body>
</html>
