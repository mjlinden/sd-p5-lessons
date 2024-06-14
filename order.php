<!DOCTYPE html>
<?php
require 'modules/database.php';
require 'modules/functions.php'
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SmartPhone4u Home</title>
    <link rel="stylesheet" href="css/phones.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white fs-3" href="index.php">SmartPhone4u</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active fs-5 text-white" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary fs-5" href="vendor.php">Bestellen</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<header>
    <div class="container-fluid py-5 "  style="background: url('img/header.png'); background-size: cover">
        <div class="row py-5"></div>
    </div>
</header>
<main>
    <div class="container-lg">
        <form class="row pt-3" method="post">
            <div class="col-lg-12">
                <p class="display-5 fw-bold"><?=getSmartphoneName($_GET['id'])?> bestellen</p>
                <div class="mb-4 col-lg-12">
                    <label for="exampleFormControlInput1" class="form-label">Voornaam</label>
                    <input type="text" value="<?php if(isset($_POST['firstName'])){ echo $_POST['firstName']; } ?>" class="form-control <?php if(isset($_POST['firstName'])){
                        if(empty($_POST['firstName'])){
                            echo "is-invalid";
                        } else {echo "is-valid";}
                    } ?>" name="firstName" id="exampleFormControlInput1" required>
                    <div class="invalid-feedback">
                        Voer een voornaam in aub.
                    </div>
                    <div class="mb-4 mt-4 col-lg-12">
                        <label for="exampleFormControlInput2" class="form-label">Achternaam</label>
                        <input type="text" value="<?php if(isset($_POST['lastName'])){ echo $_POST['lastName']; } ?>" class="form-control <?php if(isset($_POST['lastName'])){
                            if(empty($_POST['lastName'])){
                                echo "is-invalid";
                            } else {echo "is-valid";}
                        } ?>" name="lastName" id="exampleFormControlInput2" required>
                        <div class="invalid-feedback">
                            Voer een achternaam in aub.
                        </div>
                    </div>
                    <div class="mb-4 col-lg-12">
                        <label for="exampleFormControlInput3" class="form-label">Email</label>
                        <input type="email" value="<?php if(isset($_POST['mail'])){ echo $_POST['mail']; } ?>" class="form-control <?php if(isset($mail)){
                            if(empty($_POST['mail'])){
                                echo "is-invalid";
                            } elseif($_SESSION['mail'] === false) {
                                echo "is-invalid";
                            } else {echo "is-valid";}
                        }?>" name="mail" id="exampleFormControlInput3" required>
                        <div class="invalid-feedback">
                            Voer een e-mail adres in aub.
                        </div>
                    </div>
                    <div class="mb-4 col-lg-12">
                        <label for="exampleFormControlInput4" class="form-label">Adres</label>
                        <input type="text" value="<?php if(isset($_POST['adress'])){ echo $_POST['adress']; } ?>" class="form-control <?php if(isset($_POST['adress'])){
                            if(empty($_POST['adress'])){
                                echo "is-invalid";
                            } else {echo "is-valid";}
                        } ?>" name="adress" id="exampleFormControlInput4" required>
                        <div class="invalid-feedback">
                            Voer een adres in aub.
                        </div>
                    </div>
                    <div class="mb-4 col-lg-12">
                        <label for="exampleFormControlInput5" class="form-label">Postcode</label>
                        <input type="text" value="<?php if(isset($_POST['zipcode'])){ echo $_POST['zipcode']; } ?>" class="form-control <?php if(isset($_POST['zipcode'])){
                            if(empty($_POST['zipcode'])){
                                echo "is-invalid";
                            } else {echo "is-valid";}
                        } ?>" name="zipcode" id="exampleFormControlInput5" required>
                        <div class="invalid-feedback">
                            Voer een postcode in aub.
                        </div>
                    </div>
                    <div class="mb-3 col-lg-12">
                        <label for="exampleFormControlInput6" class="form-label">Woonplaats</label>
                        <input type="name" value="<?php if(isset($_POST['area'])){ echo $_POST['area']; } ?>" class="form-control <?php if(isset($_POST['area'])){
                            if(empty($_POST['area'])){
                                echo "is-invalid";
                            } else {echo "is-valid";}} ?>" name="area" id="exampleFormControlInput6" required>
                        <div class="invalid-feedback">
                            Voer een woonplaats in aub.
                        </div>
                    </div>
                <input class="btn btn-md btn-dark text-white mb-5" type="submit" name="finish">
            </div>
        </form>
    </div>
</main>
<footer class="bg-dark">
    <div class="container-fluid text-white">
        <div class="row pb-3">
            <div class="col-md-6 mt-4 text-center">
                <ul class="list-unstyled">
                    <li class="list-group-item fw-bold">Contactgegevens</li>
                    <li class="list-group-item">SmartPhone4u</li>
                    <li class="list-group-item">Phoenixstraat 1</li>
                    <li class="list-group-item">1111AA Delft</li>
                    <li class="list-group-item">smartphones4u@gmail.com</li>
                    <li class="list-group-item">06- 12345678</li>
                </ul>
            </div>
            <div class="col-md-6 mt-4 text-center">
                <ul class="list-unstyled">
                    <li class="list-group-item fw-bold">Openingstijden</li>
                    <li class="list-group-item">Maandag: Gesloten</li>
                    <li class="list-group-item">Dinsdag: 16:00 - 22:00</li>
                    <li class="list-group-item">Woensdag: 16:00 - 22:00</li>
                    <li class="list-group-item">Donderdag: 16:00 - 22:00</li>
                    <li class="list-group-item">Vrijdag: 15:00 - 22:00</li>
                    <li class="list-group-item">Zaterdag: 15:00 - 22:00</li>
                    <li class="list-group-item">Zondag: Gesloten</li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</body>
</html>