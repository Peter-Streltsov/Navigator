<?php

namespace app\interfaces;

/**
 * Interface LinkedRecordsInterface
 * Describes methods for publication's linked records (e.g. Citations, Authors, Associations);
 *
 * @package app\interfaces
 */
interface LinkedRecordsInterface
{

    /**
     * Collects errors from current model and combines it in string value;
     *
     * @return string
     */
    public function getErrorsMessage();

} // end class
