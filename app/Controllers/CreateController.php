<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_firstname = $_POST['firstname'];
    $_lastname = $_POST['lastname'];
    $_phone = $_POST['phone'];
    $_email = $_POST['email'];
    $_membership = $_POST['membership'];
    $_returndate = $_POST['returndate'];
    $_movie = $_POST['movie'];

    $creditloan = new Loan(null, $_firstname, $_lastname, $_phone, $_email, date("m.d.y"), date("m.d.y"), false, Movie::getMovieById($_movie));
    $creditloan->create();
    header('Location: home');
}

$meberships = Membership::getAllMemebership();
$movies = Movie::getAllMovies();
require 'app/Views/create.view.php';
