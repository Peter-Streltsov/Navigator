<?php

namespace app\models\publications\articles\conferences;

use app\interfaces\LinkedRecordsInterface;
use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "article_pages";
 * Table contains linked data to ArticleConference (one-to-one; pages numbers);
 *
 * @property int $id
 * @property int $article_id
 * @property int $begin_page
 * @property int $end_page
 */
class Pages extends ActiveRecord implements LinkedRecordsInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_conferences_pages';
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'begin_page'], 'required'],
            [['article_id', 'begin_page', 'end_page'], 'integer'],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'begin_page' => 'Begin Page',
            'end_page' => 'End Page',
        ];

    } // end function


    /**
     * @return string
     */
    public function getErrorsMessage()
    {
        $message = [];
        $errors = $this->getErrors();
        foreach ($errors as $key => $error) {
            $text = '';
            foreach ($error as $message) {
                $text = $text . $message . ' ';
            }
            $message[] = 'Поле "' . $key . '" => ' . $text;
        }
        return implode('<br>', $message);
    } // end function


    /**
     * @inheritdoc
     *
     * @return PagesQuery the active query used by this AR class;
     */
    public static function find()
    {
        return new PagesQuery(get_called_class());
    } // end function

} // end class
