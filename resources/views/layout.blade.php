<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body class="bg-dark text-white">

<div>
{{--    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">--}}
{{--        <div class="container-fluid">--}}
{{--            <a class="navbar-brand" href="#">Navbar</a>--}}
{{--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}
{{--            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">--}}
{{--                <div class="navbar-nav">--}}
{{--                    <a class="nav-link active" aria-current="page" href="/">Home</a>--}}
{{--                    <a class="nav-link" href="/docs">Documents</a>--}}
{{--                    <a class="nav-link" href="/health">Health</a>--}}
{{--                    <a class="nav-link" href="/growth">Growth</a>--}}
{{--                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Growth</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
            <ul class="navbar-nav">
{{--                <li class="nav-item active">--}}
{{--                    <a class="nav-link" href="#">Centered nav only <span class="sr-only">(current)</span></a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/docs">Documents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/health">Health</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/growth">Growth</a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="container">
    @yield('main_content')
</div>


</body>
</html>
