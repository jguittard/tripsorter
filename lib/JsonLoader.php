<?php
require_once 'lib/LoaderInterface.php';
require_once 'lib/Card.php';

/**
 * Class JsonLoader
 * 
 * @author    Julien Guittard <julien@youzend.com>
 * @link      http://github.com/jguittard/tripsorter for the canonical source repository
 * @copyright Copyright (c) 2014 Julien Guittard
 */
class JsonLoader implements LoaderInterface
{
    /**
     * Load the content of a JSON file from its name
     * 
     * @param string $filename
     * @throws InvalidArgumentException
     * @return array
     */
    public static function load($filename)
    {
        $content = @file_get_contents($filename);
        $json = json_decode($content);
        if (null === $json) {
            throw new InvalidArgumentException("Content could not be serialized as JSON");
        }

        return self::extractCards($json);    
    }
    
    /**
     * Loop through entries of an object to create card objects
     * 
     * @param stdClass $content
     * @return array
     */
    public static function extractCards($content) {
        $cards = array();
        foreach ($content as $data) {
            $card = new Card();
            $card->setFromData($data);
            array_push($cards, $card);
        }
        
        return $cards;    
    }
}
