<?php

namespace Qustodio\Domain\Entity;


class Customer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $rentals = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param Rental $arg
     */
    public function addRental(Rental $arg)
    {
        $this->rentals[] = $arg;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function statement()
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";

        /** @var Rental $rental */
        foreach ($this->rentals as $rental) {
            $thisAmount = 0;

            switch($rental->getMovie()->getPriceCode()) {

                case Movie::REGULAR:
                    $thisAmount += 2;
                    if ($rental->getDaysRental() > 2) {
                        $thisAmount += ($rental->getDaysRental() -2) * 1.5;
                    }
                    $rental->getDaysRental();
                    break;
                case Movie::NEW_RELEASE:
                    $thisAmount += $rental->getDaysRental() * 3;
                    break;

                case Movie::CHILDRENS:
                    $thisAmount = 1.5;
                    if ($rental->getDaysRental() > 3) {
                        $thisAmount += ($rental->getDaysRental() - 3) * 1.5;
                        break;
                    }
            }

            $frequentRenterPoints ++;
            // add bonus for a two day new release rental
            if (($rental->getMovie()->getPriceCode() == Movie::NEW_RELEASE) && $rental->getDaysRental() > 1) {
                $frequentRenterPoints ++;
            }

            $totalAmount += $thisAmount;
        }
        //add footer lines
        $result .= "Amount owed is " . $totalAmount . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points";

        return $result;
    }

}