<?php
$conn =  new mysqli("localhost","root","","payroll");

?>

<?php

if(isset($_POST['submitd'])!="")
{
    $emp_id      = $_POST['emp_id'];
    $d_date      = $_POST['d_date'];
    $d_cause      = $_POST['d_cause'];
    $d_amount      = $_POST['d_amount'];
    $d_method     = $_POST['pay_method'];
     $remark     = $_POST['remark'];
    

    $sql = $conn->query("INSERT into deductions(emp_id, d_date, d_cause, d_amount,d_method,remark)VALUES('$emp_id','$d_date','$d_cause','$d_amount','$d_method','$remark')");

    if($sql)
    {
        ?>
        <script>
            alert('Deduction had been successfully added.');
            window.location.href="edit_casualAccount.php?emp_id=<?php echo $emp_id; ?>";
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            alert('Invalid.');
            window.location.href="edit_casualAccount.php?emp_id=<?php echo $emp_id; ?>";
        </script>
        <?php
    }
}
?>
