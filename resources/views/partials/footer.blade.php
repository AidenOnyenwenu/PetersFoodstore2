@vite('resources/css/app.css')
<footer class="bg-light py-5">
    <div class="container">
        <div class="row">

            <!-- Kolom 1: Bedrijfsnaam + social icons -->
            <div class="col-md-3 mb-4">
                <h5>Peters Foodstore</h5>
                <div class="d-flex gap-2 mt-2">
                    <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Kolom 2: Pagina links -->
            <div class="col-md-3 mb-4">
                <h6>Menu</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about') }}">Over ons</a></li>
                    <li><a href="{{ url('/services') }}">Diensten</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </div>

            <!-- Kolom 3: Pagina links -->
            <div class="col-md-3 mb-4">
                <h6>Producten</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/producten/fruit') }}">Fruit</a></li>
                    <li><a href="{{ url('/producten/groenten') }}">Groenten</a></li>
                    <li><a href="{{ url('/producten/dranken') }}">Dranken</a></li>
                    <li><a href="{{ url('/producten/snacks') }}">Snacks</a></li>
                </ul>
            </div>

            <!-- Kolom 4: Pagina links -->
            <div class="col-md-3 mb-4">
                <h6>Klantenservice</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/faq') }}">FAQ</a></li>
                    <li><a href="{{ url('/bezorgen') }}">Bezorging</a></li>
                    <li><a href="{{ url('/retourneren') }}">Retourneren</a></li>
                    <li><a href="{{ url('/privacy') }}">Privacybeleid</a></li>
                </ul>
            </div>

        </div>
        <div class="text-center pt-4">
            <small>&copy; {{ date('Y') }} Peters Foodstore. Alle rechten voorbehouden.</small>
        </div>
    </div>
</footer>
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.0.0/css/all.css" />

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.0.0/css/sharp-solid.css" />

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.0.0/css/sharp-regular.css" />

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.0.0/css/sharp-light.css" />

<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v7.0.0/css/duotone.css" />



<!-- jQuery + Owl Carousel JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>