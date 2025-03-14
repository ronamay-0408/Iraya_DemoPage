<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Iraya Energies | Demo</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('Iraya-logo-favicon.png') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Exo 2' rel='stylesheet'>
    </head>
    <header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container-nav">
                <a class="navbar-brand" href="#page-top"><img src="{{ asset('img/system-logo.png') }}" alt=""></a>
                
                <div class="btns">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="profile" id="profileDropdown">
                        <i class="fas fa-user-circle fa-2x"></i>
                        <div class="dropdown-menu" id="dropdownMenu">
                            <h4>{{ Auth::user()->name }}</h4>  
                            <hr style="margin: 0;">
                            <a href="{{ route('admin') }}">Dashboard</a>
                            <a href="{{ route('profile.edit') }}">View Profile</a>
                            <a href="{{ route('logout') }}">Log Out</a>
                        </div>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#home">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="#products">Products <i class="fa-solid fa-chevron-down"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('welcome') }}" target="_blank">Demo</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>
                        <li class="nav-item"><a class="nav-link" href="#services">Services <i class="fa-solid fa-chevron-down"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About Us <i class="fa-solid fa-chevron-down"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="#resources">Resources <i class="fa-solid fa-chevron-down"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <body id="page-top">
        <!-- Footer-->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script>
            $(document).ready(function(){
                $("#profileDropdown").click(function(event){
                    event.stopPropagation();
                    $("#dropdownMenu").toggle();
                });

                $(document).click(function(){
                    $("#dropdownMenu").hide();
                });
            });
        </script>
    </body>
</html>
