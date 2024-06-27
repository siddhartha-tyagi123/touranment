@include('nav')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Action Photos</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom styles -->
    <style>
        .card-img-top {
            object-fit: cover;
            height: 150px;
            width: 100%;
        }
        h1, h2, h3, h4, h5, h6 {
      color: black;
    }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="text-center mt-5 mb-4">Tournament Action Photos</h1>

        <div class="row">
            @forelse($actionPictures as $actionPicture)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    @if($actionPicture->images)
                    @foreach(explode(',', $actionPicture->images) as $image)
                    <img src="{{ asset('storage/' . trim($image)) }}" class="card-img-top" alt="Action Photo">
                    @break <!-- Only display the first image -->
                    @endforeach
                    @else
                    <div class="text-center">
                        No images available
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$actionPicture->title}}</h5>
                        <p class="card-text">{{$actionPicture->description}}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col text-center">
                <p>No action photos available.</p>
            </div>
            @endforelse
        </div><!-- /.row -->

    </div><!-- /.container -->

    <!-- Bootstrap JS, Popper.js, and jQuery (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
