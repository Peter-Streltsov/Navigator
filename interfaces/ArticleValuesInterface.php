<?php

namespace app\interfaces;

/**
 * Interface ArticleValuesInterface
 * Describes methods for getting exact property value from linked model
 *
 * @package app\interfaces
 */
interface ArticleValuesInterface
{

    /**
     * @return mixed
     */
    public function getTypeValue();

    /**
     * @return mixed
     */
    public function getClassValue();

    /**
     * @return mixed
     */
    public function getLanguageValue();

}
