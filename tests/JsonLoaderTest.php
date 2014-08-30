<?php
require_once 'lib/JsonLoader.php';

/**
 * Class JsonLoaderTtest
 *
 * @author    Julien Guittard <julien@youzend.com>
 * @link      http://github.com/jguittard/tripsorter for the canonical source repository
 * @copyright Copyright (c) 2014 Julien Guittard
 */
class JsonLoaderTest extends PHPUnit_Framework_TestCase
{
    public function testValidJsonIsObject()
    {
        $this->assertContainsOnlyInstancesOf('Card', JsonLoader::load(__DIR__ . '/../data/cards.json'));
    }

    public function testFileNotFoundRaiseException()
    {
        $this->setExpectedException('InvalidArgumentException');
        JsonLoader::load('tests/data/badfilename.json');}

    public function testInvalidJsonRaiseException()
    {
        $this->setExpectedException('InvalidArgumentException');
        JsonLoader::load('tests/data/dummy.file');}
} 
