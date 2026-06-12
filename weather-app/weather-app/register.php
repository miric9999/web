<?php

include 'includes/config.php';

$message = '';

if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $sql = "INSERT INTO users
            (username,email,password)
            VALUES
            ('$username','$email','$password')";

    if($conn->query($sql))
    {
        $message = "Registracija uspješna!";
    }
    else
    {
        $message = "Greška!";
    }
}

include 'includes/header.php';
?>

<div class="container">

    <h2>Registracija</h2>

    <p><?php echo $message; ?></p>

    <form method="POST">

        <label>Korisničko ime</label>
        <input type="text" name="username" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Lozinka</label>
        <input type="password" name="password" required>

        <button type="submit" name="register">
            Registriraj se
        </button>

    </form>

</div>

<?php include 'includes/footer.php'; ?>