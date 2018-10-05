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
        $current_class = explode('\\', get_called_class());
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
    public function typeValue()
    {
        if (isset($this->type)) {
            $type = Types::find()->select(['type'])->where(['id' => $this->type])->asArray()->one();
            return $type['type'];
        }

        return null;
    } // end function



    /**
     *
     */
    public function citations()
    {
        $citations_class = $this->currentNamespace() . 'Citations';
        return $citations_class::find()->where(['article_id' => $this->id])->all();
    } // end function



    /**
     *
     */
    public function getPages()
    {
        return $this;
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
        $associations = $this->currentNamespace() . 'Associations';
        $associations = new $associations();
        $associations::find()->where(['article_id' => $this->id])->all();
        foreach ($associations as $association) {
            $association->delete();
        }
    } // end function

} // end trait
