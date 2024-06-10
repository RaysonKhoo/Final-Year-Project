<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Hostel Parcel Management System</title>
        <!-- Favicon-->
        <link rel="icon" type="image/png" href="{{ asset('auth_page/images/icons/UMS.png') }}"/>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="{{ asset('front_page/css/styles.css') }}" rel="stylesheet" />

    </head>
    <body id="page-top">
<style>
/* Center and style carousel control text */
    .container-announcement{
        height: 380px;
        margin: 0;
        position: relative;
    }
    .carousel-inner{
        height: 380px;
        transition: transform 0.1s ease; /* Adjust the duration and easing function as needed */
    }
    .carousel-item{
        text-align: center;
        width: auto;
        height: 380px;
        transform: translate3d(0, 0, 0);
        background-color: white;
        transition: transform 0.1s ease; /* Adjust the duration as needed */
    }
    .content-wrapper {
        max-width: 500px; /* Adjust the maximum width as needed */
        margin: 0 auto; /* Center the content within the container */
        position: relative; /* Add position relative to the content wrapper */


    }

    .announcement-content{
        font-size: 26px; /* You can adjust the size as needed */
        word-wrap: break-word; /* Allow long words to break and wrap to the next line */
    }

    .carousel-control-prev, .carousel-control-next {
        background: rgba(0, 0, 0, 0.5); /* Background color for previous and next arrows */
        border: none; /* Remove border */
        color: #fff; /* Color of the arrow icons */
        border-radius: 50%; /* Make arrow buttons round */
        width: 40px; /* Adjust the width as needed */
        height: 40px; /* Adjust the height as needed */
        text-align: center; /* Center text horizontally */
        line-height: 40px; /* Center text vertically */
        font-size: 16px; /* Adjust the font size as needed */
        position: absolute;
        top: 50%; /* Position at the vertical center */
        transform: translateY(-60%); /* Vertically center using translateY */

    }
    .carousel-control-prev {
        left: 0; /* Position on the left */
    }

    .carousel-control-next {
        right: 0; /* Position on the right */
    }

    /* Active indicator color */
    .carousel-indicators .active {
        background-color: #007bff; /* Customize the color as needed */
    }

    /* Inactive indicator color */
    .carousel-indicators li {
        background-color: #ccc; /* Customize the color as needed */
    }
    .text-right {
        text-align: right;
        position: absolute;
        bottom: 0;
        right: 0;/* Adjust this as needed for precise alignment */
        font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 20px;
        margin-right: 9px;
    }
</style>
<!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <nav class="navbar navbar-expand-lg bg-dark text-uppercase fixed-top" id="mainNav">
                    <a class="navbar-brand" href="">&nbsp;&nbsp;Hostel Parcel Management</a>
                        <button class="navbar-toggler text-uppercase font-weight-bold bg-dark text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                            Menu
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#announcement">Announcement</a></li>
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#about">About</a></li>
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#contact">Contact</a></li>
                                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('auth') }}">Login</a></li>
                            </ul>

                    </div>
                </nav>
            </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="{{ asset('front_page/assets/img/parcel.png') }}" alt="..." />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0"> Hostel Parcel Management</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Efficient Parcel Handling for Hostel Residents</p>
        </div>
    </header>
        <!-- Announcement Section-->
<div class="container-announcement" id="announcement">
    <div id="announcementCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators, if needed -->
        <ol class="carousel-indicators">
            @php
            $announcements = App\Models\Announcement::all();
            @endphp
            @foreach ($announcements as $index => $announcement)
                <li data-target="#announcementCarousel" data-slide-to="{{ $index }}" {{ $index === 0 ? 'class="active"' : '' }}></li>
            @endforeach
        </ol>
        <!-- Carousel items -->
        <div class="carousel-inner">
            @php
            $announcements = App\Models\Announcement::all();
            @endphp
            @foreach ($announcements as $index => $announcement)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <br><br>
                <div class="content-wrapper">
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0" style="font-size: 2.25rem; line-height: 2rem;">{{ $announcement->title }}</h2>
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <p class="announcement-content text-center text-capitalize capitalize-first" style="text-transform: uppercase;">{{ $announcement->content }}</p>
                </div>
                <div class="text-right">
                    <br><br>
                    <p><strong>Published on:</strong> {{ $announcement->published_at->format('F j, Y') }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Controls -->
        <a class="carousel-control-prev" href="#announcementCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#announcementCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>


        <!-- About Section-->
        <section class="page-section bg-primary text-white mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">About</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto">
                        <p class="lead">Our Hostel Parcel Management System is designed to streamline the handling and tracking of parcels within the hostel premises. It provides a user-friendly interface for both hostel staff and residents.</p>
                    </div>
                    <div class="col-lg-4 me-auto">
                        <p class="lead">Residents can easily log in to the system, track their parcels, and receive timely notifications. Hostel staff can efficiently manage parcel deliveries, update parcel statuses, and ensure a smooth parcel handling process.</p>
                    </div>
                </div>
                <!-- About Section Button-->

        </section>

        <!-- Footer-->
        <footer class="footer text-center bg-dark" id="contact">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">
                            Universiti Malaysia Sabah, Jalan UMS, 88400 Kota Kinabalu, Sabah, MALAYSIA
                        </p>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Contact Us</h4>
                        <p class="lead mb-0">
                            Email: info@hostelparcelsystem.com
                            <br />
                            Phone: (088) 456-7890
                        </p>
                    </div>

                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Connect With Us</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>

                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white bg-dark">
            <div class="container">
                <small>&copy; Copyright <span id='currentYear'></span> Hostel Parcel Management System|All Rights Reserved</small>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('front_page/js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>




        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            // Get the current year
            const currentYear = new Date().getFullYear();

            // Update the content of the span element
            document.getElementById('currentYear').textContent = currentYear;
        </script>
        <script>
            $(document).ready(function(){
                $('#announcementCarousel').carousel();
            });
        </script>

    </body>
</html>
