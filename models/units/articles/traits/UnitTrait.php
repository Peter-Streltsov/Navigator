<?php

namespace app\models\units\articles\traits;

// project classes
use app\models\common\Languages;
use app\models\pnrd\indexes\IndexesArticles;
// yii classes
use Yii;

/**
 * Trait UnitTrait
 * Implements UnitInterface methods common for articles models (journals, conferencies and collections)
 *
 * @package app\models\units\articles\traits
 */
trait UnitTrait
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
     *
     * @return array
     */
    public function authors()
    {

        $authorsname = $this->currentNamespace() . 'Authors';
        return (new $authorsname())::find()->where(['article_id' => $this->id])->all();

    } // end function



    /**
     * returns language name for current article
     *
     * @return string
     */
    public function languageValue()
    {

        $language = Languages::find()->where(['id' => $this->language])->one();
        return $language->language;

    } // end function



    /**
     * calculates and returns PNRD index for current article model
     *
     * @return float
     */
    public function index()
    {

        $index = IndexesArticles::find()->select('value')->where(['id' => $this->type])->asArray()->one();
        return (float)$index['value'];

    } // end function



    /**
     * calculates personal index for current article using article affilations and user identity model
     * should be used ONLY in 'authorized' controllers (control module and submodules - user dependent)
     *
     * @return float
     */
    public function personalIndex()
    {

        $user = Yii::$app->user->getIdentity();

    } // end function

} // end trait
