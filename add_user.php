<?php
$conn =  new mysqli("localhost","root","","payroll");

?>
<?php
if(isset($_POST['submit'])!="")
{
  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $lname=$_POST['lname'];
  $address=$_POST['address'];
  $gender=$_POST['gender'];
  $phone = $_POST['phone'];
  $email=$_POST['email'];
  $usertype = $_POST['usertype'];
  $user = $_POST['username'];
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];
  $sql = $conn->query("INSERT into registrationform (fname,mname,lname,address,gender,phone,email,usertype,username,password,c_password)VALUES('$fname','$mname','$lname','$address','$gender','$phone','$email','$usertype','$user','$password','$c_password')");

if($sql)
    {

        ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='registration.php';
        </script>
        <?php
    }

   else
    {
        ?>
        <script>
          alert('Invalid.');
            window.location.href='login.php';
        </script>
        <?php
    }
}
?>
