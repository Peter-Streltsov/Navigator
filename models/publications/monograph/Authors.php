<?php

namespace app\models\publications\monograph;

use app\interfaces\LinkedRecordsInterface;
use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "monograph_authors";
 * Table contains linked data for Monograph;
 * (one-to-many; junction table; links Authors models to current monograph);
 *
 * @property int $id
 * @property int $monograph_id
 * @property int $author_id
 *
 * @property Authors $author
 * @property Monograph $monograph
 */
class Authors extends ActiveRecord implements LinkedRecordsInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monograph_authors';
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['monography_id', 'author_key'], 'required'],
            [['monography_id', 'author_key', 'part'], 'integer'],
            //[['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['author_id' => 'id']],
            //[['monography_id'], 'exist', 'skipOnError' => true, 'targetClass' => Monograph::className(), 'targetAttribute' => ['monograph_id' => 'id']],
        ];
    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'monograph_key' => 'Идентификатор Монографии',
            'author_key' => 'Автор',
        ];
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonograph()
    {
        return $this->hasOne(Monograph::className(), ['id' => 'monograph_id']);
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
     * @return \yii\db\ActiveQuery
     */
    public function getMonographsByAuthor()
    {
        return $this->hasMany(Monograph::className(), ['id' => 'article_id']);
    } // end function

} // end class
