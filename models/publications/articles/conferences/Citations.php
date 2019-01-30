<?php

namespace app\models\publications\articles\conferences;

use app\interfaces\LinkedRecordsInterface;
use yii\db\ActiveRecord;

/**
 * AciveRacord class for table "articles_citations";
 * Table contains linked data to ArticleConference (one-to-one; citations descriptions);
 *
 * @property int $id
 * @property int $article_id
 * @property string $title
 * @property string $class
 */
class Citations extends ActiveRecord implements LinkedRecordsInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_conferences_citations';
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id'], 'required'],
            [['title'], 'required'],
            [['article_id'], 'integer'],
            [['title', 'class'], 'string', 'max' => 255],
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
            'title' => 'Описание',
            'class' => 'Категория',
        ];
    } // end function


    /**
     * @param bool $insert
     * @param array $changedAttributes\
     */
    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
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
     * @return CitationsQuery the active query used by this AR class;
     */
    public static function find()
    {
        return new CitationsQuery(get_called_class());
    } // end function

} // end class
