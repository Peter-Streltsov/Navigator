<?php

namespace app\interfaces;

/**
 * Interface PublicationInterface
 *
 * @package app\modules\Control\interfaces
 */
interface PublicationInterface
{

    /**
     * @return mixed
     */
    public function getCitations();

    /**
     * @return mixed
     */
    public function getAssociations();

    /**
     * calculates and returns total PNRD index for current unit model
     *
     * @return float
     */
    public function getIndexValue();

    /**
     * calculates and returns index for current unit for requested author
     *
     * @return float
     */
    public function getIndexByAuthor();

} // end interface
