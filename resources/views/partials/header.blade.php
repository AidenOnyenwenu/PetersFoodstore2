<header class="standard-header" style="background-image: url({{ asset($image) }})">
    <div class="overlay">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Links: Tekst -->
            <div class="col-md-6">
                <h1 class="mb-0">{{ $title ?? 'Welkom bij Peters Foodstore' }}</h1>
                <p class="lead">{{ $subtitle ?? 'De lekkerste producten voor elke dag!' }}</p>
            </div>

            <!-- Rechts: Foto -->
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                @if(isset($image))
                    
                @endif
            </div>

        </div>
    </div>
    </div>
</header>
