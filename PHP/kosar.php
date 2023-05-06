<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <title>Dreams Otthon Webshop Kosár</title>

</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Dreams Otthon Kft</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="../PHP/index.php"><i
                                class="bi bi-house"></i>
                            Főoldal</a>
                        <a class="nav-link active" href="../PHP/webshop.php"><i class="bi bi-basket"></i> Webshop</a>
                        <li class="nav-item">
                            <a class="nav-link active" href="#elérhetőség"><i class="bi bi-card-list"></i>
                                Elérhetőségek</a>
                        </li>
                        <a class="nav-link active" href="../PHP/reg.php">Regisztráció</a>
                        <a class="nav-link active" href="../PHP/belépés.php">Belépés</a>
                    </div>
                    <?php
                    $count = 0;
                    if (isset($_SESSION['cart'])) 
                    {
                        $count = count($_SESSION['cart']);
                    }
                    ?>
                    <a href="../PHP/kosar.php" class="btn btn-outline-info my-2 my-sm-0"><i class="bi bi-basket"></i>
                        Kosár (
                        <?php echo $count; ?>)
                    </a>
                </div>
            </div>
        </nav>
    </div>
    </nav>
    </div>

    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 text-center border rounded bg-light my-5">
                <h1>Kosaram</h1>
            </div>

            <div class="col-lg-3">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Termék száma:</th>
                            <th scope="col">Név:</th>
                            <th scope="col">Ár:</th>
                            <th scope="col">Mennyiség:</th>
                            <th scope="col">Összesen:</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        if (isset($_SESSION['cart'])) 
                        {
                            foreach ($_SESSION['cart'] as $key => $value) 
                            {
                                $sr = $key+1;
                            echo "
                                <tr>
                                <td>$sr</td>
                                <td>$value[Item_Name]</td>
                                <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                                <form action='kosar_manager.php' method='POST'>
                                    <td><input class='text-center iquantity' name='Mod_Quantity' onchange='subTotal();' type='number' value='$value[Quantity]' min='1' max='10'></td>
                                    <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                </form>

                                <td class='itotal'></td>

                                <td>
                                    <form action='kosar_manager.php' method='POST'>
                                    <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>TÖRLÉS</button>
                                    <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                    </form>
                                </td>
                            </tr>
                            ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-3">
                <div class="border bg-light rounded">

                    <h4>Fizetendő összeg:</h4>

                    <h5 class="text-right" id='gtotal'></h5>

                    <br>

                    <?php 

                        if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
                        {
                    
                    ?>
                    <form action="vasarlas.php" method="POST">
                        <h6>Fizetési mód:</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pay_mode" value="COD" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Utánvétel
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pay_mode" value="CP" id="flexRadioDefault2"
                                checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Kártyásfizetés
                            </label>
                        </div>
                        <div class="mb-3">
                        <label>Teljes név:</label>
                        <input type="text" name="teljesnev" class="form-control" required>
                        </div>
                        <div class="mb-3">
                        <label>Telefon:</label>
                        <input type="text" name="telefon" class="form-control" required>
                        </div>
                        <div class="mb-3">
                        <label>Lakcím:</label>
                        <input type="text" name="lakcim" class="form-control" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary btn-block" name="vasarlas" type="submit">Rendelés</button>
                        </div>
                    </form>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var gtotal = document.getElementById('gtotal');

        function subTotal()
        {
            gt=0;
            for (i=0; i < iprice.length; i++)
            {
                
                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);

                gt = gt+(iprice[i].value) * (iquantity[i].value);
            }
            gtotal.innerText = gt;
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>


</html>