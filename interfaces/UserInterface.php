<?php

namespace app\interfaces;

/**
 * Interface UserInterface
 * Extends IdentityInterface
 * getStaff() method should return linked to current user employee
 * model (app\models\identity\Personnel)
 * getAuthor() method should return linked to current user author
 * model (app\models\identity\Author)
 *
 * @package app\interfaces
 */
interface UserInterface
{

    /**
     * @return app\models\identity\Personnel
     */
    public function getStaff();

    /**
     * @return app\models\identity\Author
     */
    public function getAuthor();

} // end interface
