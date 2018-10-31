<?php

namespace app\interfaces;

/**
 * Interface UnitInterface
 *
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
     * calculates and returns total PNRD index for current unit model
     *
     * @return float
     */
    public function getIndex();

    /**
     * calculates and returns index for current unit for requested author
     *
     * @return float
     */
    public function getPersonalIndex();

} // end interface
