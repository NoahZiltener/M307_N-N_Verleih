<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_firstname = $_POST['firstname'];
    $_lastname = $_POST['lastname'];
    $_phone = $_POST['phone'];
    $_email = $_POST['email'];
    $_returndate = $_POST['returndate'];
    $_movie = $_POST['movie'];

    $loan = new Loan(null, $_firstname, $_lastname, $_phone, $_email, date("yy.m.d"), $_returndate, false, Movie::getMovieById($_movie));
    $loan->create();
    header('Location: home');
}

$memberships = Membership::getAllMemebership();
$movies = Movie::getAllMovies();
require 'app/Views/create.view.php';
