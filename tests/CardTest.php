<?php
require_once '../lib/Card.php';

/**
 * Class CardTtest
 *
 * @author    Julien Guittard <julien@youzend.com>
 * @link      http://github.com/jguittard/tripsorter for the canonical source repository
 * @copyright Copyright (c) 2014 Julien Guittard
 */
class CardTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Card
     */
    protected $card;

    /**
     * @var stdClass
     */
    protected $data;

    public function setUp()
    {
        $this->card = new Card();
        $this->data = json_decode(@file_get_contents(__DIR__ . '/data/carddata.json'), true);
    }

    public function testPropertiesAreNullByDefault()
    {
        $this->assertNull($this->card->getOrigin());
        $this->assertNull($this->card->getDestination());
        $this->assertNull($this->card->getTransportation());
        $this->assertNull($this->card->getSeat());
        $this->assertNull($this->card->getInformation());
    }

    public function testGetSetOrigin()
    {
        $instance = $this->card->setOrigin($origin = 'Madrid');
        $this->assertSame($origin, $this->card->getOrigin());
        $this->assertSame($instance, $this->card);
    }

    public function testGetSetDestination()
    {
        $instance = $this->card->setDestination($destination = 'Barcelona');
        $this->assertSame($destination, $this->card->getDestination());
        $this->assertSame($instance, $this->card);
    }

    public function testGetSetTransportation()
    {
        $instance = $this->card->setTransportation($transportation = 'train 78A');
        $this->assertSame($transportation, $this->card->getTransportation());
        $this->assertSame($instance, $this->card);
    }

    public function testGetSetSeat()
    {
        $instance = $this->card->setSeat($seat = '45A');
        $this->assertSame($seat, $this->card->getSeat());
        $this->assertSame($instance, $this->card);
    }

    public function testGetSetInformation()
    {
        $instance = $this->card->setInformation($information = 'Lorem ipsum');
        $this->assertSame($information, $this->card->getInformation());
        $this->assertSame($instance, $this->card);
    }
    
    public function testSetCardData()
    {
        $this->card->setFromData($this->data);
        foreach ($this->data as $property => $value) {
            $getter = "get" . ucfirst($property);
            $this->assertSame($value, $this->card->{$getter}());
        }

    }
} 