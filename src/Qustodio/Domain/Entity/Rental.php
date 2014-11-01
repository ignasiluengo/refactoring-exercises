<?php

namespace Qustodio\Domain\Entity;


class Rental
{
    /**
     * @var Movie
     */
    private $movie;

    /**
     * @var int
     */
    private $daysRental;

    /**
     * @param Movie $movie
     * @param $daysRental int
     */
    public function __construct(Movie $movie, $daysRental)
    {
        $this->movie = $movie;
        $this->daysRental = $daysRental;
    }

    /**
     * @return int
     */
    public function getDaysRental()
    {
        return $this->daysRental;
    }

    /**
     * @return Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }



}