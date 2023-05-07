<?php 

session_start();

?>


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
    include ("adatbazis.php");

    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email' && password = 'password'";

        $result = mysqli_query($conn, $sql);
        $user = mysqli_num_rows($result);

        if ($user == 1) 
        {
            $_SESSION['e_mail'] = $email;
            header('location: profil.php');
        }
        else{
            echo "<script>
                alert('A belépés sikertelen!');
            </script>";
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