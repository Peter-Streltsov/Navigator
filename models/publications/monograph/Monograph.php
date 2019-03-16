<?php

namespace app\models\publications\monograph;

// project classes
use app\interfaces\PublicationInterface;
use app\models\publications\Publication;
use app\models\common\Languages;
// yii classes
use Yii;

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
class Monograph extends Publication implements PublicationInterface
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
            [['year', 'volume_number', 'created_at', 'updated_at', 'series_number', 'pages_number'], 'integer'],
            [['file', 'language', 'city', 'annotation', 'index', 'volume_name', 'series_name'], 'string'],
            [['title', 'isbn'], 'string', 'max' => 255],
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
            'year' => 'Год издания',
            'publisher' => 'Издатель',
            'city' => 'Место издания (город)',
            'language' => 'Язык',
            'class' => 'Категория',
            'pages_number' => 'Количество страниц',
            'isbn' => 'ISBN',
            'volume_name' => 'Название тома',
            'volume_number' => 'Номер тома',
            'series_name' => 'Название серии',
            'series_number' => 'Номер серии',
            'created_at' => 'Создано',
            'updated_at' => 'Изменено',
            'annotation' => 'Аннотация',
            'index' => 'Полнотекстовый индекс',
            'file' => 'Прикрепленный файл',
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


    /*****************************************************************************************************************/

    /**
     * lists linked to current monograph Authors
     *
     * @return array|\yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        $authors = Authors::find()->where(['article_id' => $this->id])->all();
        $result = [];
        if (count($authors) >= 1) {
            foreach ($authors as $authorlink) {
                $author = AuthorsCommon::find()->where(['id' => $authorlink->author_id])->asArray()->one();
                $result[] = $author;
            }
        }
        return $result;
        //return $this->hasMany(Authors::className(), ['monograph_id' => $this->id]);
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

    /*****************************************************************************************************************/


    /**
     * @inheritdoc
     * @return MonographQuery the active query used by this AR class;
     */
    public static function find()
    {
        return new MonographQuery(get_called_class());
    } // end function

} // end class
