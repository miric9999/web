<?php

include 'includes/config.php';
include 'includes/header.php';

$result = $conn->query(
    "SELECT * FROM news ORDER BY created_at DESC"
);
?>

<div class="container">

<h2>Novosti</h2>

<?php while($row = $result->fetch_assoc()) { ?>

<div class="news-box">

<h3>
<?php echo $row['title']; ?>
</h3>

<p>
<?php echo $row['created_at']; ?>
</p>

<img
src="uploads/<?php echo $row['image']; ?>"
width="300">

<p>

<?php
echo substr(
    $row['content'],
    0,
    150
);
?>

...

</p>

<a href="article.php?id=<?php echo $row['id']; ?>">
Više
</a>

</div>

<hr>

<?php } ?>

</div>

<?php include 'includes/footer.php'; ?>