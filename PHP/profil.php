<?php 
session_start();
echo "Üdvözöljük".$_SESSION['e_mail'];
?>

<!DOCTYPE html>

<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


    <link rel="stylesheet" href="../CSS/profil.css">

    <title>Enigma Projekt Oldal Profil Oldal</title>

</head>

<body>

    <!--Felső navigációs sáv-->
    <div class="container">

            <!--Bal adattömb (Még változhat, mivel PHP-val szeretnék adatbázisból betölteni az ügyvél adatait.)-->
            <div class="row">
                <div class="col-md-4 mt-1">
                    <div class="card text-center sidebar">
                        <div class="card-body">
                            <img src="../Képek/profil.png" class="rounded-circle" width="150">
                            <h3>Üdvözöljük!</h3>
                            <hr>
                            <div class="mt-3">
                                <a href="./index.php">Főoldal</a>
                                <hr>
                                <a href="#">Hibajelentés</a>
                                <hr>
                                <a href="#">Segítség</a>
                                <hr>
                                <a href="#">Kijelentkezés</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job oldali adatömb (Szintén az adatbázisból szeretnénk az adatok megjelenítését.) -->
                <div class="col-md-8 mt-1">
                    <div class="card mb-3 content">
                        <h1 class="m-3 pt-3">Profil Adatok:</h1>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h5>Teljes név:</h5>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    ""
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Email</h5>
                                    </div>
                                    <div class="col-md-8 text-secondary">
                                        megrendelő@email.eu
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5>Telefon</h5>
                                    </div>
                                    <div class="col-md-9 text-secondary">
                                        -367000012
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>