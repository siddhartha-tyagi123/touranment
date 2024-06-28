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

    <!-- Custom CSS -->
    <style>
    /* .card {
            background-color: black; 
        } */
    body {
        margin-bottom: 0px;
        background-color: rgb(0 0 0);
        background-image: url(admin_assets/image/logo.png);
        background-size: contain;
        background-position: center center;
        background-repeat: no-repeat;
    }
    .main{
        background-color: #000000bf;
    }
    </style>
</head>

<body class="index-page">
<div class="main">
    <!-- Header -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="admin_assets/image/logo.png" alt="Logo" class="img-fluid">
            </a>

            <!-- Navigation Menu -->
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li class="dropdown">
                        <!-- Example of conditional rendering based on authentication and user type -->
                        <?php if(auth()->check() && auth()->user()->type == 3 && auth()->user()->status == 1): ?>
                        <a class="active" onclick="showClubs()">
                            <span>Club</span>
                        </a>
                        <!-- <ul>
                            <li><a href="{{ route('club.contact.us') }}">Contact The Club</a></li>
                            <li><a href="{{ route('upcoming.tournament') }}">Upcoming Tournament</a></li>
                            <li><a href="{{ route('past.tournament') }}">Past Tournament</a></li>
                            <li><a>Organise A Tournament</a></li>
                            <li><a href="{{ route('action.picture.show') }}">Pictures</a></li>
                            <li><a href="{{ route('tournament.information') }}">Informations & Rules</a></li>
                        </ul> -->
                        <?php else: ?>
                        <a class="active">Club</a>
                        <?php endif; ?>
                    </li>
                    <li class="dropdown">
                        <!-- Example of conditional rendering for different user types -->
                        <?php if(auth()->check() && auth()->user()->type == 2): ?>
                        <a onclick="showTournaments()">
                            <span>Tournament</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <?php else: ?>
                        <a>
                            <span>Tournament</span>
                        </a>
                        <?php endif; ?>
                    </li>

                    <li><a>Players</a></li>
                </ul>

                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <!-- User Authentication Links -->
            <div class="header-social-links">
                <?php if(auth()->guest()): ?>
                <a class="w-100 mb-2 sign-in" onclick="window.location.href='{{ route('login') }}'">Sign In/Log In</a>
                <?php else: ?>
                <a class="w-100 mb-2 sign-in"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                    @csrf
                </form>
                <?php endif; ?>
            </div>

        </div>
    </header>