<?php

session_start();

include '../includes/config.php';

$id = $_GET['id'];

$result = $conn->query(
    "SELECT * FROM users WHERE id=$id"
);

$user = $result->fetch_assoc();

if(isset($_POST['save']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $conn->query(
        "UPDATE users
        SET username='$username',
            email='$email',
            role='$role'
        WHERE id=$id"
    );

    header("Location: users.php");
    exit();
}

include '../includes/header.php';
?>

<div class="container">

<h2>Uredi korisnika</h2>

<form method="POST">

<input
type="text"
name="username"
value="<?php echo $user['username']; ?>">

<input
type="email"
name="email"
value="<?php echo $user['email']; ?>">

<select name="role">

<option value="user">
User
</option>

<option value="admin">
Admin
</option>

</select>

<button name="save">
Spremi
</button>

</form>

</div>

<?php include '../includes/footer.php'; ?>