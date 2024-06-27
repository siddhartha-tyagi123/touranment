@include('nav')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Upcoming Tournaments
                </div>
                <div class="card-body">
                    @foreach($upcomingTournaments as $upcomingTournament)
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-3">
                                <!-- <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title">{{ $upcomingTournament->title }}</h5>
                                    <!-- Add more details here if available -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
