<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta charset="utf-8">
        <title>WiZ---Kuijpers</title>
        <!-- bootstrap - fontawesome -->
        <link rel="stylesheet" type="text/css" href="{{ url('../fontawesome/css/all.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('../css/bootstrap.min.css') }}" />
        <!-- custom css -->
        <link rel="stylesheet" type="text/css" href="{{ url('../css/main.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('../css/footer.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('../css/homegraphs.css') }}" />


    </head>
    <body>
        <div class="container-fluid top-bar">
          <div class="row">
            <div class="col order-first col-first-empty">  
                <a  href="https://www.kuijpers.nl/" target="blank">
                    <img src="{{ url('/img/logo-small.png') }}" class="nav-home kuijperslogosmall" height="90">
                </a>
            </div>
            <div class="col text-center col-brand">
            <a class="navbar-brand" href="home.php">
                    <img src="{{ url('/img/logo_wiz3.png') }}" class="nav-home" height="90">
                </a>
            </div>
            <div class="col order-last text-right col-profile">
                <a href="profile.php" class="profilehover">
                    <img src="https://www.w3schools.com/howto/img_avatar.png" class="profile-img-bar"><br/>            
                </a>
            </div>
          </div>
        </div>
        <div class="container-fluid col-menu">
          <div class="row">
            <div class="col order-first">
                <ul class="nav justify-content-center">
                    <li class="nav-item text-center">
                        <a class="nav-link" href="OverOns.php">Over ons</a>
                    </li>
                </ul>
            </div>
            <div class="col order-last">
                <ul class="nav justify-content-center">
                    <li class="nav-item text-center">
                        <a class="nav-link" href="shop.php">Shop</a>
                    </li>
                </ul>
            </div>
          </div>
        </div>
        @yield('content')
        <footer class="footer-distributed">
            <div class="footer-left">
                <a href="home.php">
                    <img src="img/logo_wiz2.png" class="img-fluid" id="wizlogofooter">
                </a>
                <p class="footer-links">
                    <a href="home.php" id="footernavhover">Home</a>
                    ·
                    <a href="OverOns.php" id="footernavhover">Over Ons</a>       
                    ·
                    <a href="shop.php" id="footernavhover">Shop</a>
                    ·
                    <a href="profile.php" id="footernavhover">Profiel</a>
                    ·
                    <a href="https://mijnkuijpers.sharepoint.com/" target="blank" id="footernavhover">Mijn Kuijpers</a>
                </p>
                <p class="footer-company-name">Kuijpers Installaties &copy; 2018</p>
            </div>
            <div class="footer-center">
                <div>
                    <i class="fas fa-map-marker-alt"></i>
                    <a  target="blank" href="https://www.google.nl/maps/place/Panovenweg+20,+5708+HR+Helmond/@51.4738781,5.6267348,17z/data=!3m1!4b1!4m5!3m4!1s0x47c7214f44307933:0x16bd59b2e5452121!8m2!3d51.4738748!4d5.6289235">
                        <p><span>Panovenweg 20</span> Helmond, Nederland</p>
                    </a>
                </div>
                <div>
                    <i class="fas fa-phone"></i>
                    <p>+1 234 567890</p>
                </div>
                <div>
                    <i class="fas fa-envelope"></i>
                    <p><a href="">kuijpers@kuijpers.com</a></p>
                </div>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                    <span>Over WiZ</span>
                    Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
                </p>
                <div class="footer-icons">
                    <a href="https://www.facebook.com/kuijpersNL/" target="blank" id="socialiconhover"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/kuijpersnl" target="blank" id="socialiconhover"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.youtube.com/user/KuijpersNL" target="blank" id="socialiconhover"><i class="fab fa-youtube"></i></a>
                    <a href="https://nl.linkedin.com/company/kuijpers-installaties" target="blank" id="socialiconhover"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://www.instagram.com/kuijpersnl/" target="blank" id="socialiconhover"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="footer-logoff profilepage">  
                    <a href="php/Logout.php" class="fas fa-power-off" id="socialiconhover"><p>Uitloggen</p></a>
                </div>
            </div>
        </footer>
        <script src="{{ url('/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('/js/raphael-2.1.4.min.js') }}"></script>
        <script src="{{ url('/js/justgage.js') }}"></script>
        <script src="{{ url('/js/tab.js') }}"></script>
        <script src="{{ url('/js/br.js') }}"></script>
        <script src="{{ url('/js/shopmodals.js') }}"></script>
        <script src="{{ url('/js/main.js') }}"></script>
        <script src="{{ url('/js/pie.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>


    </body>
</html>
