<?php

namespace app\models\units\monograph;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "monograph_authors".
 *
 * @property int $id
 * @property int $monograph_id
 * @property int $author_id
 *
 * @property Authors $author
 * @property Monograph $monograph
 */
class Authors extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monograph_authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['monography_id', 'author_id'], 'required'],
            [['monography_id', 'author_id'], 'integer'],
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
            'monograph_id' => 'Monograph ID',
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
    public function getMonograph()
    {

        return $this->hasOne(Monograph::className(), ['id' => 'monograph_id']);

    } // end function


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonographsByAuthor()
    {

        return $this->hasMany(Monograph::className(), ['id' => 'article_id']);

    } // end function

} // end class
