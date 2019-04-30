<?php
require('db.php');

	$id=$_GET['id'];
  $deleteCompany = $conn->query("DELETE FROM company WHERE emp_id=$id");
	$query  = "SELECT billsno from bill WHERE company_id='".$id."'";
  $q = $conn->query($query);
  while($row = $q->fetch_assoc())
  {
      $query1  = "SELECT s_id from companybill WHERE billsno='".$row["billsno"]."'";
      $q1 = $conn->query($query1);
     while($row1 = $q1->fetch_assoc())
     {
    $deleteCompanybillreceived = $conn->query("DELETE FROM receivedbill  WHERE s_id='".$row1["s_id"]."'");

    }
    $deleteCompanybill = $conn->query("DELETE FROM companybill  WHERE billsno='".$row["billsno"]."'");
    $deleteCompanyreceivedbill = $conn->query("DELETE FROM billreceived  WHERE billsno='".$row["billsno"]."'");

  }
	$deleteCompanybill = $conn->query("DELETE FROM bill WHERE company_id='".$id."'");
  $deleteCompanyGroup = $conn->query("DELETE FROM compaygroup WHERE id='".$id."'");
  $deleteCompany = $conn->query("DELETE FROM company WHERE id='".$id."'");


  if($deleteCompanybill && $deleteCompanyGroup && $deleteCompany)
  {
    ?>
          <script>
              window.location.href='home_company.php';
          </script>
      <?php
  }
  else {
    ?>
          <script>
              alert('Error Acures');
              window.location.href='home_company.php';
          </script>
      <?php
  }
 ?>
