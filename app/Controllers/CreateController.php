<?php
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_firstname =  htmlspecialchars($_POST['firstname']);
    $_lastname = htmlspecialchars($_POST['lastname']);
    $_phone = htmlspecialchars($_POST['phone']);
    $_email = htmlspecialchars($_POST['email']);
    $_returndate = htmlspecialchars($_POST['returndate']);
    $_movie = htmlspecialchars($_POST['movie']);

    $loan = new Loan(null, $_firstname, $_lastname, $_phone, $_email, date("yy.m.d"), $_returndate, false, Movie::getMovieById($_movie));
    $errors = $loan->validate();

    if (sizeof($errors) == 0) {
        $loan->create();
        header('Location: home');
    }

} else {
    $loan = new Loan(null, '', '', '', '', '', '', false, '');
}

$memberships = Membership::getAllMemebership();
$movies = Movie::getAllMovies();
require 'app/Views/create.view.php';