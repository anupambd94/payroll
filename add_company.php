<?php

?>

<?php

if(isset($_POST['submit'])!="")
{
    $name      = $_POST['name'];
    $company_type   = $_POST['company_type'];
    $address      = $_POST['address'];
    $mobile     = $_POST['mobile'];
    $details      = $_POST['details'];
    $reset = $conn->query("ALTER TABLE company AUTO_INCREMENT = '1'");
    $sql = $conn->query("INSERT into company(name,company_type,address, mobile, delete_status, details)VALUES('$name','$company_type','$address','$mobile', '0', '$details')");

    if($sql)
    {
        ?>
        <script>
            alert('Company had been successfully added.');
            window.location.href='home_company.php?page=company_list';
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            alert('Invalid.');
            window.location.href='home_company.php';
        </script>
        <?php
    }
}
?>
