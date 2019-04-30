<?php

?>

<?php


if(isset($_POST['submit'])!="")
{
    
    $t_date  = date('Y-m-d', strtotime($_POST['t_date']));
    $cause =$_POST['cause'];
    $amount  =$_POST['amount'];
    $method  =$_POST['method'];
    $remark  =$_POST['remark'];

    $sql = $conn->query("INSERT into transaction(t_date, amount, cause, method,remark)VALUES('$t_date','$amount','$cause', '$method', '$remark')");

    if($sql)
    {
        ?>
        <script>
            window.location.href='dailyTransactions.php?page=transaction_list';
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            window.location.href='index.php';
        </script>
        <?php
    }
}
?>
