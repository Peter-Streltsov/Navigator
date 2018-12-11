<?php

namespace app\interfaces;

/**
 * Interface ArticleInterface
 * Describes methods for getting linked with current article data (Pages, Authors);
 *
 * @package app\interfaces
 */
interface ArticleInterface
{

    /**
     * @return mixed
     */
    public function getPages();

    /**
     * @return mixed
     */
    public function getAuthors();

} // end interface
