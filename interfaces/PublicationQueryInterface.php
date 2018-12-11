<?php

namespace app\interfaces;

/**
 * Interface PublicationQueryInterface
 * Describes fluent interface methods for publications ActiveQuery classes
 *
 * @package app\interfaces
 */
interface PublicationQueryInterface
{

    /**
     * @param integer $year
     * @return $this
     */
    public function byYear($year);

    /**
     * @return $this
     */
    public function currentYear();

}
