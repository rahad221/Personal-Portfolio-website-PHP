<?php
    session_start();
    require_once('../db_connect.php');
?>
<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Kufa - Personal Portfolio HTML5 Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Place favicon.ico in the root directory -->
        <!-- Font Awsome CDN Link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<!-- CSS here -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/aos.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="index.html" class="navbar-brand logo-sticky-none"><img src="img/logo/logo.png" alt="Logo"></a>
                                    <a href="index.html" class="navbar-brand s-logo-none"><img src="img/logo/s_logo.png" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index-2.html">
                        <img src="img/logo/logo.png" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p>123/A, Miranda City Likaoli
                            Prikano, Dope</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p>+0989 7876 9865 9</p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p>info@example.com</p>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <?php
                            $banner_query = "SELECT * FROM `banner` WHERE `banner_status` = 'Active' ORDER BY id DESC LIMIT 1";
                            $banner_query_db = mysqli_query($db_connect, $banner_query);
                            foreach($banner_query_db as $banner) : ?>
                            <div class="col-xl-7 col-lg-6">
                                <div class="banner-content">
                                    <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                                    <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <?=$banner['banner_name']?></h2>
                                    <p class="wow fadeInUp" data-wow-delay="0.6s">I'm <?=$banner['banner_name']?>, <?=$banner['banner_descrtiption']?></p>
                                    <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                        <ul>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        </ul>
                                    </div>
                                    <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                                <div class="banner-img text-right">
                                    <img src="../backend/uploads/banner_image/<?=$banner['banner_image']?>" alt="" height="500px" width="500px">
                                </div>
                            </div>
                        <?php
                            endforeach
                        ?>
                    </div>
                </div>
                <div class="banner-shape"><img src="img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                    <?php
                                $education_query = "SELECT * FROM `educations` WHERE `education_status` = 'Active' ORDER BY id DESC LIMIT 1";
                                $education_query_db = mysqli_query($db_connect, $education_query);

                                foreach($education_query_db as $education) : ?>
                                <div class="col-lg-6">
                                    <div class="about-img">
                                        <img src="../backend/uploads/education_image/<?=$education['education_image']?>" title="me-01" alt="me-01">
                                    </div>
                                </div>
                                <div class="col-lg-6 pr-90">
                                    <div class="section-title mb-25">
                                        <span>Introduction</span>
                                        <h2>About Me</h2>
                                    </div>
                                <div class="about-content">
                                <p><?=$education['education_description']?></p>
                                <h3>Education:</h3>
                            </div>
                            <?php
                                endforeach
                            ?>
                        
                            
                            
                            <!-- Education Item -->
                            <?php
                            $course_query = "SELECT * FROM `course` WHERE `course_status` = 'Active' ORDER BY id DESC LIMIT 4";
                            $course_query_db = mysqli_query($db_connect, $course_query);
                            foreach($course_query_db as $course) : ?>
                            <div class="education">
                                <div class="year"><?=$course['course_Year']?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?=$course['course_name']?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?=$course['course_percent']?>%;" aria-valuenow="<?=$course['course_percent']?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                endforeach
                            ?>
                                
                            <!-- End Education Item -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <?php
                            $service_query = "SELECT * FROM `service` WHERE `service_status` = 'Active' ORDER BY id DESC LIMIT 6";
                            $service_query_db = mysqli_query($db_connect, $service_query);
                            
                            foreach($service_query_db as $service) : ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                    <i class="<?=$service['service_icon']?>"></i>
                                    <h3><?=$service['service_title']?></h3>
                                    <p>
                                    <?=$service['service_description']?>
                                    </p>
                                </div>
                            </div>
                        <?php
                            endforeach
                        ?>
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            $portfolio_query = "SELECT * FROM `portfolio` WHERE `portfolio_status` = 'Active' ORDER BY id DESC LIMIT 3";
                            $portfolio_query_db = mysqli_query($db_connect, $portfolio_query);

                            foreach($portfolio_query_db as $portfolio) : ?>
                            <div class="col-lg-4 col-md-6 pitem">
                                <div class="speaker-box">
                                    <div class="speaker-thumb">
                                        <img src="../backend/uploads/portfolio_image/<?=$portfolio['portfolio_image']?>" alt="img">
                                    </div>
                                    <div class="speaker-overlay">
                                        <span><?=$portfolio['portfolio_title']?></span>
                                        <h4><a href="portfolio-single.php"><?=$portfolio['portfolio_header']?></a></h4>
                                        <a href="portfolio-single.php" class="arrow-btn"><?=$portfolio['portfolio_description']?><span></span></a>
                                    </div>
                                </div>
                            </div>
                        <?php
                            endforeach
                        ?>
                    </div>
                </div>
            </section>
            <!-- services-area-end -->


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            <?php
                               $fact_query = "SELECT * FROM `fact` WHERE `fact_status` = 'Active' ORDER BY id DESC LIMIT 4"; 
                               $fact_query_db = mysqli_query($db_connect, $fact_query);

                               foreach($fact_query_db as $fact) : ?>
                                <div class="col-xl-2 col-lg-3 col-sm-6">
                                    <div class="fact-box text-center mb-50">
                                        <div class="fact-icon">
                                            <i class="<?=$fact['feature_icon']?>"></i>
                                        </div>
                                        <div class="fact-content">
                                            <h2><span class="count"><?=$fact['feature_value']?></span></h2>
                                            <span><?=$fact['feature_text']?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                endforeach
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <?php
                             $testimonial_query = "SELECT * FROM `testimonial` WHERE `t_status` = 'Active' ORDER BY id DESC LIMIT 1"; 
                             $testimonial_query_db = mysqli_query($db_connect, $testimonial_query);

                            foreach ($testimonial_query_db as $testimonial)  : ?>
                            <div class="col-xl-9 col-lg-10">
                                <div class="testimonial-active">
                                    <div class="single-testimonial text-center">
                                        <div class="testi-avatar">
                                            <img src="../backend/uploads/testimonial_image/<?=$testimonial['t_image']?>" alt="image" height="150px" width="150px">
                                        </div>
                                        <div class="testi-content">
                                            <h4><span>“</span><?=$testimonial['t_decs']?><span>”</span></h4>
                                            <div class="testi-avatar-info">
                                                <h5><?=$testimonial['t_head']?></h5>
                                                <span><?=$testimonial['t_title']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-testimonial text-center">
                                        <div class="testi-avatar">
                                            <img src="../backend/uploads/testimonial_image/<?=$testimonial['t_image']?>" alt="img" height="150px" width="150px">
                                        </div>
                                        <div class="testi-content">
                                            <h4><span>“</span></span><?=$testimonial['t_decs']?><span>”</span></h4>
                                            <div class="testi-avatar-info">
                                                <h5><?=$testimonial['t_head']?></h5>
                                                <span><?=$testimonial['t_title']?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>      
                        <?php
                            endforeach
                        ?>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        <?php
                            $brand_query = "SELECT * FROM `brand` WHERE `brand_status` = 'Active' ORDER BY id DESC LIMIT 5"; 
                            $brand_query_db = mysqli_query($db_connect, $brand_query);

                            foreach($brand_query_db as $brand) : ?>
                            <div class="col-xl-2">
                                <div class="single-brand">
                                    <img src="../backend/uploads/brand_image/<?=$brand['brand_image']?>" alt="img" height="100px" width="100px">
                                </div>
                            </div>
                        <?php
                            endforeach
                        ?>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                                <h5>OFFICE IN <span>NEW YORK</span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span>Event Center park WT 22 New York</li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span>+9 125 645 8654</li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span>info@exemple.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="../../IAWD-2201/backend/contract.php" method="POST">
                                    <input type="text" class="<?=(isset($_SESSION['name_error'])) ? 'is-invalid' : ''?>" placeholder="your name *" name="name" value="<?=(isset($_SESSION['old_name'])) ? $_SESSION['old_name'] : ''?>">
                                    <?php
                                        if(isset($_SESSION['name_error'])){ ?>
                                            <p class="text-danger"><?=$_SESSION['name_error'] ?></p>
                                    <?php
                                        }
                                        unset($_SESSION['name_error']);
                                    ?>
                                    <input type="text" class="<?=(isset($_SESSION['email_error'])) ? 'is-invalid' : ''?> placeholder="your email *" name="email" value="<?=(isset($_SESSION['old_email'])) ? $_SESSION['old_email'] : ''?>">
                                    <?php
                                        if(isset($_SESSION['email_error'])){ ?>
                                            <p class="text-danger"><?=$_SESSION['email_error'] ?></p>
                                    <?php
                                        }
                                        unset($_SESSION['email_error']);
                                    ?>
                                    <textarea name="message" class="<?=(isset($_SESSION['message_error'])) ? 'is-invalid' : ''?>" id="message" placeholder="your message *" name="message"></textarea>
                                    <?php
                                        if(isset($_SESSION['message_error'])){ ?>
                                            <p class="text-danger"><?=$_SESSION['message_error'] ?></p>
                                    <?php
                                        }
                                        unset($_SESSION['message_error']);
                                    ?>
                                    <button class="btn">SEND</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->





		<!-- JS here -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/one-page-nav-min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:28:17 GMT -->
</html>
