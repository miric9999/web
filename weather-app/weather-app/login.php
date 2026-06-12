<?php

session_start();

include 'includes/config.php';

$message = '';

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email='$email'";

    $result = $conn->query($sql);

    if($result->num_rows == 1)
    {
        $user = $result->fetch_assoc();

        if(
            password_verify(
                $password,
                $user['password']
            )
        )
        {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];
            
            header("Location: index.php");
            exit();
        }
    }

    $message = "Pogrešni podaci.";
}

include 'includes/header.php';
?>

<div class="container">

    <h2>Prijava</h2>

    <p><?php echo $message; ?></p>

    <form method="POST">

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Lozinka</label>
        <input type="password" name="password" required>

        <button type="submit" name="login">
            Prijavi se
        </button>

    </form>

</div>

<?php include 'includes/footer.php'; ?>