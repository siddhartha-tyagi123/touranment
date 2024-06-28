@include('nav')

<div class="container">
    <div class="row">
        <!-- Main content area -->
        <main role="main">

            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>
            <div class="row">
                @if(auth()->check() && auth()->user()->type == 3 && auth()->user()->status == 1)
                <div class="col-xl-4 col-sm-8 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body text-center mt-3">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>

                            <a href="{{ route('upcoming.tournament') }}" class="text-white">Upcoming Tournament</a>

                        </div>
                    </div>
                </div>
                @else
                <div class="col-xl-4 col-sm-8 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">26 New Messages!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                @endif
                @if(auth()->check() && auth()->user()->type == 3 && auth()->user()->status == 1)
                <div class="col-xl-4 col-sm-8 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body text-center mt-3">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>
                            <a href="{{ route('past.tournament') }}" class="text-white">Past Tournament</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-xl-4 col-sm-8 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">11 New Tasks!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                @endif
                @if(auth()->check() && auth()->user()->type == 3 && auth()->user()->status == 1)
                <div class="col-xl-4 col-sm-8 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body text-center mt-3">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>
                            <a href="#" class="text-white">Organise A Tournament</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-xl-4 col-sm-8 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">123 New Orders!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                @endif
                @if(auth()->check() && auth()->user()->type == 3 && auth()->user()->status == 1)
                <div class="col-xl-4 col-sm-8 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body text-center mt-3">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>
                            <a href="{{ route('action.picture.show') }}" class="text-white">Pictures</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-xl-4 col-sm-8 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-support"></i>
                            </div>
                            <div class="mr-5">13 New Tickets!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                @endif
                @if(auth()->check() && auth()->user()->type == 3 && auth()->user()->status == 1)
                <div class="col-xl-4 col-sm-8 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body text-center mt-3">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>
                            <a href="{{ route('tournament.information') }}" class="text-white">Informations & Rules</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-xl-4 col-sm-8 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">123 New Orders!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                @endif
                @if(auth()->check() && auth()->user()->type == 3 && auth()->user()->status == 1)
                <div class="col-xl-4 col-sm-8 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body text-center mt-3">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>
                            <a href="{{ route('club.contact.us') }}" class="text-white">Contact The Club</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-xl-4 col-sm-8 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">11 New Tasks!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p></p>
                </div>
            </div>
            <!-- Gallery Section -->
            <section id="gallery" class="gallery section">
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="row gy-4 justify-content-center">

                        <!-- Dynamic Clubs List -->
                        <div class="col-md-12" id="clubsList" style="display: none;">
                            <div class="card">
                                <div class="card-header">Clubs</div>
                                <div class="card-body">
                                    <button type="button" id="searchButtonClub">Search For Club</button>
                                    <form id="filterFormOne" action="#">
                                        <div class="container">
                                            <div class="row g-3">
                                                <div class="col-6 col-md-3">
                                                    <label for="title_filter">Club Name</label>
                                                    <input type="text" name="title_filter" id="title_filter"
                                                        class="form-control">
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <label for="club_country_filter">Country</label>
                                                    <select name="club_country_filter" id="club_country_filter"
                                                        class="form-select">
                                                        <option value="">Select</option>
                                                        <!-- Replace with actual options dynamically generated -->
                                                        @foreach ($clubCountryOptions as $id => $country)
                                                        <option value="{{ $id }}">{{ $country }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-3">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="applyClubFilters()">Filter</button>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="club-container mt-3">
                                        <!-- Replace with actual data dynamically generated -->
                                        @foreach($data['clubs'] as $club)
                                        <a href="{{ route('club.show', $club->id) }}" class="club-link">
                                            <div class="clubs-item">{{ $club->title }}</div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dynamic Tournaments List -->
                        <div class="col-md-12" id="tournamentsList" style="display: none;">
                            <div class="card">
                                <div class="card-header">Tournaments</div>
                                <div class="card-body">
                                    <button type="button" id="searchButton">Search For Tournament</button>
                                    <form id="filterForm" class="searchFilter" style="display: none;">
                                        <div class="container">
                                            <div class="row g-3">
                                                <div class="col-6 col-md-3">
                                                    <label for="age_filter">Age</label>
                                                    <select name="age_filter" id="age_filter" class="form-select">
                                                        <option value="">Select</option>
                                                        <!-- Replace with actual options dynamically generated -->
                                                        @foreach ($ageOptions as $age)
                                                        <option value="{{ $age }}">{{ $age }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <label for="date_filter">Date</label>
                                                    <select name="date_filter" id="date_filter" class="form-select">
                                                        <option value="">Select</option>
                                                        <!-- Replace with actual options dynamically generated -->
                                                        @foreach ($dateOptions as $date)
                                                        <option value="{{ $date }}">{{ $date }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <label for="organiser_filter">Organiser</label>
                                                    <select name="organiser_filter" id="organiser_filter"
                                                        class="form-select">
                                                        <option value="">Select</option>
                                                        <!-- Replace with actual options dynamically generated -->
                                                        @foreach ($organiserOptions as $organiser)
                                                        <option value="{{ $organiser }}">{{ $organiser }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <label for="country_filter">Country</label>
                                                    <select name="country_filter" id="country_filter"
                                                        class="form-select">
                                                        <option value="">Select</option>
                                                        @foreach ($countryOptions as $id => $country)
                                                        <option value="{{ $id }}">{{ $country }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-3">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="applyTournamentFilters()">Filter</button>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="tournaments-container mt-3" id="tournamentsContainer">
                                        <!-- Replace with actual data dynamically generated -->
                                        @foreach($data['tournaments'] as $tournament)
                                        <a href="{{ route('tournament.show', $tournament->id) }}"
                                            class="tournament-link">
                                            <div class="tournaments-item" data-status="{{ $tournament->status }}">
                                                {{ $tournament->title }}
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
<footer id="footer" class="footer">
    <div class="container">
        <div class="copyright text-center">
            <p>© <span>2024</span> <strong class="px-1 sitename">PhotoFolio</strong> <span>All Rights
                    Reserved</span></p>
        </div>
        <div class="social-links d-flex justify-content-center">
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
        </div>
        <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="admin_assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="admin_assets/assets/vendor/aos/aos.js"></script>
<script src="admin_assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="admin_assets/assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Main JS File -->
<script src="admin_assets/assets/js/main.js"></script>

<script>
// Function to show clubs list and hide tournaments list
function showClubs() {
    document.getElementById("clubsList").style.display = "block";
    document.getElementById("tournamentsList").style.display = "none";
}

// Function to show tournaments list and hide clubs list
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

// Event listener for Search For Tournament button
document.getElementById('searchButton').addEventListener('click', function() {
    var filterForm = document.getElementById('filterForm');
    if (filterForm.style.display === 'none' || filterForm.style.display === '') {
        filterForm.style.display = 'block';
    } else {
        filterForm.style.display = 'none';
    }
});

// Event listener for Search For Club button
document.getElementById('searchButtonClub').addEventListener('click', function() {
    var filterFormOne = document.getElementById('filterFormOne');
    if (filterFormOne.style.display === 'none') {
        filterFormOne.style.display = 'block';
    } else {
        filterFormOne.style.display = 'none';
    }
});


// Event listener for Upcoming Tournament button
document.getElementById('upcomingButton').addEventListener('click', function() {
    var tournaments = document.querySelectorAll('.tournaments-item');
    tournaments.forEach(function(tournament) {
        if (tournament.getAttribute('data-status') === 'upcoming') {
            tournament.style.display = 'block';
        } else {
            tournament.style.display = 'none';
        }
    });
});

// Event listener for Past Tournament button
document.getElementById('pastButton').addEventListener('click', function() {
    var tournaments = document.querySelectorAll('.tournaments-item');
    tournaments.forEach(function(tournament) {
        if (tournament.getAttribute('data-status') === 'past') {
            tournament.style.display = 'block';
        } else {
            tournament.style.display = 'none';
        }
    });
});
</script>
</div>
</body>

</html>