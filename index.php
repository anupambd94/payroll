<?php
//	session_start();
	//if (! isset($_SESSION['username'])) {
	//	header('location:login.php');
	//	exit();
	//}
?>
<?php
  include("auth.php"); //include auth.php file on all secure pages
include("db.php");
//include("checklogin.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Enterprise Resources planning System</title>

    <!-- header logo  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>
<br><br>

<h3>
   <marquee>

  <h2><span "background-color:blue;"><p><font color="#FBB710">@@@ WELLCOME TO ENTERPRISE RESOURCES PLANNING SYSTEM ........!!!!!!</font></p></span></h2>
  </marquee>
</h3>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.php"> <!--<img src="img/core-img/logo.png" alt=""> -->
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="https://www.bubt.edu.bd/"> <img src="img/core-img/BUBT-Logo.png" alt=""><h2>@ERP@</h2></a>

            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>


					          <li class="active"><a href="index.php">Home</a></li>
					          <li><a href="index_another.php">Transaction Report</a></li>
                    <li><a href="home_cash.php"> Credited Cash </a></li>
                    <li><a href="home_bkash.php">Credited Bkash </a></li>
                    <li><a href="dailyTransactions.php"> Debited Cash/Bkash </a></li>
                    <li><a href="home_company.php">Company</a></li>
                    <li><a href="home_bill.php">Company Bill</a></li>
                    <li><a href="home_employee.php">Employee</a></li>
				           	<li><a href="home_salaryRegular.php">Payment</a></li>
                    <li><a href="home_payment.php">Payment Report</a></li>
				            <li><a href="home_store.php">Store</a></li>
                    <li><a href="setting.php">Setting's</a></li>
                    <li><a href="help.php">Help</a></li>
                    <li><a href="login.php">Logout</a></li>



                </ul>
            </nav>
            <!-- Button Group
            <div class="amado-btn-group mt-30 mb-100">
                <a href="#" class="btn amado-btn mb-15">%Discount%</a>
                <a href="#" class="btn amado-btn active">New this week</a>
            </div> -->
            <!-- Cart Menu
            <div class="cart-fav-search mb-100">
                <a href="cart.html" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
            </div> -->
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="https://www.bubt.edu.bd/"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/login"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->




        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="index.php">
                        <img src="img/bg-img/1.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>@@@</p>
                            <h4>Home</h4>
                        </div>
                    </a>
                </div>

				<!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="index_another.php">
                        <img src="img/bg-img/8.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>@Cash/@Bkash Report </p>
                            <h4>Daily Transaction</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="home_company.php">
                        <img src="img/bg-img/2.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>@@@</p>
                            <h4>Company</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="home_bill.php">
                        <img src="img/bg-img/3.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>@@@</p>
                            <h4>Company Bill</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="home_employee.php">
                        <img src="img/bg-img/4.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>@@@</p>
                            <h4>Employee</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="home_salaryRegular.php">
                        <img src="img/bg-img/5.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>@@@</p>
                            <h4>Payment</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="home_payment.php">
                        <img src="img/bg-img/11.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>@@@</p>
                            <h4>Payment Report</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="home_store.php">
                        <img src="img/bg-img/6.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>@@@</p>
                            <h4>Store</h4>
                        </div>
                    </a>
                </div>



                <!-- Single Catagory
                <div class="single-products-catagory clearfix">
                    <a href="shop.html">
                        <img src="img/bg-img/9.jpg" alt=""> -->
                        <!-- Hover Content
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From $318</p>
                            <h4>Home Deco</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div> -->

        <!--  Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
		<div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Project  <span> Supervisor</span></h2>
                        <p>Mir Ripon </p>
						<p>Assistent Professor</p>
						<p>Department Of CSE</p>
						<p>Bangladesh University of Business and Technology</p>
            <br>

						<div class="footer-logo mr-50">
                        <a href="https://www.facebook.com/mir.ripon"><img src="img/sir.jpg" alt=""></a>

                        </div>

                            <a href="https://www.bubt.edu.bd/department/member_details/87" class="w3-btn w3-black"><font color="red">Read more</font></a>
                    </div>
                </div>


            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2> Project <span> Devlpoer</span></h2>
                        <p> Md.Riyajul Islam </p>
						<p>Id No:13142103090</p>
						<p>Intake:26th</p>
						<p>Section:02</p>
              <br>
						<div class="footer-logo mr-50">
                        <a href="https://www.facebook.com/riyajulislam.abir"><img src="img/abir.jpg" alt=""></a>
                        </div>

                    </div>
                </div>

                <!-- Newsletter Form -->
              <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-text mb-100">
                      <h2>Junior Project <span>Devlpoer</span></h2>
                      <p> Shakhawat Hossen Shoyeb </p>
          <p>Id No: 13142103059</p>
          <p>Intake: 26th</p>
          <p>Section: 02</p>
            <br>
          <div class="footer-logo mr-50">
                      <a href="https://www.facebook.com/shakhawathossen1112"><img src="img/skt.jpg" alt=""></a>
                    </div>

                </div>
            </div>
        </div>

      <!--  <div class="col-12 col-lg-6 col-xl-5">
          <div class="newsletter-text mb-100">
              <h2>@ Project <span>Devlpoer</span></h2>
              <p> Md.Riyajul Islam </p>
  <p>Id No:13142103090</p>
  <p>Intake:26th</p>
  <p>Section:02</p>
    <br>
  <div class="footer-logo mr-50">
              <a href="https://www.facebook.com/riyajulislam.abir"><img src="img/me.jpg" alt=""></a>


            </div>
        </div>
    </div> -->

    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                  <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-text mb-100">
                        <!-- Logo -->
                        <div class="footer-logo lg-100">
                          <h2><font color="white">Junior Project</font> <span><font color="yellow">Devlpoer</font></span></h2>
                         <p> MD.Kamrul Hasan  </p>
                         <p>Id No: 13142103123</p>
                         <p>Intake: 26th</p>
                         <p>Section:3</p>
                <br>
              <div class="footer-logo mr-50">
                          <a href="https://www.facebook.com/shakhawathossen1112"><img src="img/BUBT-Logo.png" alt=""></a>
                        </div>
                      </div>
                    </div>
                  </div>

                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">

                                      <!--  <li class="nav-item active">
                                          <a class="nav-link" href="index.php">Home</a>
                                        </li>
										 </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="main.php">Daily Transaction</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="home_company.php">Company</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="home_bill.php">Company Bill</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="home_employee.php">Employee</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="home_payment.php">Payment</a>
                                        </li>
										 </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="home_store.php">Store</a>
                                        </li> -->

                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>


</body>

</html>
