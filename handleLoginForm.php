<?php


const EMAIL_REQUIRED = 'Email invullen';
const EMAIL_INVALID = 'Geldig email adres invullen';
const PASSWORD_REQUIRED = 'Password invullen';
const CREDENTIALS_NOT_VALID = 'Verkeerde email en/of password';




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

// validate password
$password = filter_input(INPUT_POST, 'password');
$inputs['password'] = $password;

if ($password) {
    $password = trim($password);
    if ($password === '') {
        $errors['password'] = PASSWORD_REQUIRED;
    }
} else {
    $errors['password'] = PASSWORD_REQUIRED;
}

// controleer email en password
if (count($errors) === 0) {

    $result = checkLogin($inputs);
    var_dump($result);
    switch ($result) {
        case 'ADMIN':

            header("Location: admin.php");
            break;

        case 'FAILURE':
            $errors['credentials']=CREDENTIALS_NOT_VALID;
            break;
    }
}


