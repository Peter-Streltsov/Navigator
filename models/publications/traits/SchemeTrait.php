<?php

namespace app\models\publications\traits;

use yii\helpers\ArrayHelper;

/**
 * Trait SchemeTrait
 * Provides common methods working with linked data for articles ActiveRecords classes;
 *
 * @package app\models\units\articles\traits
 */
trait SchemeTrait
{

    /**
     * private method returning namespace of child class which uses this trait
     *
     * @return string
     */
    final private function currentNamespace()
    {
        $current_class = explode('\\', get_called_class());
        array_pop($current_class);
        return implode('\\', $current_class) . '\\';
    } // end function


    /**
     * lists types available for current publication
     * RENAMED - from types();
     *
     * @return array - current namespace Types records
     */
    public function getAvailableTypes()
    {
        $types_class = $this->currentNamespace() . 'Types';
        return ArrayHelper::map($types_class::find()->asArray()->all(), 'id', 'type');
    } // end function


    /**
     * gets current unit type value (from Types record)
     * RENAMED - from typeValue();
     *
     * @return string|null
     */
    public function getTypeValue()
    {
        $type_class = $this->currentNamespace() . 'Types';
        if (isset($this->type)) {
            return $type_class::find()->select(['type'])->where(['id' => $this->type])->one()->typr;
        }

        return null;
    } // end function


    /**
     * method deletes all linked to current article model records
     * should be used ONLY in afterDelete() method of publication model (!!!)
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
