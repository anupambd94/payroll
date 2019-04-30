<?php

  include("db.php");
  include("auth.php");

    $id         = $_POST['id'];
    $fname      = $_POST['fname'];
    $lname      = $_POST['lname'];
    $mobileNo     = $_POST['mobileNo'];
    $gender     = $_POST['gender'];
    $division   = $_POST['division'];
    $emp_type   = $_POST['emp_type'];
    $BS   = $_POST['BS'];
    $MA      = $_POST['MA'];
    $HR      = $_POST['HR'];
    $TA      = $_POST['TA'];
    $salary      = $_POST['salary'];


    $query  = "UPDATE employee SET  fname='$fname', lname='$lname', mobileNo='$mobileNo',  gender='$gender',
     division='$division' ,emp_type='$emp_type', BS = '$BS', MA='$MA' , HR='$HR', TA = '$TA', salary = '$salary' WHERE emp_id='$id'";
    $sql = $conn->query($query);
  if ($sql)
  {
    ?>
    <script>
      alert('Employee successfully updated.');
      window.location.href='home_employee.php';
    </script>
    <?php
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href='home_employee.php';
    </script>
    <?php
  }
?>
