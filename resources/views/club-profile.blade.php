<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <p><strong>Name:</strong> {{ $club->title }}</p>
        <p><strong>Country:</strong> {{ $club->country->country_name }}</p>
        
        <a href="{{ url('/') }}">Back to Profile</a>
    </div>
</body>
</html>
