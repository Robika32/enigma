<?php
require('adatbazis.php');
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

  <link rel="stylesheet" href="../CSS/style.css">

  <title>Enigma Projekt Oldal</title>

</head>

<body>

  <div class="container-lg">
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top z-1">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Dreams Otthon Kft</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="../PHP/index.php"><i class="bi bi-house"></i>
              Főoldal</a>
            <a class="nav-link active" href="../PHP/webshop.php"><i class="bi bi-basket"></i> Webshop</a>
            <li class="nav-item">
              <a class="nav-link active" href="#elérhetőség"><i class="bi bi-card-list"></i> Elérhetőségek</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../PHP/kosar.php"><i class="bi bi-cart"></i> Kosár</a>
            </li>
            <a class="nav-link active" href="../PHP/reg.php">Regisztráció</a>
            <a class="nav-link active" href="../PHP/belépés.php">Belépés</a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <div class="container-lg my-5">
    <div class="row my-5">
      <div class="col-lg my-5">
        <h1 class="display-4 text-primary text-center">Dreams Otthon Kft</h1>
        <h5 class="text-secondary text-center">Felújítaná otthonát?</h5>
        <h5 class="text-secondary text-center">Nálunk könnyen választhat tág kínálatunkból!</h5>
        <h4 class="text-primary text-center">Széles választék. Megbízható szállítás. Garantált elégedettség.</h4>
      </div>
    </div>

    <div class="d-lg-flex justify-content-center align-items-center">
      <div class="col-lg-8">
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../Képek/slide1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../Képek/slide2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="../Képek/slide3.png" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="display-4 text-center text-info">TOP Termékeink</h1>
      </div>
    </div>
  </div>

  <div class="container-lg">

  <div class="row">
  <?php
  while($product = mysqli_fetch_assoc($featured)):
  ?>
  <div class="col-lg-3 mx-3">
      <form action="kosar_manager.php" method="post">
        <div class="card h-100" style="width: 18rem;">
          <img src="<?= $product['kep'];?>" class="img-fluid card-img-top img-thumbnail" alt="">
          <div class="card-body my-lg-5 text-center">
            <a href="#"></a>
            <h3 class="h6 mb-3 card-title lh-base "><?= $product['cimsor'];?></h3>
            </a>
            <p><?= $product['leiras']?></p>
            <p class="card-text">Ár: <?= $product['ar'];?> Ft.</p>
            <div class="row">
              <div class="col-lg-6">
                <button type="submit" name="Add_to_cart" class="btn btn-primary">Kosárba</button>
                <input type="hidden" name="Item_Name" value="<?= $product['cimsor']?>">
                <input type="hidden" name="Price" value="<?= $product['ar']?>">
              </div>
            </div>
      </form>
    </div>
  </div>
  </div>
  <?php endwhile; ?>

  <hr>

  <footer class="bg-light mt-5 border-top py-5 text-primary" id="elérhetőség">
    <div class="container">
      <div class="row my-5">
        <div class="col">
          <p class="fw-bold text-info">Ügyfélszolgálat és panaszbejelentés</p>
          <p class="my-1">Enigma Hungary Kft.</p>
          <p class="my-1">1111, Budapest, Kis utca 25.</p>
          <p class="my-1">support@enigma.hu</p>
          <p class="my-1">+36 00 012 4444</p>
        </div>
        <div class="col">
          <p class="fw-bold text-info">Információ</p>
          <p class="my-1"><a href="#" class="text-decoration-none text-secondary">Kiszállás</p></a>
          <p class="my-1"><a href="#" class="text-decoration-none text-secondary">Szállítás feltételei</p></a>
          <p class="my-1"><a href="#" class="text-decoration-none text-secondary">Fizetési feltételek</p></a>
          <p class="my-1"><a href="#" class="text-decoration-none text-secondary">Biztonságos vásárlás</p></a>
          <p class="my-1"><a href="#" class="text-decoration-none text-secondary">Vásárlási feltételek</p></a>
          <p class="my-1"><a href="#" class="text-decoration-none text-secondary">Rólunk mondták</p></a>
          <p class="my-1"><a href="#" class="text-decoration-none text-secondary">Adatvédelem</p></a>
        </div>
        <div class="col">
          <p class="fw-bold text-info">Népszerű kategóriák</p>
          <p class="my-1"><a href="#" class="text-decoration-none text-secondary">> Home staging</p></a>
          <p class="my-1"><a href="#" class="text-decoration-none text-secondary">> Bútor összerakás</p></a>
          <p class="my-1"><a href="webshop.php" class="text-decoration-none text-secondary">> Webshop</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>