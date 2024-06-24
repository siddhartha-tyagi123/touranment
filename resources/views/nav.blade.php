<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament</title>
    <meta name="description" content="Your description here">
    <meta name="keywords" content="your, keywords, here">

    <!-- Favicons -->
    <link rel="icon" href="admin_assets/assets/img/favicon.png">
    <link rel="apple-touch-icon" href="admin_assets/assets/img/apple-touch-icon.png">

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Cardo:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="admin_assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin_assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="admin_assets/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="admin_assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="admin_assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="admin_assets/assets/css/main.css" rel="stylesheet">
    <style>
    .card {
        bakgroung-color: black;
    }
    </style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="admin_assets/image/images.png" alt="Logo" class="img-fluid">
                <h1 class="sitename">Your Site Name</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><button type="button" class="active" onclick="showClubs()">Club</button></li>
                    <li class="dropdown">
                        <button type="button" onclick="showTournaments()">
                            <span>Tournament</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </button>
                        <ul>
                            <li><button type="button" id="upcomingButton">Upcoming Tournament</button></li>
                            <li><button type="button">Organise A Tournament</button></li>
                            <li>
                                <a href="{{ route('action.picture.show') }}">
                                    <button type="button">Pictures</button>
                                </a>
                            </li>

                            <li><button type="button" id="pastButton">Past Tournament</button></li>
                            <li>
                                <a href="{{ route('tournament.information') }}">
                                    <button type="button">Informations & Rules</button>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li><button type="button">Players</button></li>
                </ul>

                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                @guest
                <button type="button" class="w-100 mb-2 sign-in"
                    onclick="window.location.href='{{ route('login') }}'">Sign In/Log In</button>
                @endguest

                @auth
                <button type="button" class="w-100 mb-2 sign-in"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Log Out
                </button>
                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                    @csrf
                </form>
                @endauth
            </div>

        </div>
    </header>