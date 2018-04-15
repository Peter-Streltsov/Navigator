<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "organisation".
 *
 * @property int $id
 * @property string $organisation
 * @property string $weblink
 */
class Organisation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organisation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organisation'], 'required'],
            [['organisation', 'weblink'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'organisation' => 'Organisation',
            'weblink' => 'Weblink',
        ];
    }

    /**
     * @inheritdoc
     * @return OrganisationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrganisationQuery(get_called_class());
    }
}
