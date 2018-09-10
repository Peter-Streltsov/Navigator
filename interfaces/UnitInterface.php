<?php

namespace app\interfaces;

/**
 * Interface ModelInterface
 * @package app\modules\Control\interfaces
 */
interface UnitInterface
{

    /**
     * lists current unit authors
     *
     * @return array
     */
    public function getAuthors();

    /**
     * returns current unit language
     *
     * @return string
     */
    public function getLanguage();

    /**
     * calculates and returns total PNRD index for current unit
     *
     * @return integer
     */
    public function getIndex();

    /**
     * calculates and returns index for current unit for requested author
     *
     * @return integer
     */
    public function getPersonalIndex();

} // end interface
