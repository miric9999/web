<?php

include 'includes/config.php';

$id = $_GET['id'];

$result = $conn->query(
    "SELECT * FROM news WHERE id=$id"
);

$news = $result->fetch_assoc();

include 'includes/header.php';
?>

<div class="container">

<h2><?php echo $news['title']; ?></h2>

<p><?php echo $news['created_at']; ?></p>

<img
src="uploads/<?php echo $news['image']; ?>"
width="500">

<p>
<?php echo $news['content']; ?>
</p>

</div>

<?php include 'includes/footer.php'; ?>