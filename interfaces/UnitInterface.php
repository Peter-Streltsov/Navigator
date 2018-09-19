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
    public function authors();

    /**
     * returns current unit language
     *
     * @return string
     */
    public function languageValue();

    /**
     * calculates and returns total PNRD index for current unit model
     *
     * @return integer
     */
    public function index();

    /**
     * calculates and returns index for current unit for requested author
     *
     * @return integer
     */
    public function personalIndex();

} // end interface
