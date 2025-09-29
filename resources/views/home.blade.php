<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peters Foodstore - Home</title>
    <!-- OWL carousel -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Lexend+Deca:wght@100..900&display=swap"
        rel="stylesheet">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: "DM Sans", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            overflow-x: hidden;
        }

        .header {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .header video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
            transform: translate(-50%, -50%);
            object-fit: cover;
        }

        .header-content {
            position: relative;
            z-index: 1;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            background: rgba(0, 0, 0, 0.4);
            padding: 20px;
        }

        .header-content h1 {
            font-size: 3rem;
            margin: 0;
        }

        .header-content p {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .header-content .btn {
            margin-top: 20px;
            padding: 10px 20px;
            background: #ff6600;
            border: none;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
        }

        .header-content .btn:hover {
            background: #e65c00;
        }

        .content-section {
            padding: 60px 15px;
        }

        .content-section img {
            max-width: 100%;
            border-radius: 10px;
        }

        .bg-color-standard {
            background-color: #FEF3E2;
        }

        .standardButton {
            background-color: #DD0303;
            border: none;
            border-radius: 30px;
            padding: 15px 25px;
            color: white;
        }

        .navbar {
            background-color: #000000db !important;
        }

        .owl-nav button {
            position: absolute;
            top: 40%;
            background: rgba(0, 0, 0, 0.5) !important;
            color: #fff !important;
            border-radius: 50%;
            padding: 10px 15px !important;
        }

        .owl-nav .owl-prev {
            left: -40px;
        }

        .owl-nav .owl-next {
            right: -40px;
        }

        .owl-carousel {
            background-color: #FEF3E2;
            cursor: grab;
            padding-bottom: 50px;
        }

        .container h2 {
            margin: 0;
        }

        .subtitle {
            font-size: 20px;
            font-weight: 600;
            color: #DD0303
        }

        .nav-item {
            align-items: center;
            display: flex;
            margin-right: 15px;
        }

        .nav-item-special {
            padding: 5px 10px;
            border-radius: 20px;
            border: 1px solid gray;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Peters Foodstore</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    <li class="nav-item-special"><a class="nav-link" href="#">Reserveren</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Video -->
    <header class="header">
        <video autoplay muted loop playsinline>
            <source src="{{ asset('Assets/1192-143842659_small.mp4') }}" type="video/mp4">
            Je browser ondersteunt geen video achtergrond.
        </video>

        <div class="header-content">
            <h1>Peters Foodstore</h1>
            <p>Heerlijke smaken, elke dag opnieuw</p>
            <button class="standardButton">Bekijk onze producten</button>
        </div>
    </header>

    <!-- Content Section -->
    <section class="content-section bg-color-standard">
        <div class="container">
            <div class="row align-items-center">
                <!-- Links: Foto -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="https://www.sopranos-eindhoven.nl/wp-content/uploads/2024/09/sopranos-giornale-restaurants-final-24-scaled.jpg" alt="Peters Foodstore">
                </div>
                <!-- Rechts: Tekst -->
                <div class="col-md-6">
                    <h2>Over Peters Foodstore</h2>
                    <p>
                        Bij Peters Foodstore draait alles om smaak, versheid en beleving.
                        Wij selecteren de beste ingrediënten om onze klanten dagelijks te
                        verrassen met heerlijke gerechten. Of je nu komt voor een snelle
                        lunch, een uitgebreid diner of een gezellige borrel: bij ons voel je je thuis.
                    </p>
                    <p>
                        Kom langs en ervaar zelf waarom Peters Foodstore dé plek is om samen te genieten van eten en
                        drinken.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-color-standard">
        <div class="container text-center">
            <h3 class="subtitle">Impressie</h3>
            <h2 class="pb-4">Proef de sfeer</h2>
        </div>
    </div>
    <div class="owl-carousel">
        <div><img src="https://picsum.photos/id/1015/600/400" alt="Foto 1"></div>
        <div><img src="https://picsum.photos/id/1016/600/400" alt="Foto 2"></div>
        <div><img src="https://picsum.photos/id/1018/600/400" alt="Foto 3"></div>
        <div><img src="https://picsum.photos/id/1019/600/400" alt="Foto 4"></div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<!-- jQuery + Owl Carousel JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function () {
        $(".owl-carousel").owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            margin: 20,           // ruimte tussen items (px)
            responsive: {
                0: {
                    items: 1          // vanaf 0px tot 991px → 1 item
                },
                992: {
                    items: 3.5          // vanaf 992px en groter → 3 items
                }
            }
        });
    });

</script>

</html>