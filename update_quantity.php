<?php

  include("db.php");

if(isset($_POST['submitHistory'])!="")
{


  $sno        = $_POST['sno'];
  $p_id        = $_POST['pid'];
  $quantity   = $_POST['quantity'];
  $operation   = $_POST['stock_operation'];
  date_default_timezone_set("Asia/Dhaka");
  $date = date('Y-m-d', strtotime($_POST['date']));
  $value   = $_POST['operation_value'];
  $result   = $_POST['output'];
  $remark   = $_POST['remark'];


  $query  = "UPDATE product SET stock='$result' WHERE p_id='$p_id'";

  $q2  = "UPDATE product_operation_history SET quantity='$quantity', operation='$operation', date='$date', value='$value', result='$result', remark='$remark',edit_status='1' WHERE sno='$sno'";

  $updateProduct = $conn->query($query);
  $UpdateHistory = $conn->query($q2);

  if ($updateProduct && $UpdateHistory)
  {
    ?>
    <script>
      alert('Product stock quantity successfully updated.');
      window.location.href="manage_product_quantity.php?p_id=<?php echo $p_id ?>";
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

}

  if(isset($_POST['submit'])!="")
{

  $p_id         = $_POST['p_id'];
  $quantity   = $_POST['quantity'];
  $operation   = $_POST['stock_operation'];
  date_default_timezone_set("Asia/Dhaka");
  $date = date('Y-m-d', strtotime($_POST['date']));
  $value   = $_POST['operation_value'];
  $result   = $_POST['output'];
  $remark   = $_POST['remark'];


$query  = "UPDATE product SET stock='$result' WHERE p_id='$p_id'";
$q2  = "INSERT INTO product_operation_history(pid,quantity,operation,date,value,result,remark) VALUES('$p_id','$quantity','$operation','$date','$value','$result','$remark') ";
$updateProduct = $conn->query($query);
$insertHistory = $conn->query($q2);

  if ($updateProduct  && $insertHistory)
  {
    ?>
    <script>
      alert('Product stock quantity successfully updated.');
      window.location.href="manage_product_quantity.php?p_id=<?php echo $p_id ?>";
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

}

?>
