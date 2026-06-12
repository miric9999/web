<?php

session_start();

if(
    !isset($_SESSION['role'])
    ||
    $_SESSION['role'] != 'admin'
)
{
    die("Pristup zabranjen.");
}

include '../includes/header.php';
?>

<div class="container">

<h2>Admin Panel</h2>

<ul>

<li>
<a href="add-news.php">
Dodaj vijest
</a>
</li>

<li>
<a href="news-list.php">
Administracija vijesti
</a>
</li>

<li>
<a href="users.php">
Administracija korisnika
</a>
</li>

</ul>

</div>

<?php include '../includes/footer.php'; ?>