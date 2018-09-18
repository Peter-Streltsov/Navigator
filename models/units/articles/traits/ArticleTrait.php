<?php

namespace app\models\units\articles\traits;

use app\models\units\articles\Types;

/**
 * Trait ArticleTrait
 *
 *
 * @package app\models\units\articles\traits
 */
trait  ArticleTrait
{

    /**
     * lists available article types (array)
     *
     * @return Types[]|array
     */
    public function types()
    {

        return Types::find()->asArray()->all();

    } // end function



    /**
     * gets current unit type value (from Types record)
     *
     * @return Types|array|null
     */
    public function getType()
    {

        $type = Types::find()->select(['type'])->where(['id' => $this->type])->asArray()->one();
        return $type['type'];

    } // end function



    /**
     *
     */
    public function getCitations()
    {

    }

} // end trait
