<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['finished'])) {
        foreach ($_POST['finished'] as $loanid) {
            $loan = Loan::getLoanById($loanid);
            $loan->returned = true;
            $loan->update();
        }
    }
}

$loans = Loan::getAllLoans();

require 'app/Views/welcome.view.php';
