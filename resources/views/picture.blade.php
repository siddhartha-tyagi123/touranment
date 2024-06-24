<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Images</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Optional Bootstrap theme -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css"> -->
    <!-- Bootstrap Icons (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>

    <div class="container">
        <h1 class="text-center mt-5 mb-4">Tournament Action Photo</h1>

        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4 text-center">
                @forelse($actionPictures as $actionPicture)
                <div class="card">
                    @if($actionPicture->images)
                    @foreach(explode(',', $actionPicture->images) as $image)
                    <img src="{{ asset('storage/' . trim($image)) }}" width="150px" height="150px" class="ml-5"/>
                    @endforeach
                    @else
                    No images available
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$actionPicture->title}}</h5>
                        <p class="card-text">{{$actionPicture->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Repeat the above card structure for more images -->

        </div><!-- /.row -->

    </div><!-- /.container -->

    <!-- Bootstrap JS, Popper.js, and jQuery (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>