<?php

class Membership
{
    public $membershipid;
    public $membership;
    public $loanperiod;

    public function __construct($membershipid = null, $membership = null, $loanperiod = null)
    {
        $this->membershipid = $membershipid;
        $this->membership = $membership;
        $this->loanperiod = $loanperiod;
    }

    public static function getMemebershipById($membershipid)
    {
        $statement = connectToDatabase()->prepare('SELECT * FROM memberships WHERE membershipid = :membershipid');
        $statement->bindParam(':membershipid', $membershipid, PDO::PARAM_INT);
        $statement->execute();
        $results = $statement->fetch();

        return Membership::ResultTomembership($results);
    }

    public static function getAllMemebership()
    {
        $statement = connectToDatabase()->prepare('SELECT * FROM memberships');
        $statement->execute();
        $results = $statement->fetchAll();
        $membershipids = [];
        foreach ($results as $membership) {
            $membershipids[] =  Membership::ResultTomembership($membership);
        }
        return $membershipids;
    }

    private static function ResultTomembership($dbr)
    {
        return new Membership(
            $dbr['membershipid'],
            $dbr['membership'],
            $dbr['loanperiod']
        );
    }
}
