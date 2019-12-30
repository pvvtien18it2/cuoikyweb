
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hoang Hon &mdash; Hotel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{asset('')}}">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="resources/fonts/icomoon/style.css">

    <link rel="stylesheet" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/css/magnific-popup.css">
    <link rel="stylesheet" href="resources/css/jquery-ui.css">
    <link rel="stylesheet" href="resources/css/owl.carousel.min.css">
    <link rel="stylesheet" href="resources/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="resources/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="resources/css/animate.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">



    <link rel="stylesheet" href="resources/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="resources/css/aos.css">

    <link rel="stylesheet" href="resources/css/style.css">

  </head>
  <body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <div class="site-navbar-wrap js-site-navbar bg-white">

      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="{{route('trangchu')}}">Hoang Hon</a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">

                    <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                    @yield('navbar')
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="slide-one-item home-slider owl-carousel">

      <div class="site-blocks-cover overlay" style="background-image: url(public/images/hero_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">

              <h1 class="mb-2">Welcome</h1>
              <h2 class="caption">Hotel &amp; Resort</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="site-blocks-cover overlay" style="background-image: url(public/images/hero_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1 class="mb-2">Unique Experience</h1>
              <h2 class="caption">Enjoy With Us</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="site-blocks-cover overlay" style="background-image: url(public/images/hero_3.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1 class="mb-2">Relaxing Room</h1>
              <h2 class="caption">Your Room, Your Stay</h2>
            </div>
          </div>
        </div>
      </div>

    </div>

    @yield('body')

    <div class="py-5 quick-contact-info">
      <div class="container">
        <div class="row">
          <div class="col-md-4 text-center">
            <div>
              <span class="icon-room text-white h2 d-block"></span>
              <h2>Location</h2>
              <p class="mb-0">23 Trà Khê 9, P.Hoà Hải  <br>  Q.Ngũ Hành Sơn, TP.Đà Nẵng</p>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div>
              <span class="icon-clock-o text-white h2 d-block"></span>
              <h2>Service Times</h2>
              <p class="mb-0">24h/ 7 ngày </p>
            </div>
          </div>
          <div class="col-md-4 text-center">
            <div>
              <span class="icon-comments text-white h2 d-block"></span>
              <h2>Get In Touch</h2>
              <p class="mb-0">Email: vdan.18it2@sict.udn.vn <br>
              Phone: 0123455678 </p>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>

  <script src="public/js/jquery-3.3.1.min.js"></script>
  <script src="public/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="public/js/jquery-ui.js"></script>
  <script src="public/js/popper.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
  <script src="public/js/owl.carousel.min.js"></script>
  <script src="public/js/jquery.stellar.min.js"></script>
  <script src="public/js/jquery.countdown.min.js"></script>
  <script src="public/js/jquery.magnific-popup.min.js"></script>
  <script src="public/js/bootstrap-datepicker.min.js"></script>
  <script src="public/js/aos.js"></script>


  <script src="public/js/mediaelement-and-player.min.js"></script>

  <script src="public/js/main.js"></script>


  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>

  </body>
</html>
