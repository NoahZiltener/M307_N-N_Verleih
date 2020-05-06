<?php

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
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->email = $email;
        $this->loanDate = $loanDate;
        $this->returnDate = $returnDate;
        $this->returned = $returned;
        $this->movie = $movie;
    }

    public function getLoanById($loanid)
    {
        $statement = connectToDatabase()->prepare('SELECT * FROM loans WHERE loanid = :loanid');
        $statement->bindParam(':loanid', $loanid, PDO::PARAM_INT);
        $statement->execute();
        $results = $statement->fetchAll();

        $loan = $results[0];
        $this->loanid = $loan['loanid'];
        $this->firstname = $loan['firstname'];
        $this->lastname = $loan['lastname'];
        $this->phone = $loan['phone'];
        $this->email = $loan['email'];
        $this->loanDate = $loan['loanDate'];
        $this->returnDate = $loan['returnDate'];
        $this->returned = $loan['returned'];
        $this->movie = Movie::getMovieById($loan['fk_movie']);
    }

    public static function getAllLoans()
    {
        $statement = connectToDatabase()->prepare('SELECT * FROM loans');
        $statement->execute();
        $results = $statement->fetchAll();
        $loans = [];
        foreach ($results as $loan) {
            $loans[] =  Loan::dbResultToLoan($loan);
        }
        return $loans;
    }

    private static function dbResultToLoan($dbr)
    {
        return new Movie(
            $dbr['loanid'],
            $dbr['firstname'],
            $dbr['lastname'],
            $dbr['phone'],
            $dbr['email'],
            $dbr['loanDate'],
            $dbr['returnDate'],
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
        $statement->bindParam(':loandate', $this->countOfRates, PDO::PARAM_INT);
        $statement->bindParam(':returndate', $this->deadline, PDO::PARAM_STR);
        $statement->bindParam(':returned', $this->fk_creditdealsId, PDO::PARAM_BOOL);
        $statement->bindParam(':fk_movie', $this->fk_statusId, PDO::PARAM_INT);

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
        $statement->bindParam(':loandate', $this->loandate, PDO::PARAM_INT);
        $statement->bindParam(':returndate', $this->returndate, PDO::PARAM_STR);
        $statement->bindParam(':returned', $this->returned, PDO::PARAM_BOOL);
        $statement->bindParam(':fk_movie', $this->movie->movieid, PDO::PARAM_INT);
        $statement->bindParam(':loanid', $this->loanid, PDO::PARAM_INT);

        return $statement->execute();
    }


}
