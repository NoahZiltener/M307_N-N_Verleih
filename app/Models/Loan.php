<?php

require_once "app/Models/Movie.php";

class Loan
{
    public $loanid;
    public $firstname;
    public $lastname;
    public $phone;
    public $email;
    public $loanDate;
    public $returnDate;
    public $returned;
    public $movie;

    public function __construct($loanid = null, $firstname = null, $lastname = null, $phone = null,  $email = null,  $loanDate = null,  $returnDate = null,  $returned = null,  $movie = null)
    {
        $this->loanid = $loanid;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->email = $email;
        $this->loanDate = $loanDate;
        $this->returnDate = $returnDate;
        $this->returned = $returned;
        $this->movie = $movie;
    }

    public static function getLoanById($loanid)
    {
        $statement = connectToDatabase()->prepare('SELECT * FROM loans WHERE loanid = :loanid');
        $statement->bindParam(':loanid', $loanid, PDO::PARAM_INT);
        $statement->execute();
        $results = $statement->fetch();

        return Loan::ResultToLoan($results);
    }

    public static function getAllLoans()
    {
        $statement = connectToDatabase()->prepare('SELECT * FROM loans WHERE returned = false ORDER BY returndate ASC');
        $statement->execute();
        $results = $statement->fetchAll();
        $loans = [];
        foreach ($results as $loan) {
            $loans[] =  Loan::ResultToLoan($loan);
        }
        return $loans;
    }

    private static function ResultToLoan($dbr)
    {
        return new Loan(
            $dbr['loanid'],
            $dbr['firstname'],
            $dbr['lastname'],
            $dbr['phone'],
            $dbr['email'],
            $dbr['loandate'],
            $dbr['returndate'],
            $dbr['returned'],
            Movie::getMovieById($dbr['fk_movie'])
        );
    }

    public function create()
    {
        $statement = connectToDatabase()->prepare('INSERT INTO loans (firstname, lastname, phone, email, loandate, returndate, returned, fk_movie) 
            VALUES (:firstname, :lastname, :phone, :email, :loandate, :returndate, :returned, :fk_movie)');
        $statement->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $statement->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $statement->bindParam(':phone', $this->phone, PDO::PARAM_STR);
        $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
        $statement->bindParam(':loandate', $this->loanDate, PDO::PARAM_STR);
        $statement->bindParam(':returndate', $this->returnDate, PDO::PARAM_STR);
        $statement->bindParam(':returned', $this->returned, PDO::PARAM_BOOL);
        $statement->bindParam(':fk_movie', $this->movie->movieid, PDO::PARAM_INT);

        return $statement->execute();
    }

    public function update()
    {
        $statement = connectToDatabase()->prepare('UPDATE loans 
            SET firstname = :firstname, 
                lastname = :lastname, 
                phone = :phone, 
                email = :email, 
                loandate = :loandate,
                returndate = :returndate, 
                returned = :returned,  
                fk_movie = :fk_movie 
            WHERE loanid = :loanid
            ');
        $statement->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $statement->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $statement->bindParam(':phone', $this->phone, PDO::PARAM_STR);
        $statement->bindParam(':email', $this->email, PDO::PARAM_STR);
        $statement->bindParam(':loandate', $this->loanDate, PDO::PARAM_STR);
        $statement->bindParam(':returndate', $this->returnDate, PDO::PARAM_STR);
        $statement->bindParam(':returned', $this->returned, PDO::PARAM_BOOL);
        $statement->bindParam(':fk_movie', $this->movie->movieid, PDO::PARAM_INT);
        $statement->bindParam(':loanid', $this->loanid, PDO::PARAM_INT);

        return $statement->execute();
    }

    public function validate()
    {
        $errors = [];
        if (strlen($this->firstname) < 1) {
            $errors[] = "Vorname muss mindestens zwei Zeichen beinhalten.";
        }
        if (strlen($this->lastname) < 1) {
            $errors[] = "Nachname muss mindestens zwei Zeichen beinhalten.";
        }
        if (preg_replace("/[^\+\-(\)\  0-9]/", '', $this->phone) != $this->phone) {
            $errors[] = "Invalide Telefonnummer";
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalide Email";
        }
        if (!isset($this->returned)) {
            $errors[] = "Invalider Status";
        }
        if (strlen($this->movie->movieid < 1)) {
            $errors[] = "Invalider Film";
        }
        if (!isset($this->loanDate)) {
            $errors[] = "Ausleihdatumdatum nicht gesetzt";
        }
        if (!isset($this->returnDate)) {
            $errors[] = "Rückgabedatum nicht gesetzt";
        }
        return $errors;
    }
}
