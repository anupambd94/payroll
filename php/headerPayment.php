
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 260px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 30px;
}

.sidenav a {
    padding: 5px 6px 10px 16px;
    text-decoration: none;
    font-size: 22px;
    color: #818181;
    display: block;
    margin:10px;
}

.sidenav a:hover {
    color:#383838 ;
}

.main {
    margin-left: 160px; /* Same as the width of the sidenav */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>






        <!-- /. NAV TOP  -->

<div class="sidenav">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><span style="color:LightGoldenRodYellow ">Enterprise Resources planning System<span></a>
            </div>

        </nav>
    <nav >

          </li>

                  <ul class="nav" id="main-menu">

                      <li>

                        <!-- <div class="user-img-div">
                            <img src="img/user.png" class="img-thumbnail" />

                            <div class="inner-text">
                                <?php echo $_SESSION['rainbow_name'];?>
                            <br />

                            </div>
                        </div> -->

                    </li>


                    <li>
                        <a  href="index.php"><i class="fas fa-columns"></i>Home</a>
                    </li>

					 <li>
                        <a href="home_company.php"><i class="fa fa-university "></i>Company</a>
                    </li>
                    <li>
                        <a href="home_bill.php"><i class="fa fa-file-text "></i>Bill </a>
                    </li>

					 <li>
                        <a href="home_employee.php"><i class="fa fa-users "></i>Employee</a>
                    </li>
                    <li>
                                 <a   href="home_salaryRegular.php"><i class="fa fa-money "></i>Payment</a>
                             </li>
					<li>
                        <a class="active-menu" href="home_payment.php"><i class="fa fa-inr "></i>Payment Report</a>
                    </li>
                    <li>
                                 <a href="home_store.php"><i class="fa fa-box "></i>Store</a>
                             </li>





					<li>
                        <a href="setting.php"><i class="fa fa-cogs "></i>Setting</a>
                    </li>

					 <li>
                        <a href="logout.php"><i class="fa fa-power-off "></i>Logout</a>
                    </li>


                </ul>

            </div>

        </nav>
        </div>
        </body>
        </html>
        <!-- /. NAV SIDE  -->
