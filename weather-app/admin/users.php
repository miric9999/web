<?php

session_start();

include '../includes/config.php';

$result = $conn->query(
    "SELECT * FROM users"
);

include '../includes/header.php';
?>

<div class="container">

<h2>Korisnici</h2>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Korisničko ime</th>
<th>Email</th>
<th>Role</th>
<th>Akcije</th>
</tr>

<?php while($user = $result->fetch_assoc()) { ?>

<tr>

<td><?php echo $user['id']; ?></td>

<td><?php echo $user['username']; ?></td>

<td><?php echo $user['email']; ?></td>

<td><?php echo $user['role']; ?></td>

<td>

<a href="edit-user.php?id=<?php echo $user['id']; ?>">
Uredi
</a>

|

<a href="delete-user.php?id=<?php echo $user['id']; ?>">
Obriši
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<?php include '../includes/footer.php'; ?>