<?php
    session_start();
    require_once('backend/../../db_connect.php');
    if(!$_SESSION['auth_id']){
        header('location: backend/../opps.php');
    }
    $explode_page_name = explode('/',$_SERVER['PHP_SELF']);
    $page_name = end($explode_page_name);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/plugins/pace/pace.css" rel="stylesheet">
    <!-- Font Awsome CDN Link -->
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css" />

    
    <!-- Theme Styles -->
    <link href="assets/css/main.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="#">
                        <?php
                            $id = $_SESSION['auth_id'];
                            $auth_image_query = "SELECT profile_pic FROM `admins` WHERE id='$id'";
                            $auth_image_query_db = mysqli_query($db_connect, $auth_image_query);
                            $profile_pic_name = mysqli_fetch_assoc($auth_image_query_db)['profile_pic'];
                        ?>
                        <img src="backend/../uploads/profile_pic/<?=$profile_pic_name?>">
                        <span class="activity-indicator"></span>
                        <span class="user-info-text">Chloe<br><span class="user-state-info">On a call</span></span>
                    </a>
                </div>
            </div>
            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Apps
                    </li>
                    <li class="<?=($page_name == 'dashboard.php' ? 'active-page' : '')?>">
                        <a href="backend/../dashboard.php" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>
                    <li class="<?=($page_name == 'profile.php' ? 'active-page' : '')?>">
                        <a href="backend/../profile.php" class="active"><i class="material-icons-two-tone">account_circle</i>Profile</a>
                    </li>
                    <li class="<?=($page_name == 'service_add.php' || $page_name == 'service_list.php' ? 'active-page' : '')?>">
                        <a href=""><i class="material-icons-two-tone">manage_accounts</i>Service<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?=($page_name == 'service_add.php' ? 'active' : '')?>" href="backend/../service_add.php">Service Add</a>
                            </li>
                            <li>
                                <a class="<?=($page_name == 'service_list.php' ? 'active' : '')?>" href="backend/../service_list.php">Service List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?=($page_name == 'portfolio_add.php' || $page_name == 'portfolio_list.php' ? 'active-page' : '')?>">
                        <a href=""><i class="material-icons-two-tone">summarize</i>Portfolio<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?=($page_name == 'portfolio_add.php' ? 'active' : '')?>" href="backend/../portfolio_add.php">Portfolio Add</a>
                            </li>
                            <li>
                                <a class="<?=($page_name == 'portfolio_list.php' ? 'active' : '')?>" href="backend/../portfolio_list.php">Portfolio List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?=($page_name == 'fact_add.php' || $page_name == 'fact_list.php' ? 'active-page' : '')?>">
                        <a href=""><i class="material-icons-two-tone">ad_units</i>Fact<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?=($page_name == 'fact_add.php' ? 'active' : '')?>" href="backend/../fact_add.php">Fact Add</a>
                            </li>
                            <li>
                                <a class="<?=($page_name == 'fact_list.php' ? 'active' : '')?>" href="backend/../fact_list.php">Fact List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?=($page_name == 'testimonial_add.php' || $page_name == 'testimonial_list.php' ? 'active-page' : '')?>">
                        <a href=""><i class="material-icons-two-tone">manage_accounts</i>Testimonial<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?=($page_name == 'testimonial_add.php' ? 'active' : '')?>" href="backend/../testimonial_add.php">Testimonial Add</a>
                            </li>
                            <li>
                                <a class="<?=($page_name == 'testimonial_list.php' ? 'active' : '')?>" href="backend/../testimonial_list.php">Testimonial List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?=($page_name == 'brand_add.php' || $page_name == 'brand_list.php' ? 'active-page' : '')?>">
                        <a href=""><i class="material-icons-two-tone">ad_units</i>Brand<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?=($page_name == 'brand_add.php' ? 'active' : '')?>" href="backend/../brand_add.php">Brand Add</a>
                            </li>
                            <li>
                                <a class="<?=($page_name == 'brand_list.php' ? 'active' : '')?>" href="backend/../banner_list.php">Brand List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?=($page_name == 'banner_add.php' || $page_name == 'banner_list.php' ? 'active-page' : '')?>">
                        <a href=""><i class="material-icons-two-tone">summarize</i>Banner<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?=($page_name == 'banner_add.php' ? 'active' : '')?>" href="backend/../banner_add.php">Banner Add</a>
                            </li>
                            <li>
                                <a class="<?=($page_name == 'banner_list.php' ? 'active' : '')?>" href="backend/../banner_list.php">Banner List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?=($page_name == 'education_add.php' || $page_name == 'education_list.php' ? 'active-page' : '')?>">
                        <a href=""><i class="material-icons-two-tone">school</i>Education<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?=($page_name == 'education_add.php' ? 'active' : '')?>" href="backend/../education_add.php">Education Add</a>
                            </li>
                            <li>
                                <a class="<?=($page_name == 'education_list.php' ? 'active' : '')?>" href="backend/../education_list.php">Education List</a>
                            </li>
                            <li>
                                <a class="<?=($page_name == 'education_image_add.php' ? 'active' : '')?>" href="backend/../education_image_add.php">Education Image Add</a>
                            </li>
                            <li>
                                <a class="<?=($page_name == 'education_image_list.php' ? 'active' : '')?>" href="backend/../education_image_list.php">Education Image List</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons">add</i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                                        <li><a class="dropdown-item" href="#">New Workspace</a></li>
                                        <li><a class="dropdown-item" href="#">New Board</a></li>
                                        <li><a class="dropdown-item" href="#">Create Project</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons-outlined">explore</i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-lg large-items-menu" aria-labelledby="exploreDropdownLink">
                                        <li>
                                            <h6 class="dropdown-header">Repositories</h6>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune iOS
                                                    <span class="badge badge-warning">1.0.2</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune Android
                                                    <span class="badge badge-info">dev</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-btn-item d-grid">
                                            <button class="btn btn-primary">Create new repository</button>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
            
                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item hidden-on-mobile">
                                    <a class="btn btn-info" target="_blank" href="fontend/../../fontend/index.php">Visit Site</a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="btn btn-danger" href="backend/../auth/logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container">