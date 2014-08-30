<?php
/**
 * Class Trip
 *
 * @author    Julien Guittard <julien@youzend.com>
 * @link      http://github.com/jguittard/tripsorter for the canonical source repository
 * @copyright Copyright (c) 2014 Julien Guittard
 */
class Trip
{
    /**
     * Array of boarding cards
     * 
     * @var array
     */
    protected $cards;
    
    /**
     * Start point of the trip
     * 
     * @var string
     */
    protected $departure;
    
    /**
     * End point of the trip
     * 
     * @var string
     */
    protected $arrival;
    
    /**
     * Get cards
     * 
     * @return array
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * Get departure
     * 
     * @return string
     */
	public function getDeparture()
    {
        return $this->departure;    
    }

    /**
     * Get arrival
     * 
     * @return string
     */
	public function getArrival()
    {
        return $this->arrival;    
    }

    /**
     * Constructor
     * 
     * @param array $cards
     */
	public function __construct($cards)
    {
        $this->cards = $cards;
    }
    
    /**
     * Initialize the data to be ready to use
     * 
     * @return void
     */
    public function setup()
    {
        $origins = array();
        $destinations = array();
        
        foreach ($this->cards as $card) {
            $origins[] = $card->getOrigin();
            $destinations[] = $card->getDestination();
        }
        
        foreach ($this->cards as $card) {
            if ($card->isDeparture($destinations)) {
                $this->departure = $card->getOrigin();
            }
            if ($card->isArrival($origins)) {
                $this->arrival = $card->getDestination();
            }
        }
        $this->sort();
    }
    
    /**
     * Sort the boarding cards
     * 
     * @return void
     */
    protected function sort()
    {
        $stop = $this->departure;
        $cards = $this->cards;
        $this->cards = array();
        
        while ($stop != $this->arrival) {
            foreach ($cards as $index => $card) {
                if ($card->getOrigin() == $stop) {
                    $this->cards[] = $card;
                    $stop = $card->getDestination();
                    unset($cards[$index]);
                }
            }
        }
    }
}
