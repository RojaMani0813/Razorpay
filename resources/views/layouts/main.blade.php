<html>
<head>
    <title>Course management</title>
    <meta charset="UTF-8">
    @yield('head-data')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
</head>
<body>
    <h2 class="text-center" style="margin-top: 1%">Course List</h2>

    <div class="container">
        <div class="row align-items-center justify-content-center" style="margin-top: 2%">
            <a href="{{ route('course') }}" class="btn btn-primary">List Courses</a>
            <a href="{{ route('add-movie') }}" class="btn btn-primary" style="margin-left: 1%">Add new Course</a>
        </div>

        <div class="row align-items-center justify-content-center" style="margin-top: 5%">
            @yield('content')
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
</body>
</html>