<?php

?>

<?php

if(isset($_POST['submit'])!="")
{

    $p_name  =$_POST['pname'];
    $type   =$_POST['type'];
    $company =$_POST['company'];
    $p_description   =$_POST['p_description'];
    $quantity  =$_POST['quantity'];
    $price  =$_POST['price'];
    $stock  =$_POST['stock'];


    $addProduct = $conn->query("INSERT into product(p_name, p_type, p_quantity, p_company, p_description, price,stock)VALUES('$p_name','$type','$quantity', '$company',' $p_description', '$price','$stock')");

    if($addProduct)
    {
        ?>
        <script>

            window.location.href='home_store.php?page=product_list';
        </script>
        <?php
    }

    else
    {
        ?>
        <script>
            alert('Invalid.');
            window.location.href='index.php';
        </script>
        <?php
    }
}
?>
