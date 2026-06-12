<?php

session_start();

include '../includes/config.php';

$result = $conn->query(
    "SELECT * FROM news ORDER BY created_at DESC"
);

include '../includes/header.php';
?>

<div class="container">

<h2>Administracija vijesti</h2>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Naslov</th>
    <th>Datum</th>
    <th>Akcije</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['title']; ?></td>

<td><?php echo $row['created_at']; ?></td>

<td>

<a href="edit-news.php?id=<?php echo $row['id']; ?>">
Uredi
</a>

|

<a href="delete-news.php?id=<?php echo $row['id']; ?>">
Obriši
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<?php include '../includes/footer.php'; ?>