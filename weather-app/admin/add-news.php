<?php

session_start();

include '../includes/config.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin')
{
    die("Pristup zabranjen.");
}

$message = '';

if(isset($_POST['save']))
{
    $title = $_POST['title'];
    $content = $_POST['content'];

    $image = $_FILES['image']['name'];

    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "../uploads/" . $image
    );

    $sql = "INSERT INTO news(title,content,image)
            VALUES('$title','$content','$image')";

    if($conn->query($sql))
    {
        $message = "Vijest spremljena.";
    }
}

include '../includes/header.php';
?>

<div class="container">

<h2>Dodaj vijest</h2>

<p><?php echo $message; ?></p>

<form method="POST" enctype="multipart/form-data">

    <label>Naslov</label>
    <input type="text" name="title" required>

    <label>Tekst</label>
    <textarea name="content" rows="8" required></textarea>

    <label>Slika</label>
    <input type="file" name="image" required>

    <button type="submit" name="save">
        Spremi
    </button>

</form>

</div>

<?php include '../includes/footer.php'; ?>