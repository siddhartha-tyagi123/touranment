<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tournament Information</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <style>
    body {
      padding-top: 20px;
    }
    .tournament-info {
      margin-bottom: 30px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      @foreach($tournamentInfo as $info)
      <div class="col-md-8 offset-md-2">
        <div class="text-center mb-4">
          <h1>{{ $info->title}}</h1>
          <p class="lead">Date & Time: {{ $info->dateTimeTournament}}</p>
          <p class="lead">Location: {{ $info->country->country_name}} {{$info->city}}</p>
        </div>

        <div class="tournament-info">
          <h2>About the Tournament</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lectus in purus hendrerit fringilla. Vestibulum consequat, magna ac laoreet porttitor, justo leo hendrerit neque, vel dapibus sem nulla sed nisl. </p>
        </div>

        <div class="tournament-info">
          <h2>Schedule</h2>
          <p>Day 1 (June 30, 2024): Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          <p>Day 2 (July 1, 2024): Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          <p>Day 3 (July 2, 2024): Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <div class="tournament-info">
          <h2>Participants</h2>
          <ul>
            <li>Team A</li>
            <li>Team B</li>
            <li>Team C</li>
            <!-- Add more teams as necessary -->
          </ul>
        </div>

        <div class="tournament-info">
          <h2>Contact Information</h2>
          <p>For inquiries, please contact: <a href="mailto:info@example.com">info@example.com</a></p>
        </div>

      </div>
      @endforeach
    </div>
  </div>

  <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
