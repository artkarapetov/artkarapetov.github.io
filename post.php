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
        <title>Post Listing</title>
        <!-- Main style -->
        <link rel="stylesheet" href="css/doctor.style.css">
        <link href="http://demo.expertphp.in/css/dropzone.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <?php
        if (isset($_POST['add_data'])) {
            $title = strip_tags($_POST['title']);
            $name = strip_tags($_POST['name']);
            $email = strip_tags($_POST['email']);
            $location = strip_tags($_POST['location']);
            $price = strip_tags($_POST['price']);
            $link = strip_tags($_POST['link']);
            $facebook = strip_tags($_POST['facebook']);
            $twitter = strip_tags($_POST['twitter']);
            $date = date('Y-m-d');

            $query = "insert into listing (title, name, email, location, price, website_link, facebook, twitter, date) values ('$title', '$name', '$email', '$location', '$price', '$link', '$facebook', '$twitter', '$date')";
            mysqli_query($db, $query) or die(mysqli_error($db));
            $id = mysqli_insert_id($db);


            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];

            $path = "img/upload/" . $id . "profile" . $file_name;
            $imgName = $id . "profile" . $file_name;
            $d1 = compress($file_tmp, $path, 30);
            move_uploaded_file($d1, $path);

            $que = "update listing set path ='$imgName' where id='$id'";
            mysqli_query($db, $que) or die(mysqli_error($db));

            if (!empty($_FILES["gallery"]["tmp_name"])) {
                foreach ($_FILES['gallery']['name'] as $key => $array_value) {
                    if (!empty($_FILES["gallery"]["tmp_name"][$key])) {
                        $src1 = $_FILES["gallery"]["tmp_name"][$key];
                        $name1 = $_FILES["gallery"]["name"][$key];

                        $des1 = "img/upload/" . $id . "_" . $name1;
                        $d1 = compress($src1, $des1, 30);
                        move_uploaded_file($d1, $des1);

                        $que = "insert into image (listing_id, path) value ('$id', '$des1')";
                        mysqli_query($db, $que) or die(mysqli_error($db));
                    }
                }
            }

            $msg = 'test';
        }
        ?>

    </head>
    <body>
        <div id="rq-page-loading">
            <div class="rq-loading-icon"><i class="ion-load-c"></i></div>

        </div>
        <div id="main-wrapper">
            <header class="header">
                <div class="headroom-sticky sticky-scroll">
                    <nav class="navbar navbar-default">
                        <div class="container">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <?php include './header.php'; ?>
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </header> <!-- end header -->

            <div class="rq-page-content">
                <div class="rq-content-block">

                    <div class="rq-registration-content-single small-bottom-margin wow fadeIn" style="background: #fff;" data-wow-delay=".2s"> <!-- start of registration portion -->
                        <div class="container">
                            <div class="rq-login-form no-border">
                                <h4 style="color: #000">Post Listing Here</h4>
                                <?php if (!empty($msg)) {
                                    ?>
                                    <p class="successmsg">Your profile uploaded Successfully</p>
                                <?php }
                                ?>

                                <form class="form-horizontal" id="myform"  method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Title</label>
                                            <input type="text" name="title" class="rq-form-control reverse" placeholder="Write Title Here..." required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                            <input type="text" name="name" class="rq-form-control reverse" placeholder="Name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Email</label>
                                            <input type="email" name="email" class="rq-form-control reverse" placeholder="Email Address" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Campus</label>
                                            <select name="location" required="" class="category-option rq-form-control reverse">
                                                <option value="">Select Campus</option>
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
                                        <div class="col-md-6">
                                            <label>Price Range</label>
                                            <select name="price" required="" class="category-option rq-form-control reverse">
                                                <option value="">Select Price</option>
                                                <option value="$10 - $20">$10 - $20</option>
                                                <option value="$20 - $30">$20 - $30</option>
                                                <option value="$30 - $40">$30 - $40</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Website Link</label>
                                            <input type="text" name="link" class="rq-form-control reverse" placeholder="www.website.com" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Profile Picture</label>
                                            <input type="file"  name="file" accept="image/x-png,image/gif,image/jpeg" class="rq-form-control reverse" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Facebook Link</label>
                                            <input type="text" name="facebook" class="rq-form-control reverse" placeholder="http://www.facebook.com" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Twitter Link</label>
                                            <input type="text" name="twitter" class="rq-form-control reverse" placeholder="http://www.twitter.com" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Gallery Pictures</label>
                                            <input type="file" name="gallery[]" multiple="multiple" accept="image/x-png,image/gif,image/jpeg" class="rq-form-control reverse" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="register-button">
                                                <button type="submit" name="add_data" class="rq-btn rq-btn-primary border-radius signup">Submit <i class="arrow_right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                            </div> <!-- end of registration section -->
                            </form>
                        </div>
                    </div>
                </div><!--  end of registration form portin -->
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
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.sticky.js" type="text/javascript"></script>
    <script src="js/validate.js" type="text/javascript"></script>
    <script src="js/slick.js"></script>
    <script src="js/scripts.js" type="text/javascript"></script>
    <script src="http://demo.expertphp.in/js/dropzone.js"></script>
    <script>

        $(".signup").click(function () {
            if ($("#myform").valid()) {

            }
            else {

            }
        });

    </script>
</body>
</html>

