<?php
$conn =  new mysqli("localhost","root","","payroll");

?>

<?php

if(isset($_POST['submit'])!="")
{
    global $location;
    global $idFound;
    $idFound = false;
    $emp_id      = $_POST['emp_id'];
    $salary_rate      = $_POST['salary_rate'];
    $salary_type     = $_POST['salary_type'];
    if($_POST['bonus_category'] != ""){
      $bonusCategory = $_POST['bonus_category'];
    }

    if($salary_type==1)
    {
      $location = "home_salaryRegular.php?page=salary_list";
      $type = "Regular";
    }
    else if($salary_type==2)
    {
      $location = "home_salaryCasual.php?page=salary_list";
      $type = "Casual";
    }else
    {
      $location = "home_salaryJobOrder.php?page=salary_list";
      $type = "Job Order";
    }


    if($emp_id=="all"){

      if($bonusCategory == "percent"){
        $percent = $_POST['percent'];
        $sql = $conn->query("UPDATE employee SET bonus = salary*'$percent' WHERE emp_type = '".$type."'");
      }else{
        $sql = $conn->query("UPDATE employee SET bonus = '$salary_rate' WHERE emp_type = '".$type."'");
      }



      if($sql)
      {
          ?>
          <script>
              alert('Employee Bonus had been successfully added.');
              window.location.href='<?php echo $location?>';
          </script>
          <?php
      }

      else
      {
          ?>
          <script>
              alert('Invalid.');
              window.location.href='<?php echo $location?>';
          </script>
          <?php
      }

    }else{
      $sql = $conn->query("UPDATE employee SET bonus = '$salary_rate' WHERE emp_id = '".$emp_id."'");

      if($sql)
      {
          ?>
          <script>
              alert('Employee Bonus has been successfully added.');
              window.location.href='<?php echo $location?>';
          </script>
          <?php
      }

      else
      {
          ?>
          <script>
              alert('Invalid.');
              window.location.href='<?php echo $location?>';
          </script>
          <?php
      }
    }
}



//for alll employess salary payment...
if(isset($_POST['submitAll'])!="")
{
global $emp_id, $emp_type, $salary_rate, $bonus;
  $query2  = "SELECT * from employee where emp_type = 'regular'";
$q2 = $conn->query($query2);
while($row2 = $q2->fetch_assoc()) // main while start
  {
    $emp_id = $row2['emp_id'];
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



      if(!$paid){ // starting chacking allready paid or not

        include("calculations/regularCalculation.php");


            $id           = $row2['emp_id'];
            $salary_rate     = $row2['salary'];
            $bonus        = $row2['bonus'];

            $query4  = "SELECT emp_type from employee where emp_id = $id";
            $q4 = $conn->query($query4);
            while($row4 = $q4->fetch_assoc()){
          if($row4['emp_type'] == "Casual" ){
            $casual = true;
          }
        }

        $sql = $conn->query("UPDATE salary SET salary_rate='$salary_rate', bonus='$bonus' WHERE emp_id='$id'");

        if($emp_type == "Regular"){
          $location = "home_salaryRegular.php";
        }
        else if($emp_type == "Casual"){
          $location = "home_salaryCasual.php";
        }
        else {
          $location = "home_salaryJobOrder.php";
        }
        date_default_timezone_set("Asia/Dhaka");
        $pay_date = date("Y-m-d");
        $pay_status = "1";
        $thisMonth = date("m");
        $thisYear = date("Y");
        if($ADpay_id !=0){
          $updatePreviousPayments= $conn->query("UPDATE payment SET due_status = '0',due = '0',advance_status = '0',advance = '0' WHERE pay_id='".$ADpay_id."'");

        }
        if($salaryPaid>0){
          $addPayment = $conn->query("INSERT into payment(emp_id, pay_date,pay_amount, paid_in_cash, paid_in_bkash, due, due_status,advance, advance_status,pay_remark, pay_status)VALUES('$id','$pay_date','$salaryPaid','$paid_in_cash','$paid_in_bkash','$netpay','$newDue_status','$advanceSalary','$advance_status','$remark','$pay_status')", MYSQLI_USE_RESULT);

        }else{
          $addPayment = $conn->query("INSERT into payment(emp_id, pay_date,pay_amount, paid_in_cash, paid_in_bkash, due, due_status,advance, advance_status,pay_remark, pay_status)VALUES('$id','$pay_date','$salary','$paid_in_cash','$salary','0','0','0','0','$remark','$pay_status')", MYSQLI_USE_RESULT);

        }

        if ($sql && $addPayment)
        {
            ?>
            <script>
                alert('Account successfully updated.');
                window.location.href='<?php echo $location;?>';
            </script>

            <?php
            $deleteDeductions= $conn->query("DELETE FROM deductions WHERE emp_id='".$id."'");
            $updateBo= $conn->query("UPDATE employee SET bonus = '0' WHERE emp_id='".$id."'");
            if($casual){
              $deleteWorkingDays= $conn->query("DELETE FROM works WHERE emp_id='".$id."'");
            }

        }
        else
        {
            echo "Invalid";
        }


            // end of checking
      }else{
        ?>
        <script>
            alert('You have already paid in this month.');
            window.location.href='home_salaryRegular.php';
        </script>

        <?php
      }





} // end of main while

}   //end main if


?>
