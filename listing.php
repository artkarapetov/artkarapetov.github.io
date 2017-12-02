<?php
ob_start();
include './setting/mysql_db.php';
include './setting/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Find a Photographer</title>
        <!-- Main style -->
        <link rel="stylesheet" href="css/doctor.style.css">
        <link rel="stylesheet" href="css/slick-theme.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/doctor.style.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div id="main-wrapper">
            <header class="header">
                <div class="headroom-sticky sticky-scroll">
                    <nav class="navbar navbar-default">
                        <div class="container">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <?php include './header.php';
                            ?>
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </header> <!-- end header -->
            <div class="rq-page-content"> <!-- start page content -->
                <div class="rq-content-block rq-sidebar-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-8 col-md-push-3">
                                <h3 class="rq-title-secondary no-extra-style">Listing Page</h3>

                                <div class="rq-listing-items"> <!-- start listing portion -->
                                    <?php
                                    $query = "select * from listing where";
                                    if (!empty($_GET['location'])) {
                                        $location = $_GET['location'];
                                        $query.= " location like '$location'";
                                        if (!empty($_GET['price'])) {
                                            $query.=" and";
                                        }
                                    }
                                    if (!empty($_GET['price'])) {
                                        $price = $_GET['price'];
                                        $query.=" price like '$price' order by id DESC";
                                    }
                                    if (empty($_GET['price']) && empty($_GET['location'])) {
                                        $query = "select * from listing order by id DESC";
                                    }
                                    $data = mysqli_query($db, $query) or die(mysqli_error($db));
                                    while ($result = mysqli_fetch_array($data)) {
                                        ?>
                                        <div class="litmes ow fadeIn" data-wow-delay="0s">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="col-sm-2 rq-image-rounded">
                                                        <div class="user"<?php if (!empty($result['path'])) { ?> style="background: url(img/upload/<?php echo $result['path'] ?>)" <?php } else { ?> style="background: url(img/listing1.jpg)" <?php } ?>></div>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <h4 class="rq-listing-item-title"><a href="#"><?php echo $result['title'] ?></a></h4>
                                                        <div class="rq-listing-reviews clearfix">
                                                            <span><i class="ion-ios-location-outline"></i> <?php echo $result['location']; ?></span><span><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo $result['name'] ?></span><span><i class="fa fa-credit-card" aria-hidden="true"></i> <?php echo $result['price'] ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="slick1">
                                                        <?php
                                                        $id = $result['id'];
                                                        $data1 = mysqli_query($db, "select * from image where listing_id=$id") or die(mysqli_error($db));
                                                        while ($result1 = mysqli_fetch_array($data1)) {
                                                            ?>
                                                            <img src="<?php echo $result1['path'] ?>">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="col-sm-5">
                                                        <p class="color"><span><i class="fa fa-envelope-o" aria-hidden="true"></i> Contact:</span> <a href="mailto:<?php echo $result['email'] ?>"><?php echo $result['email'] ?></a></p>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <p class="color"><span><i class="fa fa-external-link" aria-hidden="true"></i> View Portfolio:</span> <a href="http://<?php echo $result['website_link'] ?>" target="_blank"><?php echo $result['website_link'] ?></a></p>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <ul class="list-unstyled social-list">
                                                            <li><a href="<?php echo $result['facebook'] ?>" target="_blank"><img src="img/fb.png"></a></li>
                                                            <li><a href="<?php echo $result['twitter'] ?>" target="_blank"><img src="img/tw.png"></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    if (mysqli_num_rows($data) == 0) {
                                        ?>
                                        <h3 class="rq-title-secondary no-extra-style" style="text-align: center; text-transform: initial;margin-top: 100px">No Result Found! Sorry</h3>
                                        <?php
                                    }
                                    ?>

                                </div> <!-- end listing portion 
                                <div class="rq-pagination only-next-prev"> <!-- start pagination 
                                    <ul class="rq-pagination-list">
                                        <li class="active"><a href="#">Prev</a></li>
                                        <li><a href="#">Next</a></li>
                                    </ul>
                                </div> <!-- end pagination -->
                            </div>
                            <div class="col-md-3 rq-search-sidebar  with-breadecrumb col-md-pull-9">
                                <form action="listing.php" method="get">
                                    <div class="rq-listing-sidebar">
                                        <div class="rq-listing-search">
                                            <h3 class="rq-title-secondary no-extra-style">Search for a Photographer</h3>
                                            <div class="rq-search-content">
                                                <?php
                                                if (!empty($_GET['location'])) {
                                                    $slocation = $_GET['location'];
                                                } else {
                                                    $slocation = '';
                                                }
                                                ?>
                                                <select name="location" class="category-option">
                                                    <option value="">Select Campus</option>
                                                    <option value="Wilfrid Laurier University" <?php
                                                            if ($slocation == 'Wilfrid Laurier University') {
                                                                echo 'selected';
                                                            }
                                                            ?>>Wilfrid Laurier University</option>
                                                    <option value="University of Toronto Mississauga" <?php
                                                    if ($slocation == 'University of Toronto Mississauga') {
                                                        echo 'selected';
                                                    }
                                                    ?>>University of Toronto Mississauga</option>
                                                    <option value="University of Toronto Scarborough" <?php
                                                    if ($slocation == 'University of Toronto Scarborough') {
                                                        echo 'selected';
                                                    }
                                                    ?>>University of Toronto Scarborough</option>
                                                    <option value="University of Toronto St. George" <?php
                                                            if ($slocation == 'University of Toronto St. George') {
                                                                echo 'selected';
                                                            }
                                                            ?>>University of Toronto St. George</option>
                                                    <option value="University of Waterloo" <?php
                                                    if ($slocation == 'University of Waterloo') {
                                                        echo 'selected';
                                                    }
                                                    ?>>University of Waterloo</option>
                                                    <option value="Lakehead University" <?php
                                                    if ($slocation == 'Lakehead University') {
                                                        echo 'selected';
                                                    }
                                                    ?>>Lakehead University</option>
                                                    <option value="York University" <?php
                                                            if ($slocation == 'York University') {
                                                                echo 'selected';
                                                            }
                                                    ?>>York University</option>
                                                    <option value="University of British Columbia" <?php
                                                            if ($slocation == 'University of British Columbia') {
                                                                echo 'selected';
                                                            }
                                                    ?>>University of British Columbia</option>
                                                    <option value="Trent University" <?php
                                                            if ($slocation == 'Trent University') {
                                                                echo 'selected';
                                                            }
                                                    ?>>Trent University</option>
                                                    <option value="Ryerson University" <?php
                                                               if ($slocation == 'Ryerson University') {
                                                                   echo 'selected';
                                                               }
                                                    ?>>Ryerson University</option>
                                                </select>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="rq-listing-sidebar">
                                        <h3 class="rq-title-secondary no-extra-style">Price</h3>
                                        <div class="rq-search-content">
                                            <ul class="nav">
                                                <li>
                                                    <?php if(!empty($_GET['price'])){
                                                        $sprice = $_GET['price'];
                                                    } 
                                                    else{
                                                        $sprice = '';
                                                    }
?>
                                                    <span class="s">
                                                        <input type="radio" name="price" <?php
                                                               if ($sprice == '$10 - $20') {
                                                                   echo 'checked';
                                                               }
                                                    ?> value="$10 - $20" id="class-a-cat">
                                                        <label style="cursor: pointer" for="class-a-cat">$10 - $20</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="">
                                                        <input type="radio" name="price" <?php
                                                               if ($sprice == '$20 - $30') {
                                                                   echo 'checked';
                                                               }
                                                    ?> value="$20 - $30" id="class-b-cat2">
                                                        <label style="cursor: pointer" for="class-b-cat2">$20 - $30</label>
                                                    </span>
                                                </li>
                                                <li>
                                                    <span class="">
                                                        <input type="radio" name="price" <?php
                                                               if ($sprice == '$30 - $40') {
                                                                   echo 'checked';
                                                               }
                                                    ?> value="$30 - $40" id="class-b-cat3">
                                                        <label style="cursor: pointer" for="class-b-cat3">$30 - $40</label>
                                                    </span>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="rq-listing-sidebar">
                                        <button type="submit" class="rq-btn rq-btn-primary fluid-btn">Filter <i class="arrow_right"></i></button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
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
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/slick.js"></script>
        <script src="js/scripts.js" type="text/javascript"></script>
    </body>
</html>
