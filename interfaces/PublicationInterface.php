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

} // end interface
