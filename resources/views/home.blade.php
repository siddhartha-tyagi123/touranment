<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        display: flex;
    }

    .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #f8f9fa;
        padding-top: 20px;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
        flex: 1;
    }

    .btn {
        background-color: #1E88E5;
        color: white;
        padding: 20px;
        margin: 5px;
        height: 70px;
        width: 300px;
    }

    .sign-in {
        background-color: red;
        border-radius: 50px;
        height: 60px;
        width: 275px;
    }

    .club-container,
    .tournaments-container {
        display: flex;
        flex-wrap: wrap;
        gap: 25px;
    }

    .clubs-item,
    .tournaments-item {
        padding: 50px;
        margin: 10px;
        border: 1px solid #ddd;
        border-radius: 50px;
        background-color: #1E88E5;
        width: 175px;
        height: 150px;
        text-align: center;
        color: white;
    }

    .card-side {
        height: 600px;
        width: 200px;
        text-align: center;
        /* padding: 15px; */
        color: white;
        background-color: #1E88E5;
        margin-left: 15px;
    }

    .img-fluid {
        width: 200px;
        height: 120px;
    }

    .card-text,
    .info-text {
        margin-top: 100px;
    }

    .searchFilter {
        display: none;
    }

    .picture-container {
        border: 1px solid #ddd;
        border-radius: 30px;
        margin-top: 30px;
        width: 1220px;
        height: 120px;
        background-color: #f8f9fa;
        margin-bottom: 20px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="sidebar d-flex flex-column align-items-start">
        <div class="">
            <img src="{{ asset('admin_assets/image/images.png') }}" alt="Logo" class="img-fluid">
        </div>
        <div class="container card-container">
            <div class="card card-side">
                <div class="card-headers">
                    <b>CLUB<br> LOGO</b>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <!-- Additional sidebar content can go here -->
                        <p><b>INFORMATION<br>
                                ABOUT THE<br>
                                CLUB</b>
                        </p>
                    </div>
                </div>
                <div class="info-text">
                    <b>ADDRESS</b><br>
                    <b>EMAIL</b><br>
                    <b>PHONE</b>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <button type="button" class="btn btn-success me-2" onclick="showClubs()">Clubs</button>
        <button type="button" class="btn btn-danger me-2" onclick="showTournaments()">Tournaments</button>
        <button type="button" class="btn btn-info">Players</button>
        @guest
        <button type="button" class="btn btn-primary w-100 mb-2 sign-in"
            onclick="window.location.href='{{ route('login') }}'">Sign In/Log In</button>
        @endguest

        @auth
        <button type="button" class="btn btn-primary w-100 mb-2 sign-in"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Log Out
        </button>
        <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
            @csrf
        </form>
        @endauth

        <div class="container picture-container">
            <div class="row">
                <div class="col-sm-12">
                    <h4><b>PICTURE OF CLUB/LOGO<b></h4>
                </div>
            </div>
        </div>

        <div class="card" id="clubsList" style="display: none;">
            <div class="card-header">Clubs Filter</div>
            <div class="card-body">
                <form id="filterFormOne">
                    <div class="container">
                        <div class="row g-3">
                            <div class="col-6 col-md-3">
                                <label for="title_filter">Club Name</label>
                                <input type="text" name="title_filter" id="title_filter" class="form-control">
                            </div>
                            <div class="col-6 col-md-3">
                                <label for="club_country_filter">Country</label>
                                <select name="club_country_filter" id="club_country_filter" class="form-select">
                                    <option value="">Select</option>
                                    @foreach ($clubCountryOptions as $id => $country)
                                    <option value="{{ $id }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="button" class="" onclick="applyClubFilters()">Filter</button>
                        </div>
                    </div>
                </form>

                <div class="club-container mt-3">
                    @foreach($data['clubs'] as $club)
                    <a href="{{ route('club.show', $club->id) }}" class="club-link">
                        <div class="clubs-item">{{ $club->title }}</div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="card" id="tournamentsList" style="display: none;">
            <div class="card-header"></div>
            <div class="card-body">
                <button type="button" id="searchButton" class="btn btn-primary">Search For Tournament</button>
                @guest
                <button type="button" id="tooltipButton" class="btn btn-primary" onclick="window.location.href='{{ route('login') }}'" data-toggle="tooltip"
                    title="Please login to see the upcoming tournament.">Upcoming Tournament</button>
                <script>
                $(document).ready(function() {
                    $('#tooltipButton').tooltip();
                });
                </script>
                @endguest

                @auth
                @if(auth()->user()->type == 2)
                <button type="button" id="upcomingButton" class="btn btn-primary">Upcoming Tournament</button>
                @endif
                @endauth



                <button type="button" id="" class="btn btn-primary">Organise A Tournament</button>
                <button type="button" id="" class="btn btn-primary">Pictures</button>

                <form id="filterForm" class="searchFilter">
                    <div class="container">
                        <div class="row g-3">
                            <div class="col-6 col-md-3">
                                <label for="age_filter">Age</label>
                                <select name="age_filter" id="age_filter" class="form-select">
                                    <option value="">Select</option>
                                    @foreach ($ageOptions as $age)
                                    <option value="{{ $age }}">{{ $age }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-md-3">
                                <label for="date_filter">Date</label>
                                <select name="date_filter" id="date_filter" class="form-select">
                                    <option value="">Select</option>
                                    @foreach ($dateOptions as $date)
                                    <option value="{{ $date }}">{{ $date }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-md-3">
                                <label for="organiser_filter">Organiser</label>
                                <select name="organiser_filter" id="organiser_filter" class="form-select">
                                    <option value="">Select</option>
                                    @foreach ($organiserOptions as $organiser)
                                    <option value="{{ $organiser }}">{{ $organiser }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-md-3">
                                <label for="country_filter">Country</label>
                                <select name="country_filter" id="country_filter" class="form-select">
                                    <option value="">Select</option>
                                    @foreach ($countryOptions as $id => $country)
                                    <option value="{{ $id }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button type="button" class="" onclick="applyTournamentFilters()">Filter</button>
                        </div>
                    </div>
                </form>


                <div class="tournaments-container mt-3" id="tournamentsContainer">
                    @foreach($data['tournaments'] as $tournament)
                    <a href="{{ route('tournament.show', $tournament->id) }}" class="tournament-link">
                        <div class="tournaments-item" data-status="{{ $tournament->status }}">{{ $tournament->title }}
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
    function showClubs() {
        document.getElementById("clubsList").style.display = "block";
        document.getElementById("tournamentsList").style.display = "none";
    }

    function showTournaments() {
        document.getElementById("tournamentsList").style.display = "block";
        document.getElementById("clubsList").style.display = "none";
    }

    // Function to apply tournament filters
    function applyTournamentFilters() {
        $.ajax({
            url: "{{ route('home') }}",
            method: "GET",
            data: $("#tournamentsList #filterForm").serialize(), // Targeting tournaments filter form
            success: function(response) {
                $('#tournamentsContainer').empty(); // Clear tournaments container
                if (response.data && response.data.tournaments) {
                    response.data.tournaments.forEach(tournament => {
                        $('#tournamentsContainer').append(
                            `<a href="/tournament/${tournament.id}" class="tournament-link">
                            <div class="tournaments-item">
                                ${tournament.title}
                            </div>
                        </a>`
                        );
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('An error occurred while filtering tournaments:', error);
                alert('An error occurred while filtering tournaments. Please try again.');
            }
        });
    }


    // Function to apply club filters
    function applyClubFilters() {
        $.ajax({
            url: "{{ route('home') }}",
            method: "GET",
            data: $("#clubsList #filterFormOne").serialize(), // Targeting clubs filter form
            success: function(response) {
                $('.club-container').empty(); // Clear clubs container
                if (response.data && response.data.clubs) {
                    response.data.clubs.forEach(club => {
                        $('.club-container').append(
                            `<a href="/club/${club.id}" class="club-link">
                            <div class="clubs-item">
                                ${club.title}
                            </div>
                        </a>`
                        );
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('An error occurred while filtering clubs:', error);
                alert('An error occurred while filtering clubs. Please try again.');
            }
        });
    }
    </script>
    <script>
    document.getElementById('searchButton').addEventListener('click', function() {
        // var filterForm = document.getElementById('searchFilter');
        var filterForm = document.querySelector('.searchFilter');

        if (filterForm.style.display === 'none' || filterForm.style.display === '') {
            filterForm.style.display = 'block';
        } else {
            filterForm.style.display = 'none';
        }

        // Show all tournaments
        const tournaments = document.querySelectorAll('.tournaments-item');
        tournaments.forEach(function(tournament) {
            tournament.style.display = 'block';
        });
    });
</script>

<script>
    // Upcoming status code
    document.getElementById('upcomingButton').addEventListener('click', function() {
        const tournaments = document.querySelectorAll('.tournaments-item');
        tournaments.forEach(function(tournament) {
            if (tournament.getAttribute('data-status') === 'upcoming') {
                tournament.style.display = 'block';
            } else {
                tournament.style.display = 'none';
            }
        });
    });
</script>

</body>

</html>