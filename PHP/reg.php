<?php
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$passwordRepeat = $_POST["repeat_password"];

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$errors = array();

if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    array_push($errors, 'Nem maradhat üres hely!');
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, 'Az Email cím nem létezik!');
}
if (strlen($password) < 8) {
    array_push($errors, 'A jelszó kevesebb, mint 8 karakter!');
}
if ($password !== $passwordRepeat) {
    array_push($errors, "Jelszó nem egyezik!");
}

require_once "adatbazis.php";
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$rowCount = mysqli_num_rows($result);
if ($rowCount > 0) {
    array_push($errors, "Email már foglalt!");
}
if (count($errors) > 0) {
    foreach ($errors as $errors) {
        echo "<div class='alert alert-danger'>$errors</div>";
    }
} else {
    $sql = "INSERT INTO users (username, email, password) VALUES (? , ? , ?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $passwordHash);
        mysqli_stmt_execute($stmt);
        echo "<div class='alert alert-success'>Regisztráció sikeres!</>";
    } else {
        die("Hiba a regisztcáió közben!");
    }
}
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/register.css">

    <title>Enigma Projekt Regisztrációs Oldal</title>


</head>

<body>

        <div class="wrapper">
            <div class="box">
                <h2>Fiók létrehozása</h2>
                <form class="form-control" action="reg.php" method="POST">
                    <div class="input-box">
                        <input type="text" class="form-group" name="username" required>
                        <label>Felhasználónév</label>
                        <i class="bi bi-person"></i>
                    </div>

                    <div class="input-box">
                        <input type="password" class="form-group " name="password" required>
                        <label>Jelszó</label>
                        <i class="bi bi-eye" id="password_image"></i>
                    </div>

                    <div class="input-box">
                        <input type="password" class="form-group " name="repeat_password" required>
                        <label>Jelszó újra</label>
                        <i class="bi bi-eye" id="password_image"></i>
                    </div>

                    <div class="input-box">
                        <input type="email" class="form-group" name="email" required>
                        <label>E-mail</label>
                        <i class="bi bi-envelope-at"></i>
                    </div>

                    <p>Adatvédelmi feltételek elfogadása.<input type="checkbox" name="adatved" required></p>
                    <p>Használati feltételek elfogadása.<input type="checkbox" name="hasznal" required></p>
                    <button class="signup_button" type="submit" name="register" value="register">Fiók létrehozása.</button>
                    <div class="login_link"><a href="#">Már van fiókja?</a></div>
                    <div class="contact_link"><a href="#">Kapcsolat felvétel.</a></div>
                </form>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>

</body>


</html>