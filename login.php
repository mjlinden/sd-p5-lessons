<?php
session_start();
include_once 'modules/database.php';
include_once 'modules/functions.php';

$errors = [];
$inputs = [];

$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

if ($request_method === 'GET') {
    // show the form
    require 'showLoginForm.php';
} elseif ($request_method === 'POST') {
    // handle the form submission
    require 'handleLoginForm.php';
    // show the form if the error exists
    if (count($errors) > 0) {
        require 'showLoginForm.php';
    }
}
