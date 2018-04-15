<?php

namespace app\modules\PublicAccess\models;

use yii\helpers\VarDumper;
use app\modules\Control\models\Articles;
use app\modules\Control\models\Monographies;

class PublicModel
{

    public function getPublications()
    {

        $articles = Articles::find()->asArray()->all();
        $monographies = Monographies::find()->asArray()->all();

        $i = 0;

        foreach ($articles as $article) {
            $model[$i][] = $article['title'];
            $model[$i][] = $article['subtitle'];
            $model[$i]['type'] = 'статья';
            $i++;
        }

        foreach ($monographies as $monography) {
            $model[$i][] = $monography['title'];
            $model[$i][] = $monography['subtitle'];
            $model[$i]['type'] = 'монография';
            $i++;
        }

        //VarDumper::dump($model);

        /*foreach ($model as $a) {
            var_dump($a);
            echo "<br><br><br>";
        }*/

        return $model;


    } // end function

} // end class
