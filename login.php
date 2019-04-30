



<?php
include("db.php");

?>
<?php

if(isset($_POST['Login'])){
$username=$_POST['user'];
$password=$_POST['pass'];
$usertype=$_POST['usertype'];
$query="SELECT * FROM multiuserlogin WHERE username='".$username."' and password='".$password."' and usertype='".$usertype."'";
$result = mysqli_query($conn, $query);
if($result){
while($row = mysqli_fetch_array($result)){
echo '<script type="text/javascript">alert("you are logined successfully and you are logined as '. $row['usertype'] . '")</script>';
}


    //if(mysqli_num_rows($result)>0){

  if($usertype=="admin"){
?>
<script type="text/javascript">
    //  session_start();
		//	$_SESSION['name'] = $row['name'];
		//	$_SESSION['username'] = $row['username'];
window.location.href = "index.php";
</script>
<?php

}else{
?>
<script type="text/javascript">

window.location.href = "home_store.php";
</script>
<?php
}

}else{
echo 'no result';
}
}
?>


<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Enterprise Resources planning System</title>
<link rel="icon" href="img/core-img/favicon.ico">
<link href="css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="css/font-awesome.css" rel="stylesheet" />


<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<style>
.myhead{
margin-top:0px;
margin-bottom:0px;
text-align:center;
}

</style>

</head>
<body style="background-image: url(img/login4.jpg)">

<style type="text/css">
.different-text-color { color: White ; }
</style>
<br><br>
<marquee>

<h3><span class="different-text-color"><font color="black">@@@ WELLCOME TO <font color="#8795fa"> ENTERPRISE RESOURCES</font><font color="yellow"> PLANNING SYSTEM.......!!!!!!</font></span></h3>
</marquee>



<div class="container">




     <div class="row " >


         <div class="col-md-1.5 col-md-offset-1.5 col-sm-1.5 col-sm-offset-1.5 col-xs-1.5 col-xs-offset-1">
                  <!--Login from image-->
                     <div class="panel-body" style="background-image: url(img/img4.jpg); height: 600px; width: 1028px; border: 1px solid black; margin-top:50px;margin-right:800px; border:solid 3px #white;">

                    <!--Login from style -->
                         <div style="height: 200px; width: 600px; margin-top:280px; margin-left:350px; padding:0px;">




</head>

<form method="POST">
<table>
  <tr>
  <td><font color="black"><i> <b>User Type :   </b><i class="fas fa-user-tie">  </i>   </i> </font></td>
    <td>  <select name="usertype" class="form-control btn-lg" style=" height:40px; width:250px;" placeholder="user type" required >
  <option value="">select user type</option>
  <option value="admin" > admin</option>
  <option value="user">user</option>
  </select>
  </td>
  </tr>
<tr>
<td><font color="black"><b><i>Username: </b><i class="fas fa-user-tag"></i> </i> </font></td>
<td>
  <input type="TEXT" name="user" class="form-control btn-lg" style=" height:30px; width:250px;" placeholder="enter username"></td>
</tr>
<tr>
    <td><font color="black"><i><b>Password : </b><i class="fas fa-key"></i> </i>  </font></td>
    <td>
    <input type="password" name="pass" class="form-control btn-lg" style=" height:30px; width:250px;" placeholder="enter Password"  id="myInput">
    </td>
</tr>
<tr>
    <td> </td>
    <td>
   <input type="checkbox" onclick="myFunction()"> <font color="black"><font size="2">Show Password</font></font>
   </td>
</tr>
   <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>





<tr>
<td></td>
<td
<br><br>
<font size="4"> <i class="fas fa-sign-in-alt"> </i> </font> <font size="10"> <input type="submit" name="Login" class="btn btn-primary btn-lg"  value=" Sign in"></font>
<font size="4"> <i class="fas fa-broom"></i> </font> <font size="10"> <input type="reset" name="" class="btn btn-primary btn-lg" value="Clear Fields"></font>
<!--<a href="setting.php" > <i class="fas fa-unlock-alt"> </i> <font color="black">  Forget password ?<br></font>-->
<a href="registration.php" ><font color="white">  <i class="fas fa-users-cog"></i> Registration ?<br></font>
</td>
</tr>
</form>
</body>
</html>
