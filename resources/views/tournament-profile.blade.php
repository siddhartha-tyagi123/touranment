<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <p><strong>Name:</strong> {{ $tournament->title }}</p>
        <p><strong>Organiser:</strong> {{ $tournament->organiser }}</p>
        <p><strong>Date:</strong> {{ $tournament->date }}</p>
        <p><strong>Age:</strong> {{ $tournament->age }}</p>
        <p><strong>Country:</strong> {{ $tournament->country->country_name }}</p>
        
        <!-- Add other tournament details here -->
        <a href="{{ url('/') }}">Back to Profile</a>
    </div>
</body>
</html>
