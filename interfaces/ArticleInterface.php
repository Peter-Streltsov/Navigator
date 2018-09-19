<?php

namespace app\interfaces;

/**
 * Interface ArticleInterface
 *
 * @package app\interfaces
 */
interface ArticleInterface
{

    //public function getPages();

    /**
     * @param int $year
     * @return int
     */
    public function byYear(int $year);

    /**
     * @return int
     */
    public function currentYear();


    /**
     * @return mixed
     */
    public function byAuthor();

} // end interface
