<?php

const FNAME_REQUIRED = 'Voornaam invullen';
const LNAME_REQUIRED = 'Achternaam invullen';
const EMAIL_REQUIRED = 'Email invullen';
const EMAIL_INVALID = 'Geldig email adres invullen';
const ADRESS_REQUIRED = 'Adres invullen';
const ZIPCODE_REQUIRED = 'Postcode invullen';
const CITY_REQUIRED = 'Woonplaats invullen';
const AGREE_REQUIRED = 'Voorwaarden accepteren';

// sanitize and validate fname
$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
$inputs['fname'] = $fname;

if ($fname) {
    $fname = trim($fname);
    if ($fname === '') {
        $errors['fname'] = FNAME_REQUIRED;
    }
} else {
    $errors['fname'] = FNAME_REQUIRED;
}

// sanitize and validate lname
$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_SPECIAL_CHARS);
$inputs['lname'] = $lname;

if ($lname) {
    $lname = trim($lname);
    if ($lname === '') {
        $errors['lname'] = LNAME_REQUIRED;
    }
} else {
    $errors['lname'] = LNAME_REQUIRED;
}

// sanitize & validate email
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$inputs['email'] = $email;
if ($email) {
    // validate email
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        $errors['email'] = EMAIL_INVALID;
    }
} else {
    $errors['email'] = EMAIL_REQUIRED;
}

// sanitize and validate adress
$adress = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
$inputs['address'] = $adress;

if ($adress) {
    $adress = trim($adress);
    if ($adress === '') {
        $errors['address'] = ADRESS_REQUIRED;
    }
} else {
    $errors['address'] = ADRESS_REQUIRED;
}

// sanitize and validate zipcode
$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_SPECIAL_CHARS);
$inputs['zipcode'] = $zipcode;

if ($zipcode) {
    $zipcode = trim($zipcode);
    if ($zipcode === '') {
        $errors['zipcode'] = ZIPCODE_REQUIRED;
    }
} else {
    $errors['zipcode'] = ZIPCODE_REQUIRED;
}

// sanitize and validate city
$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
$inputs['city'] = $city;

if ($city) {
    $city = trim($city);
    if ($city === '') {
        $errors['city'] = CITY_REQUIRED;
    }
} else {
    $errors['city'] = CITY_REQUIRED;
}

// accept terms
$agree = filter_input(INPUT_POST, 'agree', FILTER_SANITIZE_SPECIAL_CHARS);

// check against the valid value
if ($agree===null) {
    $errors['agree'] = AGREE_REQUIRED;
}


if (count($errors) === 0) {
    $result=savePurchase($inputs);
    $smartphone=getSmartphone($_GET['id']);
    if($result===true){
        $_SESSION['message']="Je $smartphone->name is besteld";
    } else {
         $_SESSION['message']="Je $smartphone->name is niet besteld";
    }
    header("Location: index.php");
}





