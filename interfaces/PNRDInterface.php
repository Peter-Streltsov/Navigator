<?php

namespace app\interfaces;

/**
 * Interface PNRDInterface
 * describes methods for getting pnrd data from publication models
 *
 * @package app\interfaces
 */
interface PNRDInterface
{

    /**
     * calculates and returns total PNRD index for current unit model
     *
     * @return float
     */
    public function getIndexValue();

    /**
     * calculates and returns index for current unit for requested author
     *
     * @param int $author_id
     * @return float
     */
    public function getIndexByAuthor($author_id);

} // end class
