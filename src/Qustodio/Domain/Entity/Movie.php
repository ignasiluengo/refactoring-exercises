<?php

namespace Qustodio\Domain\Entity;

class Movie
{
    const CHILDRENS = 2;

    const REGULAR = 0;

    const NEW_RELEASE = 1;

    /**
     * @var string
     */
    private $title;

    /**
     * @var float
     */
    private $priceCode;

    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    /**
     * @return int
     */
    public function getPriceCode()
    {
        return $this->priceCode;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}