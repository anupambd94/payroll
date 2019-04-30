<?php

?>

<?php

  if(isset($_POST['submit'])!="")

  {
    $emp_id      = $_POST['emp_id'];
    $lname      = $_POST['lname'];
    $fname      = $_POST['fname'];
    $mobileNo    = $_POST['mobileNo'];
    $gender     = $_POST['gender'];
    $type       = $_POST['emp_type'];
    $division   = $_POST['division'];
    $BS   = $_POST['BS'];
    $MA      = $_POST['MA'];
    $HR      = $_POST['HR'];
    $TA      = $_POST['TA'];
    $salary      = $_POST['salary'];


     $reset = $conn->query("ALTER TABLE employee AUTO_INCREMENT = '1'");
    $sql = $conn->query("INSERT into employee( fname,lname, gender, emp_type, division,mobileNo,BS,MA,HR,TA,salary)VALUES('$fname','$lname','$gender', '$type', '$division', '$mobileNo', '$BS','$MA','$HR','$TA','$salary')");
   // $sql1 = $conn->query("INSERT into salary(emp_id, salary_rate)VALUES('$emp_id','$salary_rate')");

    if($sql)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='index.php';
        </script>
      <?php
    }
  }
?>
