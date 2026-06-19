<?php

session_start();

include '../includes/config.php';

$id = $_GET['id'];

$result = $conn->query(
    "SELECT * FROM news WHERE id=$id"
);

$news = $result->fetch_assoc();

if(isset($_POST['update']))
{
    $title = $_POST['title'];
    $content = $_POST['content'];

    $conn->query(
        "UPDATE news
         SET title='$title',
             content='$content'
         WHERE id=$id"
    );

    header("Location: news-list.php");
    exit();
}

include '../includes/header.php';
?>

<div class="container">

<h2>Uredi vijest</h2>

<form method="POST">

<label>Naslov</label>

<input
type="text"
name="title"
value="<?php echo $news['title']; ?>"
required>

<label>Tekst</label>

<textarea
name="content"
rows="8"
required><?php echo $news['content']; ?></textarea>

<button type="submit" name="update">
Spremi promjene
</button>

</form>

</div>

<?php include '../includes/footer.php'; ?>