<?php
/**
 * Interface LoaderInterface
 * 
 * @author    Julien Guittard <julien@youzend.com>
 * @link      http://github.com/jguittard/tripsorter for the canonical source repository
 * @copyright Copyright (c) 2014 Julien Guittard
 */
interface LoaderInterface
{
    /**
     * Load a file from its filename
     * 
     * @param string $filename
     */
    public static function load($filename);
}
