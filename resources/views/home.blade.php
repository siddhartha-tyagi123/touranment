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

    .filter {
        padding: 10px;
        /* margin: 5px; */
        height: 40px;
        width: 100px;
    }
    </style>
</head>

<body>
    <div class="sidebar d-flex flex-column align-items-start">
        <div class="p-3">
            <img src="logo.png" alt="Logo" class="img-fluid" style="max-width: 100px;">
        </div>
        <div class="p-3">
            <!-- Additional sidebar content can go here -->
        </div>
    </div>

    <div class="content">
        <button type="button" class="btn btn-success me-2" onclick="showClubs()">Clubs</button>
        <button type="button" class="btn btn-danger me-2" onclick="showTournaments()">Tournaments</button>
        <button type="button" class="btn btn-info">Players</button>
        <button type="button" class="btn btn-primary w-100 mb-2 sign-in"
            onclick="window.location.href='{{ route('login') }}'">Sign In/Log In</button>

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
                    <div class="clubs-item">{{ $club->title }}</div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="card" id="tournamentsList" style="display: none;">
            <div class="card-header">Tournaments Filter</div>
            <div class="card-body">
                <form id="filterForm">
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
                    <div class="tournaments-item">{{ $tournament->title }}</div>
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
                            `<div class="tournaments-item">${tournament.title}</div>`
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
                            `<div class="clubs-item">${club.title}</div>`
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
</body>

</html>