<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peters Foodstore - Home</title>
    <!-- OWL carousel -->
    
</head>

<body>
    <!-- Navbar -->
    @include('partials.navigation')

    <!-- Hero Video -->
    <div class="header">
        <video autoplay muted loop playsinline>
            <source src="{{ asset('Assets/1192-143842659_small.mp4') }}" type="video/mp4">
            Je browser ondersteunt geen video achtergrond.
        </video>

        <div class="header-content">
            <h1>Peters Foodstore</h1>
            <p>Heerlijke smaken, elke dag opnieuw</p>
            <a href="/reserveringen" style="text-decoration: none"><button class="standardButton">Reserveren</button></a>
        </div>
    </div>

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
            <h3 class="subtitle">Impressie (Foto's door Google)</h3>
            <h2 class="pb-4">Proef de sfeer</h2>
        </div>
    </div>
    <div class="owl-carousel">
        <div><img src="https://lh3.googleusercontent.com/gps-cs-s/AC9h4npxvhz6K8c_zL_x8LJ9VMp9SCO94sCiKwnMCWm5ZXpVt0HbE4ft5SNnZ_VGCIrFwpx0_YQBtp9Utp0pon-bTIIHV9ifyHG2EqwPgaECoi9eHTEEvdQe_3Wxf7nKp5hAkFoJPG0q_hAK4wDo=s1360-w1360-h1020-rw" alt="Foto 1"></div>
        <div><img src="https://lh3.googleusercontent.com/gps-cs-s/AC9h4npAcEkmTr1uQ9aocvf5ofyHwf1FiysiOAfdAHuOpbrEco2tK0n3NezkIFnTeZOK86FirMHuZq-z0c675lCNAAsC_GGwFueLRYewHoKINiAA75Y0LAiycXIn0tTaL16Psjg8ufgn=s1360-w1360-h1020-rw" alt="Foto 2"></div>
        <div><img src="https://lh3.googleusercontent.com/gps-cs-s/AC9h4noHtk8Bc7nsBySS7XG7T47X5G-MUQTkmbFxv_kuZoGzY16C_CRfKEfY4MmEA3WtVcrU4eQDhP_ovpv0zYtyxVOdomfvGIPFZdq5cuqn_78_8dt7EV-a7sOjgK0Dm03laV7-G9G16A=s1360-w1360-h1020-rw" alt="Foto 3"></div>
        <div><img src="https://lh3.googleusercontent.com/gps-cs-s/AC9h4np7oF0tOFo5RuFn-JTUy7-v8jmihrWDjNiAxEQisktl3Ws9rRRog017503zUeW4DyRSAGFDcs9ek030SEM6HYfqSIzX2_4ywM2R-n5G-RwgFxXJGR-VM_J6clHHj_vbLKM1Olr9=s1360-w1360-h1020-rw" alt="Foto 4"></div>
    </div>
    @include('partials.footer')
    
</body>


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