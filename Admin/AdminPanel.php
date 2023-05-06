<?php

require '../PHP/adatbazis.php';
session_start();

?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream-Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>

    <!-- As a link -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dream_Admin Panel</a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <table class="table text-center table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Rendelés Azonosító</th>
                            <th scope="col">Megrendelő neve</th>
                            <th scope="col">Telefonszám</th>
                            <th scope="col">Lakcíme</th>
                            <th scope="col">Fizetés mód</th>
                            <th scope="col">Termékek/Mennyiség</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM `megrendelo`";
                            $result = mysqli_query($conn, $query);
                            while ($result_fetch = mysqli_fetch_assoc($result)){
                                echo "
                                <tr>
                                <td>$result_fetch[id]</td>
                                <td>$result_fetch[teljesnev]</td>
                                <td>$result_fetch[telefon]</td>
                                <td>$result_fetch[lakcim]</td>
                                <td>$result_fetch[fizetes_mod]</td>
                                <td>
                                <table class='table text-center table-dark'>
                                    <thead>
                                        <tr>
                                            <th scope='col'>Termék Neve</th>
                                            <th scope='col'>Ár</th>
                                            <th scope='col'>Mennyiség</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                ";
                                $rendeles = "SELECT * FROM `felhasznalo_vetel` WHERE 'id'='$result_fetch[id]'";
                                $rendeles_result= mysqli_query($conn,$rendeles);
                                while ($rendeles_result = mysqli_fetch_assoc($rendeles_result)){
                                    echo "
                                    <tr>
                                        <td>$rendeles_resutl[termek_nev]</td>
                                        <td>$rendeles_resutl[termek_ar]</td>
                                        <td>$rendeles_resutl[termek_menny]</td>
                                    </tr>
                                    ";
                                }
                            echo "
                                    </tbody>
                                </table>
                            </td>
                            </tr>
                            ";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>