<?php
include("db.php");
global $name,$p_type,$company ;
  $p_id         = $_POST['p_id'];
  $type        = $_POST['type'];
  $p_name      = $_POST['pname'];
  $company     = $_POST['company'];
  $p_description     = $_POST['p_description'];
  $quantity   = $_POST['quantity'];
  $price  = $_POST['price'];


$query  = "UPDATE product SET p_type='$type', p_name='$p_name', p_company='$company', p_description='$p_description' , p_quantity='$quantity',price = '$price' WHERE p_id='$p_id'";


$sql = $conn->query($query);
  if ($sql)
  {
    ?>
    <script>
      alert('Employee successfully updated.');
      window.location.href='home_store.php';
    </script>
    <?php
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href='home_store.php';
    </script>
    <?php
  }
?>
