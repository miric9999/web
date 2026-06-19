<?php include 'includes/header.php'; ?>


<section class="hero">

    <div class="hero-content">

        <h1>Weather Forecast Croatia</h1>

        <p>
            Aktualna vremenska prognoza za najveće hrvatske gradove.
            Pratite temperaturu, vlagu zraka i brzinu vjetra u stvarnom vremenu.
        </p>

    </div>

</section>

<section class="weather-section">

    <h2>Provjeri vremensku prognozu</h2>

    <form method="GET" class="city-form">

        <select name="city">

            <option value="Zagreb">Zagreb</option>
            <option value="Split">Split</option>
            <option value="Rijeka">Rijeka</option>
            <option value="Osijek">Osijek</option>
            <option value="Zadar">Zadar</option>
            <option value="Pula">Pula</option>
            <option value="Dubrovnik">Dubrovnik</option>
            <option value="Varaždin">Varaždin</option>

        </select>

        <button type="submit">Prikaži prognozu</button>

    </form>

    <?php

    $cities = [
        'Zagreb'    => ['45.81', '15.98'],
        'Split'     => ['43.51', '16.44'],
        'Rijeka'    => ['45.33', '14.44'],
        'Osijek'    => ['45.55', '18.69'],
        'Zadar'     => ['44.11', '15.23'],
        'Pula'      => ['44.87', '13.85'],
        'Dubrovnik' => ['42.65', '18.09'],
        'Varaždin'  => ['46.31', '16.34']
    ];

    $selected = $_GET['city'] ?? 'Zagreb';

    if(isset($cities[$selected])){

        $lat = $cities[$selected][0];
        $lon = $cities[$selected][1];

        $json = file_get_contents(
            "https://api.open-meteo.com/v1/forecast?latitude=$lat&longitude=$lon&current=temperature_2m,relative_humidity_2m,wind_speed_10m"
        );

        $data = json_decode($json, true);

        $temp = $data['current']['temperature_2m'];
        $humidity = $data['current']['relative_humidity_2m'];
        $wind = $data['current']['wind_speed_10m'];

        echo '

        <div class="weather-result">

            <h3>'.$selected.'</h3>

            <div class="temp">'.$temp.'°C</div>

            <p>Humidity: '.$humidity.'%</p>

            <p>Wind speed: '.$wind.' km/h</p>

        </div>';

    }

    ?>

</section>

<section class="about-weather">

    <h2>O aplikaciji</h2>

    <p>
        Weather Forecast Croatia koristi Open-Meteo API za dohvat
        aktualnih meteoroloških podataka za gradove diljem Hrvatske.
    </p>

    <p>
        Sustav omogućuje brz pregled temperature, vlage zraka i brzine vjetra
        kroz jednostavno i pregledno korisničko sučelje.
    </p>

</section>

<div class="social-icons">

    <a href="#"><i class="fab fa-facebook"></i></a>

    <a href="#"><i class="fab fa-instagram"></i></a>

    <a href="#"><i class="fab fa-x-twitter"></i></a>

    <a href="#"><i class="fab fa-youtube"></i></a>

</div>

<?php include 'includes/footer.php'; ?>