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

