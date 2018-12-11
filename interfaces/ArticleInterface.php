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
    public function getIndexByAuthor($author_id);


} // end interface
