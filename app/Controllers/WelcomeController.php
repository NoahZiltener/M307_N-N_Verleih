<?php
    require_once "app/Models/Loan.php";

    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        foreach($_POST as &$loanId){
            //$loan = Loan::getLoanById($loan);
        }
    }

    $loans = Loan::getAllLoans();

    require 'app/Views/welcome.view.php';
