<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Campus Photo</title>
        <!-- Main style -->
        <link rel="stylesheet" href="css/doctor.style.css">
        <link rel="stylesheet" href="css/slick-theme.css">
        <link rel="stylesheet" href="css/slick.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="rq-page-loading">
            <div class="rq-loading-icon"><i class="ion-load-c"></i></div>
        </div>
        <div id="main-wrapper">
            <header class="header home-header"style="background: url('img/bg.jpg') top center no-repeat; background-size: cover;">
                <div class="header-overlay"></div>
                <div class="headroom-sticky home-page-menu">
                    <nav class="navbar navbar-default navbar-home">
                        <div class="container">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <?php include './header.php'; ?>


                        </div><!-- /.container-fluid -->
                    </nav>
                </div>

                <div class="header-body">
                    <div class="container">
                        <h1>Find a Student Headshot <span>Photographer at Your Campus</span></h1>
                        <!--                        <p class="wow fadeInUp">With more than 2,500 doctors, Scholar can provide the care you need. For help finding a doctor, call 646-929-7805.</p>-->
                        <div class="rq-search-wrapper">
                            <div class="rq-search-toggle">
                                <button class=" rq-btn rq-btn-primary rounded"><b class="ion-android-search"></b></button>
                            </div>
                            <form action="listing.php" method="get">
                                <div class="rq-search-container">
                                    <div class="rq-search-single">
                                        <div class="rq-search-content">
                                            <span class="rq-search-heading">Campus</span>
                                            <select name="location" class="category-option">
                                                <option value="">Select your Campus</option>
                                                <option value="Wilfrid Laurier University">Wilfrid Laurier University</option>
                                                <option value="University of Toronto Mississauga">University of Toronto Mississauga</option>
                                                <option value="University of Toronto Scarborough">University of Toronto Scarborough</option>
                                                <option value="University of Toronto St. George">University of Toronto St. George</option>
                                                <option value="University of Waterloo">University of Waterloo</option>
                                                <option value="Lakehead University">Lakehead University</option>
                                                <option value="York University">York University</option>
                                                <option value="University of British Columbia">University of British Columbia</option>
                                                <option value="Trent University">Trent University</option>
                                                <option value="Ryerson University">Ryerson University</option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="rq-search-single">
                                        <div class="rq-search-content last-child">
                                            <span class="rq-search-heading">Price Range</span>
                                            <select name="price" class="category-option">
                                                <option value="$10 - $20">$10 - $20</option>
                                                <option value="$20 - $30">$20 - $30</option>
                                                <option value="$30 - $40">$30 - $40</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="rq-search-single search-btn">
                                        <div class="rq-search-content">
                                            <button class="rq-btn rq-btn-primary fluid-btn" type="submit">Search <i class="arrow_right"></i></button>
                                        </div>
                                    </div>

                                </div> <!-- / .search-container -->
                            </form>
                        </div>
                    </div>
                </div> <!-- /.header-body -->
            </header> <!-- end header -->

            <div class="rq-page-content">
                <div class="rq-content-block">
                    <div class="container">
                        <div class="rq-title-container text-center">
                            <h2 class="rq-title">What is Campus Photo?</h2>
                            <p class="rq-subtitle">Campus Photo helps you find a professional, affordable student photographer at your campus!</p>
                        </div>
                        <div class="rq-interested-category">
                            <div class="row">
                                <div class="col-md-4 col-sm-4">
                                    <div class="rq-category-single" >
                                        <h1 class="rq-block-intro"><i class="fa fa-check" aria-hidden="true"></i></h1>
                                        <h4 class="rq-feature-title">Speed</h4>
                                        <p class="rq-feature-desc">Quickly find professional photographers at your campus, without messaging countless people on Facebook.</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="rq-category-single" >
                                        <h1 class="rq-block-intro">$10-$40</h1>
                                        <h4 class="rq-feature-title">Affordable Price</h4>
                                        <p class="rq-feature-desc">Our student photographers don't charge an arm and a leg for a headshot.</p>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="rq-category-single" >
                                        <h1 class="rq-block-intro">$</h1>
                                        <h4 class="rq-feature-title">Earn Money</h4>
                                        <p class="rq-feature-desc">Are you a student photographer? If so, you can list your services and get more exposure at your campus! </p>
                                    </div>
                                </div>
                            </div>
                            <div class="rq-learn-more"><a href="listing.php" class="rq-btn rq-btn-primary lr-big-padding capitalized">Find a Photographer</a></div>
                        </div> <!-- /.rq-interested-category -->
                    </div>
                </div> <!-- /.rq-content-block category -->


                <div class="rq-content-block" style="background: #f9f9f9">
                    <div class="rq-title-container text-center">
                        <h2 class="rq-title"><i class="ion-ios-location-outline"></i> Find a photographer by Campus </h2>
                    </div>
                    <div class="rq-doctor-finding-list">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="rq-finding-list-single" >

                                        <ul>
                                            <li><a href="listing.php?location=Wilfrid Laurier University">Wilfrid Laurier University </a></li>
                                            <li><a href="listing.php?location=University of Toronto Mississauga">University of Toronto Mississauga </a></li>
                                            <li><a href="listing.php?location=University of Toronto Scarborough">University of Toronto Scarborough</a></li>
                                            <li><a href="listing.php?location=University of Toronto St. George">University of Toronto St. George </a></li>

                                            <li><a href="listing.php?location=University of Waterloo">University of Waterloo</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="rq-finding-list-single" >
                                        <!--                                        <h3><i class="ion-ios-location-outline"></i>by specialty</h3>-->
                                        <ul>
                                            <li><a href="listing.php?location=Lakehead University">Lakehead University</a></li>
                                            <li><a href="listing.php?location=York University">York University </a></li>
                                            <li><a href="listing.php?location=University of British Columbia">University of British Columbia</a></li>
                                            <li><a href="listing.php?location=Trent University">Trent University</a></li>
                                            <li><a href="listing.php?location=Ryerson University">Ryerson University </a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="rq-content-block with-bg-img">

                    <div class="rq-block-overlay"></div>
                    <div class="testimonial-wrapper">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="rq-title-container">
                                    <p class="rq-subtitle-top">testimonials</p>
                                    <h2 class="rq-title large">What students say</h2>
                                </div>
                                <div class="rq-testimonial-counts">
                                    <h1>50+</h1>
                                    <p>Students already found their <br> headshot photographer!</p>
                                </div>
                            </div>
                            <div class="col-sm-9">

                                <div class="rq-testimonial-content slick">
                                    <div>
                                        <div class="rq-testimonial-single">
                                            <div class="testimonial-image" style="background:url('img/test1.jpg') center center no-repeat; background-size: cover;"></div>
                                            <a class="author-name" href="#">Jennifer Kingley</a>
                                            <p class="testimonial-content">Campus Photo provides an easy way to search for a reputable photographer at your campus. I'm extremely happy with the headshot! Now my LinkedIn profile is ready for internship applications!

</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="rq-testimonial-single">
                                            <div class="testimonial-image" style="background:url('img/test2.jpg') center center no-repeat; background-size: cover;"></div>
                                            <a class="author-name" href="#">Tanner Smith</a>
                                            <p class="testimonial-content">Thanks to Campus Photo I now have a headshot. As a student I don't have unlimited funds for expensive photographers, so I'm glad I finally found Campus Photo! Got my photo taken for $30, that's just great.</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div> <!-- /.rq-content-block feature company -->



            </div> <!-- /.page-content -->
        </div> <!-- end #main-wrapper -->

        <?php include './footer.php'; ?>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/fitvids.min.js" type="text/javascript"></script>
        <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
        <script src="js/masonry.pkgd.min.js" type="text/javascript"></script>
        <script src="js/selectize.min.js"></script>
        <script src="js/jquery.sticky.js" type="text/javascript"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/owl-carousel.js"></script>
        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/jquery.mCustomScrollbar.min.js"></script>
        <script src="js/slick.js"></script>
        <script src="js/scripts.js" type="text/javascript"></script>
    </body>
</html>