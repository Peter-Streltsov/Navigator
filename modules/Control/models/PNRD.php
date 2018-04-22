<?php

namespace app\modules\Control\models;

use yii\base\Model;
use app\modules\Control\models\Articles;
use app\modules\Control\models\Monographies;

class PNRD extends Model
{

    /**
     * returns mean value
     *
     * TODO: test and verify function
     *
     * @return float
     */
    public function meanIndex()
    {

        $authors = Authors::find()->all(); // getting all authors
        $count = Authors::find()->count(); // counting current authors

        $mean = null;

        foreach($authors as $author)
        {
            $index['articles'] = static::personalArticlesIndex($author->id);
            //$index['monographies'] = static::personalMonographiesIndex($author->id);
            $mean[] = (float)array_sum($index);
            unset($index);
        }

        return round((float)(array_sum($mean) / $count), 2);

    } // end function



    /**
     * collects all personal indexes by user id
     *
     * TODO: test and verify function
     *
     * @param $id integer
     * @return float
     */
    public function personalIndex($id)
    {

        $index = null;

        $author = \app\modules\Control\models\Authors::find()->where(['id' => $id])->one();

        $index['articles'] = static::personalArticlesIndex($id);
        //$index['monographies'] = static::personalMonographiesIndex($id);

        $index = array_sum($index);

        return (float)$index;

    } // end function


    /**
     * collects personal index for 'articles'
     *
     * TODO: test and verify
     *
     * @param $id integer
     * @return float
     */
    public function personalArticlesIndex($id)
    {

        $indexes = [];

        $articles = Articles::getCurrentArticles($id);

        foreach ($articles as $article) {
            $query = IndexesArticles::find()
                ->select('value')
                ->where(['id' => (int)$article['class']])
                ->asArray()
                ->one();

            $indexes[] = (float)$query['value'];
        }

        return (float)array_sum($indexes);

    } // end function



    /**
     *
     */
    public function personalMonographiesIndex($id)
    {

        $indexes = [];

        $articles = Articles::getCurrentArticles($id);

        foreach ($articles as $article) {
            $query = IndexesArticles::find()
                ->select('value')
                ->where(['id' => (int)$article['class']])
                ->asArray()
                ->one();

            $indexes[] = (float)$query['value'];
        }

        return (float)array_sum($indexes);

    } // end function


    /**
     *
     */
    public function personalConferenciesIndex()
    {

    } // end function

    public function personalReportsIndex()
    {

    } // end function

} // end class
