<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css'><link rel="stylesheet" href="test_style2.css">

</head>
<body>
<!-- partial:index.partial.html -->
<nav class="navbar navbar-expand-custom navbar-mainbg">
    <a class="navbar-brand navbar-logo" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-white"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <div class="hori-selector"><div class="left"></div><div class="right"></div></div>
            <li class="nav-item">
                <a class="nav-link" href="/test2"><i class="fas fa-tachometer-alt"></i>Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/docs_test2"><i class="far fa-copy"></i>Documents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/health_test2"><i class="far fa-clone"></i>Health</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/growth_test2"><i class="far fa-calendar-alt"></i>Growth</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-chart-bar"></i>Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-address-book"></i>LogIn</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="far fa-address-book"></i>LogOut</a>
            </li>
        </ul>
    </div>
</nav>
<!-- partial -->

<div class="">
    @yield('main_content')
</div>

<script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script><script  src="test2.js"></script>

</body>
</html>
