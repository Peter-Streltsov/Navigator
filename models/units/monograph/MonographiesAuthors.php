<?php

namespace app\models\units\monograph;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "monographies_authors".
 *
 * @property int $id
 * @property int $monography_id
 * @property int $author_id
 *
 * @property Authors $author
 * @property Monographies $monography
 */
class MonographiesAuthors extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monographies_authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['monography_id', 'author_id'], 'required'],
            [['monography_id', 'author_id'], 'integer'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['monography_id'], 'exist', 'skipOnError' => true, 'targetClass' => Monographies::className(), 'targetAttribute' => ['monography_id' => 'id']],
        ];

    } // end function



    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'monography_id' => 'Monography ID',
            'author_id' => 'Author ID',
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
    public function getMonography()
    {

        return $this->hasOne(Monographies::className(), ['id' => 'monography_id']);

    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonographiesByAuthor()
    {

        return $this->hasMany(Monographies::className(), ['id' => 'article_id']);

    } // end function

} // end class
