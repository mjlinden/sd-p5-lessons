<?php
global $inputs;
var_dump($inputs)
?>

<!DOCTYPE html>
<?php
include_once 'modules/database.php';
include_once 'modules/functions.php'
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
        <p class="display-5 fw-bold"><?=getSmartphoneName($_GET['id'])?> bestellen</p>
        <form  method="post">
            <div class="mb-3 mt-3">
                <label for="fname" class="form-label">Voornaam:</label>
                <input type="text" class="form-control" id="fname" value="<?php echo $inputs['fname'] ?? '' ?>" name="fname" >
                <div  class="form-text text-danger">
                    <?= $errors['fname'] ?? '' ?>
                </div>
            </div>

            <div class="mb-3 mt-3">
                <label for="lname" class="form-label">Achternaam:</label>
                <input type="text" class="form-control" id="lname" value="<?php echo $inputs['lname'] ?? '' ?>"  name="lname" >
                <div  class="form-text text-danger">
                    <?= $errors['lname'] ?? '' ?>
                </div>
            </div>

            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" value="<?php echo $inputs['email'] ?? '' ?>" name="email" >
                <div  class="form-text text-danger">
                    <?= $errors['email'] ?? '' ?>
                </div>
            </div>

            <div class="mb-3 mt-3">
                <label for="address" class="form-label">Adres:</label>
                <input type="text" class="form-control" id="address"  value="<?php echo $inputs['address'] ?? '' ?>" name="address" >
                <div  class="form-text text-danger">
                    <?= $errors['address'] ?? '' ?>
                </div>
            </div>

            <div class="mb-3 mt-3">
                <label for="zipcode" class="form-label">Postcode:</label>
                <input type="text" class="form-control" id="zipcode"  value="<?php echo $inputs['zipcode'] ?? '' ?>" name="zipcode" >
                <div  class="form-text text-danger">
                    <?= $errors['zipcode'] ?? '' ?>
                </div>
            </div>

            <div class="mb-3 mt-3">
                <label for="city" class="form-label">Woonplaats:</label>
                <input type="text" class="form-control" id="city" value="<?php echo $inputs['city'] ?? '' ?>" name="city" >
                <div  class="form-text text-danger">
                    <?= $errors['city'] ?? '' ?>
                </div>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="myCheck" name="agree" >
                <label class="form-check-label" for="myCheck">I agree on conditions.</label>
                <div  class="form-text text-danger">
                    <?= $errors['agree'] ?? '' ?>
                </div>
            </div>


            <button type="submit" class="btn btn-primary mb-5">Submit</button>
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
