<?php
include("db.php");
include("auth.php");
  $id         = $_POST['id'];
  $name      = $_POST['name'];
  $company_type  =$_POST['company_type'];
  $mobile     = $_POST['mobile'];
  $address    = $_POST['address'];
  $details   = $_POST['details'];


$query  = "UPDATE company SET name='$name',company_type ='$company_type', mobile='$mobile', address='$address' , details='$details' WHERE id='$id'";
$sql = $conn->query($query);
  if ($sql)
  {
    ?>
    <script>
      alert('Employee successfully updated.');
      window.location.href='home_company.php';
    </script>
    <?php
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href='view_company.php';
    </script>
    <?php
  }
?>
