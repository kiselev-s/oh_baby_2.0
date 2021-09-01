<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="test_style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="menu">
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <div class="menu-inner">

        <ul>
            <li>
                <a class="nav-link" href="/test">Home</a>
            </li>
            <li>
                <a class="nav-link" href="/docs_test">Documents</a>
            </li>
            <li>
                <a class="nav-link" href="/health_test">Health</a>
            </li>
            <li>
                <a class="nav-link" href="/growth_test">Growth</a>
            </li>
            <li>
                <a class="nav-link" href="#">Settings</a>
            </li>
            <li>
                <a class="nav-link" href="#">LogIn</a>
            </li>
            <li>
                <a class="nav-link" href="#">LogOut</a>
            </li>
        </ul>
    </div>



    <svg version="1.1" id="blob"xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <path id="blob-path" d="M60,500H0V0h60c0,0,20,172,20,250S60,900,60,500z"/>
    </svg>
</div>

<div class="content">
    @yield('main_content')
</div>
{{--<h2> hover close to the menu </h2>--}}
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="test.js"></script>

</body>
</html>
