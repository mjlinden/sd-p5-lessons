<?php
if(isset($_POST['send'])){
if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['mail']) && !empty($_POST['adress']) && !empty($_POST['zipcode']) && !empty($_POST['area'])) {
$_SESSION['firstName'] = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION['lastName'] = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION['mail'] = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);
$_SESSION['adress'] = filter_input(INPUT_POST, "adress", FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION['zipcode'] = filter_input(INPUT_POST, "zipcode", FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION['area'] = filter_input(INPUT_POST, "area", FILTER_SANITIZE_SPECIAL_CHARS);
if(!$_SESSION['mail']){
$mail = "is-invalid";
} else{
try {
$db = new PDO("mysql:host=localhost;dbname=zuzu",
"root", "");
$adressInput = $db->prepare("INSERT INTO `adress`(`adress`, `zipcode`, `area`) VALUES(:a_adress, :a_zipcode, :a_area)");
$customerInput = $db->prepare("INSERT INTO `customer`(`first_name`, `last_name`, `mail`, adress_id) VALUES(:c_first_name, :c_last_name, :c_mail, :c_adress_id)");
$adressQuerry = $db->prepare("SELECT `adress_id` FROM `adress` WHERE `adress` = :a_adress AND `zipcode` = :a_zipcode AND `area` = :a_area");
$customerQuerry = $db->prepare("SELECT `customer_id` FROM `customer` WHERE `first_name` = :c_first_name AND `last_name` = :c_last_name AND `mail` = :c_mail");
$adressQuerry->bindParam(":a_adress", $_SESSION['adress']);
$adressQuerry->bindParam(":a_zipcode", $_SESSION['zipcode']);
$adressQuerry->bindParam(":a_area", $_SESSION['area']);
$adressQuerry->execute();
$adress = $adressQuerry->fetchAll(PDO::FETCH_ASSOC);
if(!$adress) {
$adressInput->bindParam(":a_adress", $_SESSION['adress']);
$adressInput->bindParam(":a_zipcode", $_SESSION['zipcode']);
$adressInput->bindParam(":a_area", $_SESSION['area']);
$adressInput->execute();
$adress = $adressQuerry->fetchAll(PDO::FETCH_ASSOC);
}
$customerQuerry->bindParam(":c_first_name", $_SESSION['firstName']);
$customerQuerry->bindParam(":c_last_name", $_SESSION['lastName']);
$customerQuerry->bindParam(":c_mail", $_SESSION['mail']);
$customerQuerry->execute();
if($adress[0]['adress_id']){
$customerInput->bindParam(":c_first_name", $_SESSION['firstName']);
$customerInput->bindParam(":c_last_name", $_SESSION['lastName']);
$customerInput->bindParam(":c_mail", $_SESSION['mail']);
$customerInput->bindParam(":c_adress_id", $adress[0]['adress_id']);
$customerInput->execute();
$customer = $customerQuerry->fetchAll(PDO::FETCH_ASSOC);
}
header("location: bestellen.php");
} catch (PDOException $exception) {
die("Error!: " . $exception->getMessage());
}
}}
$_SESSION['mail'] = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);
if(!$_SESSION['mail']){
$mail = "is-invalid";
}
}
?>

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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center pt-3">
                <p class="fw-bold display-4">welkom bij SmartPhone4u</p>
                <p class="fs-4">Selecteer een merk</p>

            </div>

        </div>
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">home</a></li>
                    <li class="breadcrumb-item"><a href="vendor.php">vendors</a></li>
                    <li class="breadcrumb-item" ><a href="smartphones.php?id= <?= getVendorId($_GET['id']) ?>"><?= getVendorNameFromProductId($_GET['id'])?> </a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= getSmartphoneName($_GET['id']) ?></li>
                </ol>
            </nav>
            <div class="row">
                <?php $smartphone = getSmartphone($_GET['id']); ?>

                <div class="row gy-3 mb-5">

                    <div class="col-12">
                        <div class="card" >
                            <img class="img-fluid center-block" width="200px" src='img/phones/<?= $smartphone->picture ?>'/>
                            <div class="card-body">
                                <h5 class="card-title"><?= $smartphone->name ?></h5>
                                <p class="card-text"><?= $smartphone->description ?></p>
                            </div>
                            <a href="order.php?id=<?= $smartphone->id?>" class="btn btn-primary">Bestellen</a>
                        </div>
                    </div>

                </div>




            </div>
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
