<?php

namespace app\interfaces;

/**
 * Interface PublicationControllerInterface;
 * Describes methods, which all PUBLICATION controllers MUST implement;
 *
 * @since 0.4
 * @package app\interfaces
 */
interface PublicationControllerInterface
{

    /**
     * @param int $id
     * @return mixed
     */
    public function actionView($id);

    /**
     * @return mixed
     */
    public function actionCreate();

    /**
     * @return mixed
     */
    public function actionCreateAjax();

    /**
     * @param int $id
     * @return mixed
     */
    public function actionUpdate($id);

    /**
     * @param int $id
     * @return mixed
     */
    public function actionDelete($id);

} // end class
