<?php include_once 'db_info.php'; ?>
<?php session_start() ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>লাইফ চেইঞ্জিং বাণী</title>
    <link rel="shortcur icon" href="img/bani.png" type="image/icon">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link href="css/mdb.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/css/tether.min.css">
    <link rel='stylesheet' href='css/font-awesome.min.css'>
    <link href="css/themify-icons.css" rel="stylesheet" />
    <!-- Animate.css library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/demo.css" rel="stylesheet">
    <!-- <script src="js/demo.js"></script> -->
    <script type="text/javascript">
    $(document).on("scroll", function() {
        if ($(document).scrollTop() > 80) {
            $("header").removeClass("large").addClass("small");

        } else {
            $("header").removeClass("small").addClass("large");
        }
    });
    </script>
</head>

<body>
    <header class="large">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index">“লাইফ চেইঞ্জিং বাণী”</a>
                </div>
                <div class="collapse navbar-collapse pull-right" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="menu1"><a href="index">নীড়পাতা</a></li>
                        <li class="menu2"><a href="all-quotes">সকল বানীসমুহ</a></li>
                        <li class="active menu3">
                            <a href="all-authors">লেখক তালিকা</a>
                        </li>
                        <li class="menu4"><a href="latest-quotes">জনপ্রিয় বাণী</a></li>
                        <li class="menu5"><a href="all-tags">সকল ট্যাগ</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <section id="all-authors">
                <div class="quote-div">
                    <h1 class="text-center">সকল লেখক</h1>
                    <div class="hr-lines">
                        <div class="hr1"></div>
                        <div class="hr2"></div>
                    </div>
                    <div class="container text-center">
                        <div class="row">
                            <?php

            $sql="SELECT authors.id AS a_id,authors.name,authors.birth,authors.death,authors.description,authors.icon,authors.app_id,quotes.id AS q_id,quotes.quote,quotes.author_id FROM authors INNER JOIN quotes
WHERE quotes.author_id=authors.id AND app_id=1 GROUP BY authors.name ORDER BY RAND()";


$result = $conn->query($sql);

if ($result->num_rows > 0 ) {

while ($row = $result -> fetch_assoc()) {

$x= $row['q_id'];
?>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 quote-thumbnail">
                                    <a href="personal-page?id=<?php echo $row['a_id']; ?>">
                                        <div class="hover ehover1">
                                            <img src=" <?php echo $row['icon']; ?>" all="blank" />
                                            <div class="overlay">
                                            </div>
                                        </div>
                                        <div class="thumbnail text-center">
                                            <div class="caption">
                                                <div class="birth">
                                                    <p class="text-justify"> জন্ম
                                                        <?php echo $row['birth']?> সাল </p>
                                                    <p>-</p>
                                                    <p class="text-justify"> মৃত্যু
                                                        <?php echo $row['death']?> সাল </p>
                                                </div>
                                                <h3 class="card-title"><?php echo $row['name']; ?></h3>
                                                <div class="hr3"></div>
                                                <div id="quote-show">
                                                    <!-- <p>“</p> -->
                                                    <h5 class="text-center"><?php echo $row['quote'] ?>  </h5>
                                                    <!-- <p>”</p> -->
                                                </div>
                                                <!-- <div class="clearfix"></div> -->
                                                <div class="tags">
                                                    <p>ট্যাগঃ </p>
                                                    <?php


                $sql2="SELECT * FROM tags WHERE tags.id IN (SELECT tag_id FROM tag_maps WHERE quote_id= $x)";


            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0 ) {

            while ($row = $result2 -> fetch_assoc()) {


            ?>
                                                        <a href="tags?id=<?php echo $row['id']; ?>" "><span class="label label-primary "><?php echo $row['name']; ?></span></a>
                                                        <?php
                                    }
                                }
                                     ?>
                                                </div>
                                                <script type="text/javascript ">
                                                $(document).ready(function() {
                                                    $('.once').on('click', function() {
                                                        $(this).removeClass('not-liked').addClass('liked');
                                                    });
                                                });
                                                </script>
                                                <div class="clearfix "></div>
                                            </div>
                                        </div>
                                        <!-- thumbnail ends -->
                                    </a>
                                </div>
                                <!-- col-lg-4 col-md-4 col-sm-4 col-xs-12 quote-thumbnail -->
                                <?php
                                    }
                            }
                            ?>
                                    <div class="clearfix "> </div>
                                    <div class="margin-top2 "></div>
                                    <div>
                                    </div>
                                    <!-- row ends -->
                        </div>
                        <!-- container text-center ends -->
                    </div>
</div>
            </section>
            </div>
            <!-- row ends -->
        </div>
        <!-- container ends -->
       <footer>
    <div class="container ">
        <div class="footer-area ">
            <div class="col-md-3 "></div>
            <div class="col-md-6 ">
                <section id="tags ">
                    <div class="tags-area ">
                        <div class="text-center ">
                            <h5>সাম্প্রতিক ট্যাগ</h5>
                        </div>
                        <div class="clearfix "></div>
                        <ul class="list-inline all-tags ">

            <?php
            $sql3="SELECT tags.id,tags.name AS t_name,tags.app_id FROM tags WHERE app_id=1 ORDER BY RAND() LIMIT 5 ";
            $result = $conn->query($sql3);

            if ($result->num_rows > 0 ) {

            while ($row = $result -> fetch_assoc()) {
            ?>

            <li class="list-group-item tags-list "><a href="tags?id=<?php echo $row[ 'id']; ?>">#
                                                        <?php echo $row['t_name']; ?>
                                    </a>
                                    </li>
                                    <?php
              }
            }
            $conn->close();
            ?>
                                        </ul>
                                        <!-- list-inline ends -->
                                        </div>
                                        <!-- tag-area ends -->
            </section>
            <!-- tags section ends -->
            </div>
            <div class="col-md-3 "></div>
            </div>
            </div>
            </footer>
            <section id="scroll-top">
                <div class="scroll-top-wrapper">
                    <span class="scroll-top-inner">
                <i class="fa fa-2x fa fa-angle-double-up"></i>
            </span>
                    <!-- /.end of scroll-top-inner -->
                </div>
                <!-- /.end of scroll-top-wrapper -->
            </section>
            <!-- //start scroll-top js// -->
            <script>
            $(function() {
                $(document).on('scroll', function() {

                    if ($(window).scrollTop() > 100) {
                        $('.scroll-top-wrapper').addClass('show');
                    } else {
                        $('.scroll-top-wrapper').removeClass('show');
                    }
                });
                $('.scroll-top-wrapper').on('click', scrollToTop);
            });

            function scrollToTop() {
                verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
                element = $('body');
                offset = element.offset();
                offsetTop = offset.top;
                $('html, body').animate({
                    scrollTop: offsetTop
                }, 600, 'linear');
            }
            </script>
            <script src="js/viewportchecker.js"></script>
            <script type="text/javascript">
            jQuery(document).ready(function() {


                jQuery('.navbar-brand').addClass("hidden-area").viewportChecker({
                    classToAdd: 'visible-area animated tada', // Class to add to the elements when they are visible
                    offset: 500
                });
            });
            </script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js "></script>
            <script src="js/mdb.min.js "></script>
</body>

</html>