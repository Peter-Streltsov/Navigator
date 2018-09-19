<?php

namespace app\models\units\articles\traits;

use app\models\units\articles\Types;
use yii\helpers\ArrayHelper;

/**
 * Trait ArticleTrait
 *
 *
 * @package app\models\units\articles\traits
 */
trait SchemeTrait
{

    /**
     * private method returning namespace of class, using current trait method
     *
     * @return string
     */
    private function currentNamespace()
    {

        $current_class = explode('\\', __CLASS__);
        array_pop($current_class);
        return implode('\\', $current_class) . '\\';

    } // end function



    /**
     * lists available article types (array)
     *
     * @return Types[]|array
     */
    public function types()
    {

        return ArrayHelper::map(Types::find()->asArray()->all(), 'id', 'type');

    } // end function



    /**
     * gets current unit type value (from Types record)
     *
     * @return Types|array|null
     */
    public function type()
    {

        $type = Types::find()->select(['type'])->where(['id' => $this->type])->asArray()->one();
        return $type['type'];

    } // end function



    /**
     *
     */
    public function citations()
    {

    } // end function



    /**
     * method deletes all linked to current article model records
     * should be used ONLY in afterDelete() of article model (!)
     *
     * @return void
     */
    public function deleteLinkedData()
    {

        // deleting article pages
        $pages = $this->currentNamespace() . 'Pages';
        $pages = new $pages();
        $pages::find()->where(['article_id' => $this->id])->one();
        $pages->delete();

        // deleting authors
        $authors = $this->currentNamespace() . 'Authors';
        $authors = new $authors();
        $authors::find()->where(['article_id' => $this->id])->all();
        foreach ($authors as $author) {
            $author->delete();
        }

        // deleting citations
        $citations = $this->currentNamespace() . 'Citations';
        $citations = new $citations();
        $citations::find()->where(['article_id' => $this->id])->all();
        foreach ($citations as $citation) {
            $citation->delete();
        }

        // deleting affilations
        $affilations = $this->currentNamespace() . 'Affilations';
        $affilations = new $affilations();
        $affilations::find()->where(['article_id' => $this->id])->all();
        foreach ($affilations as $affilation) {
            $affilation->delete();
        }

    } // end function



    /**
     *
     */
    public function getPages()
    {

        return $this;

    } // end function

} // end trait
