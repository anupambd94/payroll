<?php
	require('db.php');

	$id=$_GET['emp_id'];
	$deleteCompany = $conn->query("DELETE FROM employee WHERE emp_id=$id");

  if($deleteCompany)
  {
    ?>
          <script>
              alert('Employee successfully Deleted...');
              window.location.href='home_employee.php';
          </script>
      <?php
  }
  else {
    ?>
          <script>
              alert('Error Acures');
              window.location.href='home_employee.php';
          </script>
      <?php
  }
 ?>
