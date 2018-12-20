<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name=viewport content="width=device-width, initial-scale=1"/>
        <meta charset="utf-8">
        <title>WiZ - Kuijpers</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="WiZ Kuijpers - Weggooien is Zonde, een overzicht van alle overgbleven producten van Kuijpers."/>
        <!-- bootstrap - fontawesome -->
        <link rel="preload" href="{{ asset('fontawesome/css/all.min.css') }}" as="style" onload="this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}"></noscript>
        
        <link rel="preload" href="{{ asset('css/bootstrap.min.css') }}" as="style" onload="this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"></noscript>       

        {{-- <link rel="stylesheet" type="text/css"  href="{{ asset('fontawesome/css/all.min.css') }}" /> --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" /> --}}

        <!-- custom css -->
        <link rel="preload" href="{{ asset('css/main.css') }}" as="style" onload="this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="{{ asset('css/main.css') }}"></noscript> 

        <link rel="preload" href="{{ asset('css/footer.css') }}" as="style" onload="this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="{{ asset('css/footer.css') }}"></noscript> 

        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" /> --}}
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}" /> --}}

        <script>
            /*! loadCSS. [c]2017 Filament Group, Inc. MIT License */
            !function(a){"use strict";var b=function(b,c,d){function j(a){if(e.body)return a();setTimeout(function(){j(a)})}function l(){f.addEventListener&&f.removeEventListener("load",l),f.media=d||"all"}var g,e=a.document,f=e.createElement("link");if(c)g=c;else{var h=(e.body||e.getElementsByTagName("head")[0]).childNodes;g=h[h.length-1]}var i=e.styleSheets;f.rel="stylesheet",f.href=b,f.media="only x",j(function(){g.parentNode.insertBefore(f,c?g:g.nextSibling)});var k=function(a){for(var b=f.href,c=i.length;c--;)if(i[c].href===b)return a();setTimeout(function(){k(a)})};return f.addEventListener&&f.addEventListener("load",l),f.onloadcssdefined=k,k(l),f};"undefined"!=typeof exports?exports.loadCSS=b:a.loadCSS=b}("undefined"!=typeof global?global:this);
            /*! loadCSS rel=preload polyfill. [c]2017 Filament Group, Inc. MIT License */
            !function(a){if(a.loadCSS){var b=loadCSS.relpreload={};if(b.support=function(){try{return a.document.createElement("link").relList.supports("preload")}catch(a){return!1}},b.poly=function(){for(var b=a.document.getElementsByTagName("link"),c=0;c<b.length;c++){var d=b[c];"preload"===d.rel&&"style"===d.getAttribute("as")&&(a.loadCSS(d.href,d,d.getAttribute("media")),d.rel=null)}},!b.support()){b.poly();var c=a.setInterval(b.poly,300);a.addEventListener&&a.addEventListener("load",function(){b.poly(),a.clearInterval(c)}),a.attachEvent&&a.attachEvent("onload",function(){a.clearInterval(c)})}}}(this);
          </script>
        <!-- page specific css -->
        @yield('pageSpecificCSS')
        <!-- Chart.js -->
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> --}}
        {{-- <link rel="shortcut icon" type="image/png" href="{{ asset('img/wizicon.png') }}"> --}}
        @laravelPWA

        {{-- <style>
        
        .absolute {
            position: absolute;
        }

        .pin {
            top: 1000;
            right: 0;
            bottom: 0;
            left: 0;
        }

        .bg-cover {
            background-size: cover;
        }

        .bg-no-repeat {
            background-repeat: no-repeat;
        }
        @media (min-width: 768px) {
            .md\:bg-left {
                background-position: left;
            }
        }
        @media (min-width: 992px) {
            .lg\:bg-center {
                background-position: center;
            }
        }
        </style> --}}
    </head>
    <body>
        <div class="container-fluid top-bar">
          <div class="row">
            <div class="col order-first col-first-empty smalkuijperslogo">  
                <a  href="https://www.kuijpers.nl/" target="blank">
                    <img alt="Kuijpers Logo" src="{{ asset('img/logo-small.png') }}" class="nav-home kuijperslogosmall" height="90">
                </a>
            </div>
            <div class="col text-center col-brand">
            <a class="navbar-brand" href="/home">
                    <img alt="Kuijpers Logo" src="{{ asset('img/logo_wiz3.png') }}" class="nav-home" height="90">
                </a>
            </div>
            <div class="col order-last text-right col-profile">
                <div class="profiledisplay text-center">
                    <a href="/profiel" class="profilehover">
                        <img alt="Profiel afbeelding" src="/storage/avatars/{{ Auth::user()->avatar }}" class="profile-img-bar"><br/>            
                    </a>
                    <h5 id="profilenamedisplay">{{ Auth::user()->voornaam }}</h5>
                </div>
            </div>
          </div>
        </div>
        <div class="container-fluid col-menu">
          <div class="row">
            <div class="col order-first">
                <ul class="nav justify-content-center">
                    <li class="nav-item text-center">
                        <a class="nav-link" href="/overons">Over ons</a>
                    </li>
                </ul>
            </div>
            <div class="col order-last">
                <ul class="nav justify-content-center">
                    <li class="nav-item text-center">
                        <a class="nav-link" href="/overzicht">Overzicht</a>
                    </li>
                </ul>
            </div>
          </div>
        </div>
        @yield('shopmenu')
        @yield('content')
        <footer class="footer-distributed">
            <div class="footer-left">
                <a href="/home" >           
                    <img alt="Kuijpers Logo" src="{{ asset('img/logo_wiz2.png') }}" class="img-fluid" id="wizlogofooter">
                </a>
                <p class="footer-links">
                    <a href="/home" aria-label="Home" class="footernavhover">Home</a>
                    ·
                    <a href="/overons" aria-label="Over ons" class="footernavhover">Over Ons</a>       
                    ·
                    <a href="/overzicht" aria-label="Overzicht " class="footernavhover">Overzicht</a>
                    ·
                    <a href="/profiel" aria-label="Profiel" class="footernavhover">Profiel</a>
                    ·
                    <a href="https://mijnkuijpers.sharepoint.com/" aria-label="Mijn Kuijpers" target="blank" class="footernavhover">Mijn Kuijpers</a>
                </p>
                <p class="footer-company-name">Kuijpers Installaties &copy; 2018</p>
            </div>
            <div class="footer-center">
                <div>
                    <i class="fas fa-map-marker-alt"></i>
                    <a  target="blank" aria-label="Locatie" href="https://www.google.nl/maps/place/Panovenweg+20,+5708+HR+Helmond/@51.4738781,5.6267348,17z/data=!3m1!4b1!4m5!3m4!1s0x47c7214f44307933:0x16bd59b2e5452121!8m2!3d51.4738748!4d5.6289235">
                        <p><span>Panovenweg 20</span> Helmond, Nederland</p>
                    </a>
                </div>
                <div>
                    <i class="fas fa-phone"></i>
                    <p>+1 234 567890</p>
                </div>
                <div>
                    <i class="fas fa-envelope"></i>
                    <p><a href="mailto:kuijpers@kuijpers.com" aria-label="Email">kuijpers@kuijpers.com</a></p>
                </div>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                    <span>Over WiZ</span>
                    Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
                </p>
                <div class="footer-icons">
                    <a href="https://www.facebook.com/kuijpersNL/" aria-label="Facebook" target="blank"><i class="fab fa-facebook-f socialiconhover"></i></a>
                    <a href="https://twitter.com/kuijpersnl" aria-label="Twitter" target="blank"><i class="fab fa-twitter socialiconhover"></i></a>
                    <a href="https://www.youtube.com/user/KuijpersNL" aria-label="Youtube" target="blank"><i class="fab fa-youtube socialiconhover"></i></a>
                    <a href="https://nl.linkedin.com/company/kuijpers-installaties" aria-label="LinkedIn" target="blank"><i class="fab fa-linkedin-in socialiconhover"></i></a>
                    <a href="https://www.instagram.com/kuijpersnl/" aria-label="Instagram"target="blank"><i class="fab fa-instagram socialiconhover"></i></a>
                </div>
                <div class="footer-logoff profilepage">  
                    <a class="fas fa-power-off socialiconhover" aria-label="Uitloggen" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <p>Uitloggen</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>

            </div>
        </footer>
        @yield('ajaxScript')
        @yield('charts')
        <script src="{{ asset('js/app.js') }}"></script>       
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>        
        <script src="{{ asset('js/tab.js') }}"></script>   
        <script src="{{ asset('/js/shopmodals.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    </body>
</html>
