<?php
include("db.php");
  include("auth.php");
  $s_id         = $_POST['s_id'];
  $g_id     = $_POST['g_id'];
  $g_name    = $_POST['g_name'];
  $address    = $_POST['address'];
  $contact   = $_POST['contact'];
  $detail   = $_POST['detail'];


$query  = "UPDATE compaygroup SET g_id='$g_id', g_name='$g_name', address='$address', contact='$contact', detail='$detail' WHERE s_id='$s_id'";
$sql = $conn->query($query);
  if ($sql)
  {
    ?>
    <script>
      alert('Company Group successfully updated.');
      window.location.href='home_company.php';
    </script>
    <?php
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href='view_groupList.php';
    </script>
    <?php
  }
?>
