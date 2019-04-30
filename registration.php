
<?php
  include("auth.php"); //include auth.php file on all secure pages

include("db.php");
include("add_user.php");
?>

<html>
<html>
<head>
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

body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */


/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}

</style>

</head>
<body style="background-image: url(img/login4.jpg)">

<style type="text/css">
.different-text-color { color: White ; }
</style>

<marquee>

<h4><span class="different-text-color">@@@ WELLCOME TO ENTERPRISE RESOURCES PLANNING SYSTEM.......!!!!!!</span></h4>
</marquee>

<div class="container">




     <div class="row " >

            <div class="col-md-1.5 col-md-offset-1.5 col-sm-1.5 col-sm-offset-1.5 col-xs-1.5 col-xs-offset-1">



                                <form role="form" action="login.php" method="post">
                                <hr/>
</head>

<body>
  <form action="/action_page.php">
    <div class="container">
      <tr>
       <center><h1>Registration Employee </h1>
      <p><font color="black"><u>Please fill in this form to create an account.</u></font></p></center>
      </tr>
      <br><br>
      <table align="center">
      <tr>
      <td><font color="black"><i>First Name :</i></td>
      <td><input type="text" name="fname" placeholder="enter your first name"></td>
      </tr



      <tr>
      <td><font color="black"><i>Last Name :</i></td>
      <td><input type="text" name="lname" placeholder="enter your last name"></td>
      </tr>



      <tr>
      <td><font color="black"><i>Address :</i></td>
      <td><input type="text" name="address" placeholder="enter your address"></td>
      </tr>



      <tr>
      <td><font color="black"><i>Gender :</i></td>
      <td><input type="radio" name="gender" value="Male"><font color="black">Male</td>
      </tr>

      <tr>
      <td></td>
      <td><input type="radio" name="gender" value="female"><font color="black">Female</td>
      </tr>

      <tr>
      <td></td>
      <td><input type="radio" name="gender" value="others"><font color="black">others</td>
      </tr>



      <tr>
      <td><font color="black"><i>Phone Number :</i></td>
      <td><input type="text" name="mobail" placeholder="enter your phone number"></td>
      </tr>



      <tr>
      <td><font color="black"><i>E-mail:</i></td>
      <td><input type="text" name="email" placeholder="example@example.com"></td>
      </tr>



      <tr>
      <td><font color="black"><i>username :</i></td>
      <td><input type="text" name="username" placeholder="enter your username"></td>
      </tr>



       <tr>
          <td><font color="black"><i>Password : <i class="fas fa-key"></i> </i>  </font></td>
          <td>
          <input type="password" name="password" class="form-control btn-lg" style=" height:30px; width:210px;" placeholder="enter Password"  id="myInput">
          </td>
       </tr>

       <tr>
          <td> </td>
          <td>
         <input type="checkbox" onclick="myFunction()"> <font color="black">Show Password </font>
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
         <td><font color="black"><i> C_Password : <i class="fas fa-key"></i> </i>  </font></td>
         <td>
         <input type="password" name="c_password" class="form-control btn-lg" style=" height:30px; width:210px;" placeholder=" enter confirm Password"  id="myInput">
         </td>
      </tr>
      <tr>

      <tr>
      <td></td>
      <td></td>
      </tr>
      <tr>
      <td></td>
      <td></td>
      </tr>
      <tr>
      <td></td>
      <td>
        <button type="submit" class="registerbtn">Register</button>
        <button type="reset" class="registerbtn" value="Reset">Reset</button>
    </td>
      </tr>



<tr>
  <td>  </td>
  <td>
    <br>
  <a href="login.php" > <font color="white">Already you are a member  <font size ="4"> <font color="black">  Sign in <br></font>
  </td>
</tr>
</form>
</body>
</html>
