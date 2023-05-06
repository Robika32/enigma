<?php
require "adatbazis.php";
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

  <link rel="stylesheet" href="../CSS/webshop.css">

  <title>Dreams Otthon Kft. Webshop</title>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
          <a class="nav-link active" href="../PHP/reg.php">Regisztráció</a>
          <a class="nav-link active" href="../PHP/belépés.php">Belépés</a>
        </div>
        <?php 
        $count=0;
          if(isset($_SESSION['cart'])){
            $count = count($_SESSION['cart']);
          }
        ?>
        <a href="../PHP/kosar.php" class="btn btn-outline-info my-2 my-sm-0"><i class="bi bi-basket"></i> Kosár (<?php echo $count; ?>) </a>
      </div>
    </div>
  </nav>

  <br>
  <br>
  <hr>

    <h4 class="display-4 text-primary">Minőségi bútorok</h4>
    <h2 class="display-4">Kedvező áron!</h2>
    <h1 class="display-5 text-primary">Dreams Otthon segít, hogy lakásod szebb legyen.</h1>
    <p class="display-7 text-secondary">Webáruházunk nagy választéka szolgálatára!</p>

  <hr>

  <div class="container-fluid">
  <section id="feature" class="section-p1">
    <div class="fe-box">
      <img src="../Képek/shipping.png" width="120" height="120" alt="">
      <h6>Ingyenes szállítás</h6>
    </div>
    <div class="fe-box">
      <img src="../Képek/money.jpg" width="120" height="120" alt="">
      <h6>Megtakarítás könnyen</h6>
    </div>
    <div class="fe-box">
      <img src="../Képek/clock.png" width="120" height="120" alt="">
      <h6>30 napos visszatérités garancia</h6>
    </div>
    <div class="fe-box">
      <img src="../Képek/operator.png" width="120" height="120" alt="">
      <h6>Ügyfélszolgálat a nap 24 órájában</h6>
    </div>
  </section>
  </div>
  <br>

    <h2 class="display-5 text-info text-center">Legkelendőbb termémek</h2>
    <h4 class="text-center">A nyári szezon velünk lesz szebb</h4>
<br>
<hr>
    <div class="container-flex">

      <div class="row">
      <?php
      while($product = mysqli_fetch_assoc($featured)):
      ?>
      <div class="col-lg-3 mx-4">
          <form action="kosar_manager.php" method="post">
            <div class="card h-100 my-lg-5 mx-lg-5" style="width: 18rem;">
              <img src="<?= $product['kep'];?>" class="img-fluid card-img-top img-thumbnail" alt="">
              <div class="card-body text-center">
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
      <div class="row">
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
          <p class="my-1"><a href="#" class="text-decoration-none text-secondary">#1 Bútor restaurálás</p></a>
          <p class="my-1"><a href="#" class="text-decoration-none text-secondary">#2 Homestaging</p></a>
          <p class="my-1"><a href="#" class="text-decoration-none text-secondary">#3 Bútor összerakás</p></a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>

  <script src="../JS/webshop.js"></script>
</body>

</html>