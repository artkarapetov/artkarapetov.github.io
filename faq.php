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

            <div class="rq-page-content forbgimage">
                <div class="rq-content-block pd0">

                    <div class="rq-registration-content-single small-bottom-margin wow fadeIn forbgcolor" data-wow-delay=".2s"> <!-- start of registration portion -->
                        <div class="container">
                            <div class="rq-login-form no-border mg0">
                                <h4>FREQUENTLY ASKED QUESTIONS</h4>
                               
                  <!----PLACE ACCORDIAN HERE------------->
							<!--<h1>fbdbb</h1>-->
				  
				  
				  
                        </div>
                    </div>
                </div><!--  end of registration form portin -->
            </div>
			<div class="faqsection">
				<div class="container">
				<!--<h2 class="mg0">Top 10 Questions:</h2>-->
				<div class="tab" data-id="1">
                    <h2>I'm a Photographer. How can I post an ad? <i class="fa fa-chevron-down" aria-hidden="true"></i></h2> 
                    <div class="tabs" id="tab1">
                        <p>Click the "Post an Ad" button in the menu. There you will be able to link to your portfolio, social media, etc. as well as include your portfolio photos. We suggest uploading at least 3 to showcase your work to potential clients. 
</p>
                    </div>
                </div>
				<div class="tab" data-id="2">
                    <h2> Are you affiliated with the universities/colleges? 
 <i class="fa fa-chevron-down" aria-hidden="true"></i></h2> 
                    <div class="tabs" id="tab2">
                        <p>Nope! Our goal is to have a database of headshot photographers, we do not work directly with any of the institutions. </p>
                    </div>
                </div>
				<div class="tab" data-id="3">
                    <h2> Can you add my university/college? It's not listed here.<i class="fa fa-chevron-down" aria-hidden="true"></i></h2> 
                    <div class="tabs" id="tab3">
                        <p>We just launched in KW area, however if we get enough requests for other universities we will make sure to add them ASAP! Email us at campus@photo.ca
</p>
                    </div>
                </div>
				<div class="tab" data-id="4">
                    <h2> Do the photographers on the website take other photos besides headshots? 
 <i class="fa fa-chevron-down" aria-hidden="true"></i></h2> 
                    <div class="tabs" id="tab4">
                        <p>It depends on the photographer! Campus Photo was made specifically to solve the problem students have at university and college campuses: finding a reputable headshot photographer for their LinkedIn profile photo, actor headshot, etc. You are free to contact the photographers on our website and ask if they do other types of photography as well!</p>
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
