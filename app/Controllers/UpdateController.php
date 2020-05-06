<?php

$movies = Movie::getAllMovies();

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['loanid'])){
        $_LoanId = $_GET['loanid'];
        if(isset($_LoanId)) {
            $movieloan = Loan::getLoanById($_LoanId);
            require 'app/Views/update.view.php';
        }
    }
}
else{
     if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_loanid = $_POST['loanid'];
        $_firstname = $_POST['firstname'];
        $_lastname = $_POST['lastname'];
        $_phone = $_POST['phone'];
        $_email = $_POST['email'];
        $_movie = $_POST['movie'];
        $_status = $_POST['status'];

        $loan = Loan::getLoanById($_loanid);
        $movie = Movie::getMovieById($_movie);

        $loan->firstname = $_firstname;
        $loan->lastname = $_lastname;
        $loan->phone = $_phone;
        $loan->email = $_email;
        $loan->movie = $movie;
        $loan->returned = $_status;

        $loan->update();
        header('Location: home');
     }
}