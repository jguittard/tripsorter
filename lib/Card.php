<?php
/**
 * Class card
 * 
 * @author    Julien Guittard <julien@youzend.com>
 * @link      http://github.com/jguittard/tripsorter for the canonical source repository
 * @copyright Copyright (c) 2014 Julien Guittard
 */
class Card
{
    /**
     * Location where the boarding takes place
     * 
     * @var string
     */
    protected $origin;
    
    /**
     * Location where the travel ends
     * 
     * @var string
     */
    protected $destination;
    
    /**
     * Traveling mode (train, plane, ...)
     * 
     * @var string
     */
    protected $transportation;
    
    /**
     * The number of the seat
     * 
     * @var string
     */
    protected $seat;
    
    /**
     * Additionnal notes
     *
     * @var string
     */
    protected $information;
    

	/**
	 * Get the origin
	 * 
     * @return $origin
     */
    public function getOrigin()
    {
        return $this->origin;
    }

	/**
	 * Set the origin
	 * 
     * @param string $origin
     * @return Card
     */
    public function setOrigin($origin)
    {
        $this->origin = $origin;
        return $this;
    }

	/**
	 * Get the destination
	 * 
     * @return $destination
     */
    public function getDestination()
    {
        return $this->destination;
    }

	/**
	 * Set the destination
	 * 
     * @param string $destination
     * @return Card
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;
        return $this;
    }

	/**
	 * Get the transportation
	 * 
     * @return $transportation
     */
    public function getTransportation()
    {
        return $this->transportation;
    }

	/**
	 * Set the transportation
	 * 
     * @param string $transportation
     * @return Card
     */
    public function setTransportation($transportation)
    {
        $this->transportation = $transportation;
        return $this;
    }

	/**
	 * Get the seat
	 * 
     * @return $seat
     */
    public function getSeat()
    {
        return $this->seat;
    }

	/**
	 * Set the seat
	 * 
     * @param string $seat
     * @return Card
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;
        return $this;
    }

	/**
	 * Get the information
	 * 
     * @return $information
     */
    public function getInformation()
    {
        return $this->information;
    }

	/**
	 * Set the information
	 * 
     * @param string $information
     * @return Card
     */
    public function setInformation($information)
    {
        $this->information = $information;
        return $this;
    }

    /**
     * Define card properties from an iterator
     * 
     * @param mixed $data
     * @return Card
     */
	public function setFromData($data)
    {
        foreach ($data as $key => $value) {
            $key = ucfirst($key);
            if (method_exists($this, 'set' . $key)) {
                $this->{"set$key"}($value);
            }
        }
        
        return $this;    
    }
    
    /**
     * Check if card is a departure
     * 
     * @param array $destinations
     * @return boolean
     */
    public function isDeparture(array $destinations)
    {
        return !in_array($this->origin, $destinations);    
    }
    
    /**
     * Check if card is an arrival
     * 
     * @param array $origins
     * @return boolean
     */
    public function isArrival(array $origins)
    {
        return !in_array($this->destination, $origins);    
    }

    /**
     * Format the card information for echo
     * 
     * @return string
     */
    public function __toString()
    {
        $stdout = '';
        $stdout .= sprintf("Take %s from %s to %s. Seat %s.", $this->getTransportation(), $this->getOrigin(), $this->getDestination(), $this->getSeat());
        $stdout .= $this->getInformation() ? $this->getInformation() . "." : "";
        return $stdout;    
    }
}
