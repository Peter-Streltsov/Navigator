<?php

namespace app\modules\Control\models;

use Yii;

/**
 * This is the model class for table "conferencies".
 *
 * @property int $id
 * @property string $report_title
 * @property string $author
 * @property string $conferencion_name
 * @property int $date
 * @property int $report_date
 * @property string $report_type
 * @property string $link
 * @property int $thesis_id
 */
class Conferencies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conferencies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_title', 'author', 'conferencion_name', 'date'], 'required'],
            [['date', 'report_date', 'thesis_id'], 'integer'],
            [['report_title', 'author', 'conferencion_name', 'report_type', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'report_title' => 'Report Title',
            'author' => 'Author',
            'conferencion_name' => 'Conferencion Name',
            'date' => 'Date',
            'report_date' => 'Report Date',
            'report_type' => 'Report Type',
            'link' => 'Link',
            'thesis_id' => 'Thesis ID',
        ];
    }

    /**
     * @inheritdoc
     * @return ConferenciesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConferenciesQuery(get_called_class());
    }
}
