<?php

namespace app\models\publications\articles\journals;

use app\interfaces\LinkedRecordsInterface;
use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "article_journals_associations";
 * Table contains linked data for ArticleJournal; (one-to-many; associated organisations);
 *
 * @property int $id
 * @property string $name
 * @property int $article_id
 * @property string $type
 */
class Associations extends ActiveRecord implements LinkedRecordsInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_journals_associations';
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'article_id'], 'required'],
            [['article_id'], 'integer'],
            [['name', 'type'], 'string', 'max' => 255],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название организации',
            'article_id' => 'Идентификатор статьи',
            'type' => '',
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
     * @return AssociationsQuery the active query used by this AR class;
     */
    public static function find()
    {
        return new AssociationsQuery(get_called_class());
    } // end function

} // end class
