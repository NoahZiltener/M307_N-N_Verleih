<?php

class Movie
{
    public $movieid;
    public $title;

    public function __construct($movieid = null, $title = null)
    {
        $this->movieid = $movieid;
        $this->title = $title;
    }

    public static function getMovieById($movieid)
    {
        $statement = connectToDatabase()->prepare('SELECT * FROM movies WHERE movieid = :movieid');
        $statement->bindParam(':movieid', $movieid, PDO::PARAM_INT);
        $statement->execute();
        $results = $statement->fetch();

        return Movie::ResultToMovie($results);
    }

    public static function getAllMovies()
    {
        $statement = connectToDatabase()->prepare('SELECT * FROM movies');
        $statement->execute();
        $results = $statement->fetchAll();
        $movies = [];
        foreach ($results as $movie) {
            $movies[] =  Movie::ResultToMovie($movie);
        }
        return $movies;
    }

    private static function ResultToMovie($dbr)
    {
        return new Movie(
                $dbr['movieid'],
                $dbr['title']
            );
    }
}
