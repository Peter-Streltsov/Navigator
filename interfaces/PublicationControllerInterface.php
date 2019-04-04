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
     * @param int $id - publication id;
     * @return mixed
     */
    public function actionView($id);

    /**
     * Creates new publication record;
     *
     * @return mixed
     */
    public function actionCreate();

    /**
     * Used in AJAX routes;
     *
     * @deprecated
     * @return mixed
     */
    public function actionCreateAjax();

    /**
     * Updated current publication;
     *
     * @param int $id
     * @return mixed
     */
    public function actionUpdate($id);

    /**
     * Deletes current article record;
     *
     * @param int $id - publication id;
     * @return mixed
     */
    public function actionDelete($id);

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionAuthor($id);

    /**
     * @param integer $author_id
     * @param integer $article_id
     * @return mixed
     */
    public function actionDeleteauthor($author_id, $article_id);

    /**
     * @param $id
     * @return mixed
     */
    public function actionAssociation($id);

    /**
     * Deletes
     *
     * @param $id
     * @return mixed
     */
    public function actionDeleteassociation($id);

    /**
     * Adds new Citation to current publication;
     *
     * @param $id
     * @return mixed
     */
    public function actionCitation($id);

    /**
     * Deletes Citation from current publication;
     *
     * @param integer $id
     * @param integer $citation
     * @return mixed
     */
    public function actionDeletecitation($id, $citation);

} // end class
