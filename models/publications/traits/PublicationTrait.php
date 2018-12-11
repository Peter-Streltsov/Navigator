<?php

namespace app\models\publications\traits;

/**
 * Trait PublicationTrait
 * Implements methods from PublicationInterface
 * Citations and Associations models MUST be placed int hte same namespace with article
 * model using this trait
 */
trait PublicationTrait
{

    /**
     * finds Citations linked to current publication
     *
     * @return mixed
     */
    public function getCitations()
    {
        return $this->hasMany(Citations::className(), ['article_id' => $this->id]);
    } // end function


    /**
     * finds Associations (associated organisations data) linked to current publication
     *
     * @return mixed
     */
    public function getAssociations()
    {
        return $this->hasMany(Associations::className(), ['article_id' => $this->id]);
    } // end function

} // end class
