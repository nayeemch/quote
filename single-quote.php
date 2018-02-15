<?php include_once 'db_info.php'; ?>
<?php session_start(); ?>
<?php

$id=$_GET['id'];

$sql="SELECT quotes.id,quotes.quote,authors.icon FROM quotes JOIN authors ON authors.id=quotes.author_id WHERE quotes.id= '$id' ";
$result = $conn->query($sql);


if ($result->num_rows > 0 ) {

while ($row = $result -> fetch_assoc()) {

    $quote=$row['quote'];
    $icon=$row['icon'];


?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <meta name="description" content="<?php echo $quote; ?>" />
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="লাইফ চেইঞ্জিং বাণী">
        <meta itemprop="description" content="<?php echo $quote; ?>">
        <meta itemprop="image" content="<?php echo $icon; ?>">
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="blog">
        <meta name="twitter:site" content="@publisher_handle">
        <meta name="twitter:title" content="লাইফ চেইঞ্জিং বাণী">
        <meta name="twitter:description" content="<?php echo $quote; ?>">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="<?php echo $icon; ?>">
        <meta name="twitter:data1" content="$3">
        <meta name="twitter:label1" content="Price">
        <!-- Open Graph data -->
        <meta property="og:title" content="লাইফ চেইঞ্জিং বাণী" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://nym629.net23.net/quote2/single-quote?id=<?php echo $id;?>" />
        <meta property="og:image" content="<?php echo $icon; ?>" />
        <meta property="og:description" content="<?php echo $quote; ?>" />
        <meta property="og:site_name" content="লাইফ চেইঞ্জিং বাণী" />
        <title>লাইফ চেইঞ্জিং বাণী</title>
        <!-- <meta property="og:url" content="http://nym629.net23.net/quote2/single-quote?id=<?php echo $id;?>&quote=<?php echo $quote;?>" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="লাইফ চেইঞ্জিং বাণী" />
        <meta property="og:description" content="<?php echo $quote; ?>" />
        <meta property="og:image" content="<?php echo $icon; ?>" /> -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <!-- JavaScript -->
        <script src="js/alertify.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="css/alertify.css" />
        <?php }
}
 ?>
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
        <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '256710698170605',
                xfbml: true,
                version: 'v2.10'
            });
            FB.AppEvents.logPageView();
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) { return; }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
        <style>

        </style>
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
                            <li class="menu2 active"><a href="all-quotes">সকল বানীসমুহ</a></li>
                            <li class="menu3">
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
                <div class="personal-quote">
                    <?php

                if (isset($_GET['id'])) {
                $id = $_GET['id'];

                    $sql="SELECT authors.id AS a_id,authors.name,authors.birth,authors.death,authors.icon,authors.app_id,quotes.id AS q_id,quotes.quote FROM authors INNER JOIN quotes ON quotes.author_id=authors.id WHERE authors.app_id=1 AND quotes.id = '$id' ";
                }
                $result = $conn->query($sql);

                if ($result->num_rows > 0 ) {

                while ($row = $result -> fetch_assoc()) {
                    $x= $row['q_id'];
                    $y= $row['a_id'];

                ?>
                        <div class="col-md-8 col-lg-8 col-xs-12 author-single text-center">
                            <div class="col-md-12 text-center">
                                <div class="author-single-img">
                                    <img src="<?php echo $row['icon']; ?>" alt="">
                                </div>
                            </div>
                            <h3 class="author-name"><?php echo $row['name'] ?></h3>
                            <br>
                            <!-- blog-content ends-->
                            <div class="clearfix"></div>
                            <div class="quote-single">
                            </div>
                            <div class="author-details">
                                <div class="author-quotes quotes-single">
                                    <h4 id="heading4">
                            <span>“</span>
                           <div id="p1"><?php echo $row['quote']; ?></div>
                           <span>”</span>
                        </h4>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="social-icon text-center">
                                <ul class="social-icons icon-circle icon-rotate list-unstyled list-inline">
                                    <div class="fb-like" data-share="true" data-width="450" data-show-faces="true">
                                    </div>
                                    <li class="RIGHT" data-toggle="tooltip" title="Copy Quote" onclick="notification(); copyToClipboard('#p1');"><i class="fa fa-files-o"></i></li>
                                    <script>
                                    function notification() {
                                        var notification = alertify.notify('কপি করা হয়েছে', 'success', 5, function() { console.log(''); });
                                    }
                                    </script>
                                    <li data-toggle="tooltip" title="Share on Google+"><a href="https://plus.google.com/share?url=" target="_blank" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)+encodeURIComponent(document.title))  ; return false;"><i class="fa fa-google-plus"></i></a></li>
                                    <li data-toggle="tooltip" title="Tweet"><a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><i class="fa fa-twitter"></i></a></li>
                                    <li data-toggle="tooltip" title="Favourite"> <span class='once fa not-liked'></span></li>
                                    <script>
                                    $(document).ready(function() {
                                        $('[data-toggle="tooltip"]').tooltip();
                                    });
                                    </script>
                                </ul>
                                <script>
                                function copyToClipboard(element) {
                                    var $temp = $("<input>");
                                    $("body").append($temp);
                                    $temp.val($(element).text()).select();
                                    document.execCommand("copy");
                                    $temp.remove();
                                }
                                </script>
                            </div>
                            <div class="clearfix"></div>
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
                            <a href="personal-page?id=<?php echo $row[ 'a_id']; ?>">
                                    <!-- <button type="button" class="btn btn-custom">এই লেখকের আরো পড়ুন</button> -->
                                    </a>
                            </div>
                        </div>
                        <?php
        }
}



?>
                            <div class="col-md-4 col-lg-4 col-xs-12">
                                <section id="categories">
                                    <h3>ক্যাটাগরি</h3>
                                    <div class="hr-lines">
                                        <div class="hr1"></div>
                                        <div class="hr2"></div>
                                    </div>
                                    <div class="all-tags">
                                    </div>
                                    <div class="category-menu">
                                        <ul class="list-group">
                                            <?php
            $sql="SELECT tags.id,tags.name AS t_name,tags.app_id FROM tags WHERE app_id=1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0 ) {

            while ($row = $result -> fetch_assoc()) {
            ?>
                                                <a href="tags?id=<?php echo $row['id']; ?>">
                                                    <button class="btn btn-default btn-sm " type="button ">
                                                        <span>#</span>
                                                        <?php echo $row['t_name']; ?>
                                                    </button>
                                                </a>
                                                <?php
                    }
                }
            ?>
                                        </ul>
                                    </div>
                                    <!-- category-menu ends -->
                                </section>
                                <!-- categories section ends -->
                            </div>
                            <!-- col-md-4 col-lg-4 col-xs-12 ends -->
                </div>
                <!-- personal-quote ends -->
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
            $sql3="SELECT tags.id,tags.name AS t_name,tags.app_id FROM tags WHERE app_id=1 ORDER BY RAND() LIMIT 5";
            $result = $conn->query($sql3);

            if ($result->num_rows > 0 ) {

            while ($row = $result -> fetch_assoc()) {
            ?>
                                        <li class="list-group-item tags-list "><a href="tags?id=<?php echo $row['id']; ?>">#<?php echo $row['t_name']; ?></a></li>
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