<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/belepes.css">

    <title>Belépés</title>
</head>

<body>

    <?php

    if (isset($_POST)) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        require_once "adatbazis.php";

        $sql = "SELECT * FROM users WHERE email $email = '$email'";

        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($user) {
            if (password_verify($password, $user["password"])) {
                header("Location: profil.php");
                die();
            } else {
                echo "<div class='alert alert-danger'>Jelszó nem egyezik!</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>email$email$email nem egyezik!</div>";
        }
    }

    ?>

    <div class="container">
        <h1>Belépés</h1>
        <form action="profil.php" method="POST">
            <input type="text" name="email" required placeholder="Email: ">
            <input type="password" name="password " required placeholder="Jelszó:">
            <button type="submit">Belépés</button>
            <div class="regi">
                <label> <a href="#">Elfelejtetem a jelszót</a></label> <br>
                <label> <a href="../PHP/reg.php">Még nem regisztrált</a></label>
            </div>
        </form>
    </div>

</body>

</html>