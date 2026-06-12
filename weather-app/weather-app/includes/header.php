<?php
if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>

<link rel="stylesheet" href="/weather-app/css/style.css"></head>
<body>

<header>
    
    <div class="container">
        <link rel="icon" href="images/favicon.png
    ">
        <h1>Weather Forecast Croatia</h1>

        <nav>
            <ul>
                <?php if(isset($_SESSION['user_id'])) { ?>

    <li><a href="/weather-app/logout.php">Odjava</a></li>

<?php } else { ?>

    <li><a href="/weather-app/login.php">Prijava</a></li>

    <li><a href="/weather-app/register.php">Registracija</a></li>

<?php } ?>
<?php
if(
    isset($_SESSION['role'])
    &&
    $_SESSION['role'] == 'admin'
)
{
?>
<li>
    <a href="/weather-app/admin/dashboard.php">
        Admin
    </a>
</li>
<?php
}
?>
                <li><a href="/weather-app/index.php">Početna</a></li>
                <li><a href="/weather-app/news.php">Novosti</a></li>
                <li><a href="/weather-app/gallery.php">Galerija</a></li>
                <li><a href="/weather-app/about.php">O nama</a></li>
                <li><a href="/weather-app/contact.php">Kontakt</a></li>
                <li>
    <a href="/weather-app/weather-json.php">
        Weather JSON
    </a>
</li>

<li>
    <a href="/weather-app/weather-xml.php">
        Weather XML
    </a>
</li>
            </ul>
        </nav>
        <?php
if(isset($_SESSION['username']))
{
    echo "<p style='text-align:center'>
    Prijavljen: " .
    $_SESSION['username'] .
    "</p>";
}
?>
    </div>
</header>

<main>