<?php
session_start();

if (isset($_POST['submit'])) {
    $first_name = $_POST['name'];
    $password = $_POST['pass'];

    if (isset($_SESSION['first_name']) && isset($_SESSION['hashed_password'])) {
        if ($first_name === $_SESSION['first_name'] && password_verify($password, $_SESSION['hashed_password'])) {
            $_SESSION['logged_in'] = true;

            echo "succesful login";
            exit;
        } else {
            $error = "neplatne jmeno nebo heslo";
        }
    } else {
        $error = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h2>Přihlášení</h2>
<?php if(isset($error)) echo "<p>$error</p>"; ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="name" placeholder="Jméno" required><br>
    <input type="password" name="pass" placeholder="Heslo" required><br>
    <input type="submit" name="submit" value="Přihlásit">
</form>
</body>
</html>