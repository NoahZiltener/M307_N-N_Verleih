<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $movies = Movie::getAllMovies();
    if (isset($_GET['loanid'])) {
        $_loanId = $_GET['loanid'];
        if (isset($_loanId)) {
            $loan = Loan::getLoanById($_loanId);
        }
    } else {
        header('Location: home');
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_loanid = htmlspecialchars($_POST['loanid']);
    $_firstname = htmlspecialchars($_POST['firstname']);
    $_lastname = htmlspecialchars($_POST['lastname']);
    $_phone = htmlspecialchars($_POST['phone']);
    $_email = htmlspecialchars($_POST['email']);
    $_movie = htmlspecialchars($_POST['movie']);
    $_status = htmlspecialchars($_POST['status']);

    $loan = Loan::getLoanById($_loanid);
    $movie = Movie::getMovieById($_movie);

    $loan->firstname = $_firstname;
    $loan->lastname = $_lastname;
    $loan->phone = $_phone;
    $loan->email = $_email;
    $loan->movie = $movie;
    $loan->returned = $_status;

    $errors = $loan->validate();

    if (sizeof($errors) == 0) {
        $loan->update();
        header('Location: home');
    }
}

$movies = Movie::getAllMovies();
require 'app/Views/update.view.php';
