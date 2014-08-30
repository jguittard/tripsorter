<?php
require_once 'lib/Trip.php';
require_once 'lib/JsonLoader.php';

/**
 * Class TripTtest
 *
 * @author    Julien Guittard <julien@youzend.com>
 * @link      http://github.com/jguittard/tripsorter for the canonical source repository
 * @copyright Copyright (c) 2014 Julien Guittard
 */
class TripTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Trip
     */
    protected $instance;

    /**
     * @var stdClass
     */
    protected $data;

    public function setUp()
    {
        $this->data = JsonLoader::load(__DIR__ . '/../data/cards.json');
        $this->instance = new Trip($this->data);
    }

    public function testCardsGetterReturnsArrayOfCards()
    {
        $this->assertContainsOnlyInstancesOf('Card', $this->instance->getCards());
    }
    
    public function testDepartureIsNullIfTripIsNotInit()
    {
        $this->assertNull($this->instance->getDeparture());
        $this->instance->setup();
        $this->assertNotNull($this->instance->getDeparture());
    }
    
    public function testArrivalIsNullIfTripIsNotInit()
    {
        $this->assertNull($this->instance->getArrival());
        $this->instance->setup();
        $this->assertNotNull($this->instance->getArrival());
    }
    
    public function testDepartureAndArrivalAreDifferent()
    {
        $this->instance->setup();
        $this->assertNotEquals($this->instance->getDeparture(), $this->instance->getArrival());
    }
    
} 
