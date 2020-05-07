<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $movies = Movie::getAllMovies();
    if (isset($_GET['loanid'])) {
        $_LoanId = $_GET['loanid'];
        if (isset($_LoanId)) {
            $movieloan = Loan::getLoanById($_LoanId);
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_loanid = $_POST['loanid'];
    $_firstname = $_POST['firstname'];
    $_lastname = $_POST['lastname'];
    $_phone = $_POST['phone'];
    $_email = $_POST['email'];
    $_movie = $_POST['movie'];
    $_status = $_POST['status'];

    $movieloan = Loan::getLoanById($_loanid);
    $movie = Movie::getMovieById($_movie);

    $movieloan->firstname = $_firstname;
    $movieloan->lastname = $_lastname;
    $movieloan->phone = $_phone;
    $movieloan->email = $_email;
    $movieloan->movie = $movie;
    $movieloan->returned = $_status;

    $errors = $movieloan->validate();

    if (sizeof($errors) == 0) {
        $movieloan->update();
        header('Location: home');
    }
}
$movies = Movie::getAllMovies();
require 'app/Views/update.view.php';
