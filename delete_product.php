<?php
require('db.php');
global $p_id;
	$p_id = $_GET['p_id'];
  $deleteProduct= $conn->query("DELETE FROM product WHERE p_id = $p_id");
	$deleteStock= $conn->query("DELETE  from stock WHERE p_id='".$p_id."'");
	$deletehistory= $conn->query("DELETE  from product_operation_history WHERE pid='".$p_id."'");

  if($deleteProduct)
  {
    ?>
          <script>
              alert('Product successfully deleted...');
              window.location.href='home_store.php';
          </script>
      <?php
  }
  else {
    ?>
          <script>
              alert('Error Acures');
              window.location.href='home_store.php';
          </script>
      <?php
  }
 ?>
