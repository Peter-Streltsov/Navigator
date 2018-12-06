<?php

namespace app\models\units\monograph;

// project classes
use app\interfaces\PublicationInterface;
use app\models\common\Languages;
// yii classes
use Yii;
use yii\db\ActiveRecord;

/**
 * ActiveRecord class for table "monograph";
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property int $year
 * @property string $doi
 * @property resource $file
 */
class Monograph extends ActiveRecord implements PublicationInterface
{

    /**
     * @return array
     */
    public function behaviors()
    {

        return [
            //'class' => TimestampBehavior::className(),
            //'updatedAtAttribute' => false
        ];

    } // end function


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monographs';
    } // end function


    /**
     * @inheritdoc
     */
    public function rules()
    {

        return [
            [['title', 'year'], 'required'],
            [['year'], 'integer'],
            [['file'], 'string'],
            [['title', 'subtitle', 'isbn'], 'string', 'max' => 255],
        ];

    } // end function


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {

        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'subtitle' => 'Подзаголовок',
            'year' => 'Год издания',
            'publisher' => 'Издатель',
            'class' => 'Категория',
            'isbn' => 'ISBN',
            'file' => 'Файл',
            'authors' => 'Авторы'
        ];

    } // end function


    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {

        parent::afterSave($insert, $changedAttributes);
        if ($insert) {
            Yii::$app->session->setFlash('success', 'Монография добавлена');
        } else {
            Yii::$app->session->setFlash('success', 'Данные монографии обновлены');
        }

    } // end function


    /**
     * Unit Interface implementation
     */

    /**
     * @return array|\yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Authors::className(), ['monograph_id' => $this->id]);
    } // end function


    /**
     * @return mixed|string|null
     */
    public function getLanguageValue()
    {
        $language = Languages::find()->where(['id' => $this->language])->one();
        return $language != null ? $language->language : null;
    } // end function


    /**
     * @return float
     */
    public function getIndex()
    {
        // TODO: Implement index() method;
        return 1.0;
    } // end function


    /**
     * @return int|void
     */
    public function getPersonalIndex()
    {
        // TODO: Implement personalIndex() method.
    } // end function


    /**
     * End Unit interface
     */



    /**
     * @inheritdoc
     * @return MonographQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MonographQuery(get_called_class());
    } // end function

} // end class
