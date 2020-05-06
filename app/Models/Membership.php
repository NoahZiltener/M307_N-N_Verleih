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
        $results = $statement->fetchAll();

        $membershipid = $results[0];
        return Membership::dbResultTomembership($membershipid);
    }

    public static function getAllMemebership()
    {
        $statement = connectToDatabase()->prepare('SELECT * FROM memberships');
        $statement->execute();
        $results = $statement->fetchAll();
        $membershipids = [];
        foreach($results as $membership){
            $membershipids[] =  Membership::dbResultTomembership($membership);
        }
        return $membershipids;
    }

    private static function dbResultTomembership($dbr){
        return new Membership($dbr['membershipid'], $dbr['membership'], $dbr['loanperiod']);
    }
}