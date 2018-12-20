<?php

namespace app\interfaces;

/**
 * Interface PublicationInterface
 * describes methods for getting linked data for publication models
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

} // end interface
