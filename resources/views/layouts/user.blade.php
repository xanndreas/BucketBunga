<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>MiuKid - Multi Store Responsive HTML Template</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
</head>

<body>
<!-- push menu-->
<div class="pushmenu menu-home5">
    <div class="menu-push">
        <span class="close-left js-close"><i class="ion-ios-close-empty f-40"></i></span>
        <div class="clearfix"></div>
        <form role="search" method="get" id="searchform" class="searchform" action="/search">
            <div>
                <label class="screen-reader-text" for="q"></label>
                <input type="text" placeholder="Search for products" value="" name="q" id="q" autocomplete="off">
                <input type="hidden" name="type" value="product">
                <button type="submit" id="searchsubmit"><i class="ion-ios-search-strong"></i></button>
            </div>
        </form>
        <ul class="nav-home5 js-menubar">
            <li class="level1 active dropdown">
                <a href="#">Pusat Informasi</a>
            </li>
            <li class="level1 active dropdown"><a href="#">Tentang</a></li>
            <li class="level1 active dropdown"><a href="#">Akun Saya</a></li>
        </ul>
    </div>
</div>
<header id="header" class="header-v2">
    <div class="header-center-1">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12 col-xs-12 header">
                    <div class="logo">
                        <a href="#"><img src="images/logo.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 logo">
                    <div class="date2">
                        <div class="date">
                            <a href="#"><i class="fa fa-calendar st-calendar" aria-hidden="true"></i></a>
                        </div>
                        <div class="para-a">
                            <h4>Mon - Sat 8h00 -18h00</h4>
                            <p>Sunday</p>
                            <span>CLOSED</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 header-center2">
                    <div class="date2">
                        <div class="date">
                            <a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i></a>
                        </div>
                        <div class="para-a a2">
                            <h4>Every Week Sales!</h4>
                            <p>Discount</p>
                            <span>up to 50% off.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12 hd-right">
                    <div class="date4">
                        <div class="date">
                            <a href="#"><i class="fa fa-phone st-phone" aria-hidden="true"></i></a>
                        </div>
                        <div class="para-a a3">
                            <h4>Have a Questions?</h4>
                            <p>Call:</p>
                            <span>1900 - 819898.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-center pro-v1 hp1">
        <div class="container">
            <!-- push-menu -->
            <a href="#" class="icon-pushmenu js-push-menu">
                <i class="fa fa-bars" aria-hidden="true"></i></a>
            <div class="row flex align-items-center justify-content-between">
                <div class="col-md-6 col-xs-12 col-sm-6 col2 flex justify-content-end">
                    <ul class="nav navbar-nav js-menubar hidden-xs hidden-sm">
                        <li class="level1 active dropdown home-page-v1-st style-menu-home-1"><a class="menu-home-3 home-1-font" href="#">Home</a>
                            <span class="plus js-plus-icon"></span>
                            <div class="menu-level-1 dropdown-menu style5">
                                <ul class="level1">
                                    <li class="level2 col-6">
                                        <a href="#">Pusat Informasi</a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li class="level1 active dropdown home-page-v1-st style-menu-home-1"><a class="menu-home-3 home-1-font" href="#">Home</a>
                            <span class="plus js-plus-icon"></span>
                            <div class="menu-level-1 dropdown-menu style5">
                                <ul class="level1">
                                    <li class="level2 col-6">
                                        <a href="#">Tentang</a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li class="level1 active dropdown home-page-v1-st style-menu-home-1"><a class="menu-home-3 home-1-font" href="#">Home</a>
                            <span class="plus js-plus-icon"></span>
                            <div class="menu-level-1 dropdown-menu style5">
                                <ul class="level1">
                                    <li class="level2 col-6">
                                        <a href="#">Akun Saya</a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 carts">
                    <div class="search3 search-home-1">
                        <form method="get" action="/search" role="search" class="search-form  has-categories-select">
                            <input name="q" class="search-input" type="text" value="" placeholder="Cari bunga ..." autocomplete="off">
                            <input type="hidden" name="post_type" value="product">
                            <button type="submit" id="search-btn"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                    <div class="date3 dropdown">
                        <div class="date mycart">
                            <button class="fa fa-shopping-bag dropdown-toggle" type="button" data-toggle="dropdown">
                            </button>
                            <div class="dropdown-menu cart2 drop-home-1 check-out-home-1">

                                <div class="cart-2">
                                    <div class="check-out">
                                        <div class="img-cart">
                                            <a href="#"><img src="images/img27.jpg" alt="img"></a>
                                        </div>
                                        <div class="para-cart">
                                            <p><a href="#">Crepe Jacket With Pompom</a></p>
                                            <h4>$36.00</h4>
                                            <del>$42.00</del>
                                            <br>
                                            <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="check-out">
                                        <div class="img-cart">
                                            <a href="#"><img src="images/img28.jpg" alt="img"></a>
                                        </div>
                                        <div class="para-cart">
                                            <p><a href="#">Animal Print Sweatshirt</a></p>
                                            <h4>$36.00</h4>
                                            <del>$42.00</del>
                                            <br>
                                            <a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="check-out bd-bt">
                                        <div class="img-cart">
                                            <a href="#"><img src="images/img29.jpg" alt="img"></a>
                                        </div>
                                        <div class="para-cart">
                                            <p><a href="#">Knit Cardigan</a></p>
                                            <br>
                                            <h4>$36.00</h4>
                                            <del>$42.00</del>
                                            <br>
                                            <a href="#"><i class="fa fa-trash-o st" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="check-out2">
                                        <div class="total">
                                            <p>Total</p>
                                            <span>$ 689.8</span>
                                        </div>
                                        <div class="check">
                                            <a href="#">check out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="para-a a4">
                            <h4><a href="#">My Cart.</a></h4>
                            <p>01 </p>
                            <span>/ $150.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<footer>
    <div class="footers">
        <div class="container">
            <div class="one">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="logo-para">
                            <a href="#"><img src="images/logo.png" alt="logo"></a>
                            <p><em><a href="#">Miukid is a premium eCommerce theme with<br>
                                        advanced admin module.</a></em></p>
                        </div>
                        <div class="icon-para">
                            <ul>
                                <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i>Telephone: +84 988  992 085</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>Email: lamhvdesigner@gmail.com</a></li>
                                <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>8:00 - 19:00, Monday - Saturday,<br>
                                        Sunday - closed</a></li>
                            </ul>
                        </div>
                        <div class="bytheme">
                            <div class="bytheme2">
                                <a href="#">Buy This Theme</a>
                            </div>
                            <div class="icons-ft">
                                <ul>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vine" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- footer-left -->
                    <div class="col-md-4 col-sm-4 col-xs-12 fix ">
                        <div class="ft-center">
                            <div class="information">
                                <h4>Information</h4>
                                <div class="border2"></div>
                                <a href="#">About Us</a>
                                <br>
                                <a href="#">Shipping & Returns</a>
                                <br>
                                <a href="#">Privacy Notice</a>
                                <br>
                                <a href="#">Conditions of Use</a>
                                <br>
                                <a href="#">RSS</a>
                                <br>
                            </div>
                            <div class="information center">
                                <h4>Service</h4>
                                <div class="border2"></div>
                                <a href="#">Online support</a>
                                <br>
                                <a href="#">Help & FAQs</a>
                                <br>
                                <a href="#">Call Center</a>
                                <br>
                                <a href="#">Contact Us</a>
                                <br>
                                <a href="#">Custom Link</a>
                                <br>
                            </div>
                        </div>
                    </div>
                    <!-- footer center -->
                    <div class="col-md-4 col-sm-4 col-xs-12 right">
                        <div class="Instagram">
                            <h4>Instagram</h4>
                            <div class="border2"></div>
                        </div>
                        <div class="img-ul img-ft-st">
                            <ul>
                                <li><a href="#"><img src="images/img18.jpg" alt="img"></a></li>
                                <li><a href="#"><img src="images/img19.jpg" alt="img"></a></li>
                                <li><a href="#"><img src="images/img20.jpg" alt="img"></a></li>
                                <li><a href="#"><img src="images/img21.jpg" alt="img"></a></li>
                            </ul>
                        </div>
                        <div class="img-ul img-ft-st">
                            <ul>
                                <li><a href="#"><img src="images/img22.jpg" alt="img"></a></li>
                                <li><a href="#"><img src="images/img23.jpg" alt="img"></a></li>
                                <li><a href="#"><img src="images/img24.jpg" alt="img"></a></li>
                                <li><a href="#"><img src="images/img25.jpg" alt="img"></a></li>
                            </ul>
                        </div>
                        <div class="menu-ft">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">New Arrivals</a></li>
                                <li><a href="#">Site map</a></li>
                            </ul>
                        </div>
                        <!-- footer right -->
                    </div>
                </div>
            </div>
            <div class="border"></div>
        </div>
    </div>

    <!-- footer-ending -->
    <div class="footerending">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="fted-left">
                        <p>Copyright © 2018 by </p>
                        <a href="#">EngoTheme. </a>
                        <span>All Rights Reserved.</span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 ">
                    <div class="fted-left two">
                        <ul>
                            <li><a href="#"><img src="images/icon1.png" alt="icon"></a></li>
                            <li><a href="#"><img src="images/icon2.png" alt="icon"></a></li>
                            <li><a href="#"><img src="images/icon3.png" alt="icon"></a></li>
                            <li><a href="#"><img src="images/icon4.png" alt="icon"></a></li>
                            <li><a href="#"><img src="images/icon5.png" alt="icon"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="#" class="zoa-btn scroll_top"><i class="ion-ios-arrow-up"></i></a>
<script src="{{ asset('assets/js/jquery.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('assets/js/slick.min.js')}}"></script>
<script src="{{ asset('assets/js/countdown.js')}}"></script>
<script src="{{ asset('assets/js/main.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: false,
            autoplayTimeout: 3000,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 1
                },
                1014: {
                    items: 1
                },
                1200: {
                    items: 1
                },
                1600: {
                    items: 1
                }
            }
        });

    });
</script>

</body>

</html>
