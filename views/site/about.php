<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

//$this->registerCssFile('@web/css/bootstrap.css',['depends'=>['app\assets\AppAsset']]);
//$this->registerCssFile('@web/css/chocolat.css',['depends'=>['app\assets\AppAsset']]);
//$this->registerCssFile('@web/css/flexslider.css',['depends'=>['app\assets\AppAsset']]);
//$this->registerCssFile('@web/css/font-awesome.min.css',['depends'=>['app\assets\AppAsset']]);
//$this->registerCssFile('@web/css/index.css',['depends'=>['app\assets\AppAsset']]);
//$this->registerCssFile('@web/css/style.css',['depends'=>['app\assets\AppAsset']]);
//$this->registerCssFile('@web/css/swipebox.css',['depends'=>['app\assets\AppAsset']]);
//
//
//
//$this->registerJsFile('@web/js/bootstrap.js',['depends'=>['app\assets\AppAsset']]);
//$this->registerJsFile('@web/js/controls.js',['depends'=>['app\assets\AppAsset']]);
//$this->registerJsFile('@web/js/easing.js',['depends'=>['app\assets\AppAsset']]);
//$this->registerJsFile('@web/js/jquery.chocolat.js',['depends'=>['app\assets\AppAsset']]);
//$this->registerJsFile('@web/js/jquery.filterizr.js',['depends'=>['app\assets\AppAsset']]);
//$this->registerJsFile('@web/js/jquery.flexslider.js',['depends'=>['app\assets\AppAsset']]);
//$this->registerJsFile('@web/js/jquery-2.1.4.min.js',['depends'=>['app\assets\AppAsset']]);
//$this->registerJsFile('@web/js/move-top.js',['depends'=>['app\assets\AppAsset']]);
//$this->registerJsFile('@web/js/responsiveslides.min.js',['depends'=>['app\assets\AppAsset']]);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title>Home</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/site.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

</head>
<body>
<?php $this->beginBody() ?>

<div class="banner">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h1><a class="navbar-brand" href="index.html">CO<span>N</span>TR<span>O</span>LL<span>E</span>R</a></h1>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="top-links">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.html">Home</a></li>


                    <li><a class="active" href="about.html">About</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="codes.html">Short Codes</a></li>
                            <li><a href="codes.html">Typography</a></li>
                            <li><a href="codes.html">Services</a></li>
                        </ul>
                    </li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

    </div>
    <div class="clearfix"></div>

    <div class="w3l_banner_info">
        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides" id="slider3">
                    <li>
                        <div class="w3l_banner_info">
                            <h4>Initiate</h4>
                            <p>Hello we are here to help you </p>
                            <a href="single.html" class="hvr-underline-from-center read">Read More</a>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_info">
                            <h4>A Smart</h4>
                            <p>Hello we are here to help you </p>
                            <a href="single.html" class="hvr-underline-from-center read">Read More</a>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_info">
                            <h4>Business</h4>
                            <p>Hello we are here to help you </p>
                            <a href="single.html" class="hvr-underline-from-center read">Read More</a>
                        </div>
                    </li>
                    <li>
                        <div class="w3l_banner_info">
                            <h4>Start Now</h4>
                            <p>Hello we are here to help you </p>
                            <a href="single.html" class="hvr-underline-from-center read">Read More</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>


    </div>
</div>
<!-- //banner -->
<!-- about -->
<div class="about" id="about">
    <div class="container">
        <div class="wthree-about">
            <div class="col-md-5 wthree-ab-left">
                <img src="images/ab.jpg" class="responsive" alt=" " />
            </div>
            <div class="col-md-7 wthree-ab-right">
                <h2>A Few Words About Us</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since, Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum has been the industry's standard dummy text ever since, Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                <a href="single.html" class="hvr-underline-from-center read">Read More</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--// about -->
<!---->
<div class="content-bottom">
    <div class="content-in">
        <div class="port effect-1">
            <div class="image-box">
                <img src="images/g1.jpg" alt="" class="img-responsive">
            </div>
            <div class="text-desc">
                <h6>Controller</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor .</p>
            </div>
        </div>
    </div>
    <div class="content-in">
        <div class="port effect-1">
            <div class="image-box">
                <img src="images/g2.jpg" alt="" class="img-responsive">
            </div>
            <div class="text-desc">
                <h6>Controller</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor .</p>
            </div>
        </div>
    </div>
    <div class="content-in">
        <div class="port effect-1">
            <div class="image-box">
                <img src="images/g3.jpg" alt="" class="img-responsive">
            </div>
            <div class="text-desc">
                <h6>Controller</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor .</p>
            </div>
        </div>
    </div>
    <div class="content-in">
        <div class="port effect-1">
            <div class="image-box">
                <img src="images/g4.jpg" alt="" class="img-responsive">
            </div>
            <div class="text-desc">
                <h6>Controller</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor .</p>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!---->
<!-- /services -->
<div class="service" id="services">
    <div class="container">
        <h3 class="tittle">Our Services</h3>
        <p class="sub">We are waiting your next move </p>
    </div>
    <div class="service-agileits">
        <div class="col-md-7 services-gds agile-info">
            <div class="col-md-6 list-gds text-center">
                <span class="glyphicon glyphicon-ok icon" aria-hidden="true"></span>
                <h4>Nam aliquam</h4>
                <p>Nam aliquam pretium feugiat. Duis sem est, viverra eu interdum ac,
                    suscipit nec mauris. Suspendisse commodo tempor sagittis</p>
            </div>
            <div class="col-md-6 list-gds text-center">
                <span class="glyphicon glyphicon-time icon" aria-hidden="true"></span>
                <h4>Nam aliquam</h4>
                <p>Nam aliquam pretium feugiat. Duis sem est, viverra eu interdum ac,
                    suscipit nec mauris. Suspendisse commodo tempor sagittis</p>
            </div>
            <div class="col-md-6 list-gds text-center">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                <h4>Nam aliquam </h4>
                <p>Nam aliquam pretium feugiat. Duis sem est, viverra eu interdum ac,
                    suscipit nec mauris. Suspendisse commodo tempor sagittis</p>
            </div>
            <div class="col-md-6 list-gds text-center">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                <h4>Nam aliquam</h4>
                <p>Nam aliquam pretium feugiat. Duis sem est, viverra eu interdum ac,
                    suscipit nec mauris. Suspendisse commodo tempor sagittis</p>
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="col-md-5 agitsworkw3ls-grid">
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //services -->
<!-- /client -->
<div class="client-agile-info" id="client">
    <div class="container">
        <div class="client-top">
            <h3 class="tittle two">What Our clients Say</h3>
            <div class="slider">
                <div class="callbacks_container">
                    <ul class="rslides" id="slider4">
                        <li>
                            <div class="agileits-clients">
                                <div class="col-md-6 client_agile_info">

                                    <div class="c-img"><i class="fa fa-quote-right"></i> </div>
                                    <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                                    <h4><img src="images/f1.jpg" alt=""> Martin H. Joseph</h4>

                                </div>
                                <div class="col-md-6 client_agile_info">

                                    <div class="c-img"><i class="fa fa-quote-right"></i> </div>
                                    <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                                    <h4><img src="images/f2.jpg" alt=""> Martin H.Wilson</h4>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li>
                            <div class="agileits-clients">
                                <div class="col-md-6 client_agile_info">

                                    <div class="c-img"><i class="fa fa-quote-right"></i></div>
                                    <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                                    <h4> <img src="images/f3.jpg" alt=""> Martin H.Wilson</h4>

                                </div>
                                <div class="col-md-6 client_agile_info">

                                    <div class="c-img"><i class="fa fa-quote-right"></i> </div>
                                    <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                                    <h4><img src="images/f4.jpg" alt=""> Martin Pal</h4>

                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li>
                            <div class="agileits-clients">
                                <div class="col-md-6 client_agile_info">

                                    <div class="c-img"><i class="fa fa-quote-right"></i> </div>
                                    <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                                    <h4><img src="images/f1.jpg" alt=""> Martin H. Joseph</h4>

                                </div>
                                <div class="col-md-6 client_agile_info">

                                    <div class="c-img"><i class="fa fa-quote-right"></i></div>
                                    <p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
                                    <h4> <img src="images/f2.jpg" alt=""> Martin Pal</h4>

                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- //client -->
<div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>
<!-- /contact -->
<div class="contact-main-agile-info" id="contact">
    <div class="container">
        <h3 class="tittle">Contact Us</h3>
        <p class="sub">We are waiting your next move </p>
        <div class="contact-top-agileits">
            <div class="col-md-4 contact-grid ">
                <div class="contact-grid1 agileits-w3layouts">
                    <i class="fa fa-location-arrow"></i>
                    <div class="con-w3l-info">
                        <h4>Address </h4>
                        <p>12K Street<span>New York City.</span></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 contact-grid">
                <div class="contact-grid2 w3">
                    <i class="fa fa-volume-control-phone"></i>
                    <div class="con-w3l-info">
                        <h4>Call Us</h4>
                        <p>+1234 567 890<span>+1234 567 890</span></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 contact-grid">
                <div class="contact-grid3 w3l">
                    <i class="fa fa-envelope"></i>
                    <div class="con-w3l-info">
                        <h4>Email</h4>
                        <p><a href="mailto:info@example.com">info@example1.com</a>
                            <span><a href="mailto:info@example.com">info@example2.com</a></span></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- map -->
    <div class="map agileits">
        <div class="location-mark"><i class="fa fa-map-marker"></i></div>
        <iframe src=""  frameborder="0" style="border:0" allowfullscreen></iframe>
        <div class="map-grids">
            <h4>Send Us a Message Now</h4>
            <form action="#" method="post">
                <input type="text" name="Your Name" placeholder="Your Name" required=" ">
                <input type="text" name="Your Email" placeholder="Your Email" required=" ">
                <textarea name="Your Message" placeholder="Your Message" required></textarea>
                <input type="submit" value="SUBMIT">
            </form>

        </div>

    </div>
    <!-- //map -->
</div>
<!-- Footer -->
<div class="w3l-footer">
    <div class="container">
        <div class="footer-info-agile">
            <div class="col-md-2 footer-info-grid links">
                <h4>QUICK LINKS</h4>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="codes.html">Services</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-info-grid address">
                <h4>ADDRESS</h4>
                <address>
                    <ul>
                        <li>London Victoria 3000</li>
                        <li>40019 King Street Melbourne</li>
                        <li>BO,London</li>
                        <li>Telephone : +1 (734) 123-4567</li>
                        <li>Email : <a class="mail" href="mailto:mail@example.com">info(at)example.com</a></li>
                    </ul>
                </address>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>INSTAGRAM</h4>
                <div class="footer-grid-instagram">
                    <a href="#"><img src="images/f1.jpg" alt=" " class="img-responsive"></a>
                </div>
                <div class="footer-grid-instagram">
                    <a href="#"><img src="images/f2.jpg" alt=" " class="img-responsive"></a>
                </div>
                <div class="footer-grid-instagram">
                    <a href="#"><img src="images/f3.jpg" alt=" " class="img-responsive"></a>
                </div>
                <div class="footer-grid-instagram">
                    <a href="#"><img src="images/f4.jpg" alt=" " class="img-responsive"></a>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-4 footer-info-grid newsletter">
                <h4>NEWSLETTER</h4>
                <p>Subscribe to our newsletter and we will inform you about newest projects and promotions.
                </p>

                <form action="#" method="post" class="newsletter">
                    <input class="email" type="email" placeholder="Your email...">
                    <input type="submit" class="submit" value="">
                </form>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="connect-agileits">
            <div class="connect-social">
                <h4>CONNECT WITH US</h4>
                <section class="social">
                    <ul>
                        <li><a class="icon fb" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="icon tw" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="icon rss" href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a class="icon lin" href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a class="icon pin" href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a class="icon db" href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="icon gp" href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </section>

            </div>
        </div>

        <div class="copyright-wthree">
            <p>Copyright &copy; 2017.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
        </div>

    </div>
</div>
<!-- for bootstrap working -->
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script>
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
</script>
<!--banner Slider starts Here-->
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider3").responsiveSlides({
            auto: true,
            pager:true,
            nav:false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>

<!--banner Slider starts Here-->
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager:false,
            nav:true,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<script src="js/bootstrap.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
